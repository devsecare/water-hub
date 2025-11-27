<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('resources');
        }

        // Get bookmarked items
        $bookmarkedItems = $user->bookmarkedItems()
            ->with(['category.parent', 'featuredImage'])
            ->where('is_active', true)
            ->orderBy('bookmarks.created_at', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'slug' => $item->slug,
                    'publisher' => $item->publisher ?? '',
                    'type' => $item->type_label,
                    'type_value' => $item->type,
                    'icon' => $item->type_icon,
                    'short_description' => $item->short_description ?? '',
                    'description' => $item->description ?? '',
                    'category_id' => $item->category_id,
                    'category_name' => $item->category ? $item->category->name : '',
                    'category_color' => $item->category ? $item->category->color : '#3B82F6',
                    'category_icon' => $item->category ? ($item->category->icon ?? 'folder') : 'folder',
                    'parent_category_id' => $item->category && $item->category->parent ? $item->category->parent->id : ($item->category && !$item->category->parent ? $item->category_id : null),
                    'featured_image_url' => $item->featuredImage ? $item->featuredImage->url : null,
                    'is_bookmarked' => true,
                ];
            });

        // Get all active parent categories (top-level categories only) with their children
        $categories = Category::where('is_active', true)
            ->whereNull('parent_id')
            ->with('children')
            ->orderBy('sort')
            ->orderBy('name')
            ->get()
            ->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'icon' => $category->icon ?? 'folder',
                    'color' => $category->color ?? '#3B82F6',
                    'child_ids' => $category->children->pluck('id')->toArray(),
                ];
            });

        return view('my_account', [
            'user' => $user,
            'bookmarkedItems' => $bookmarkedItems,
            'categories' => $categories,
        ]);
    }
}
