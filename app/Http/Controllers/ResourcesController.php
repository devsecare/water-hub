<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index(Request $request)
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return view('resources', [
                'requiresAuth' => true,
                'categories' => collect(),
                'items' => collect(),
            ]);
        }

        // Get all active categories with their children
        $categories = Category::where('is_active', true)
            ->with(['children' => function ($query) {
                $query->where('is_active', true)
                    ->orderBy('sort');
            }])
            ->whereNull('parent_id')
            ->orderBy('sort')
            ->get();

        // Get all active items with their relationships
        $user = auth()->user();
        $bookmarkedItemIds = $user ? $user->bookmarks()->pluck('item_id')->toArray() : [];

        $items = Item::where('is_active', true)
            ->with(['category.parent', 'featuredImage', 'files'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) use ($bookmarkedItemIds) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'slug' => $item->slug,
                    'publisher' => $item->author ?? $item->publisher ?? '',
                    'type' => $item->type_label,
                    'type_value' => $item->type,
                    'icon' => $item->type_icon,
                    'short_description' => $item->short_description ?? '',
                    'description' => $item->description ?? '',
                    'category_id' => $item->category_id,
                    'category_name' => $item->category ? $item->category->name : '',
                    'category_color' => $item->category ? $item->category->color : '#3B82F6',
                    'featured_image_url' => $item->featuredImage ? $item->featuredImage->url : null,
                    'is_bookmarked' => in_array($item->id, $bookmarkedItemIds),
                    'files' => $item->files->map(function ($file) {
                        return [
                            'id' => $file->id,
                            'original_name' => $file->original_name,
                            'name' => $file->name,
                        ];
                    })->toArray(),
                ];
            });

        return view('resources', [
            'requiresAuth' => false,
            'categories' => $categories,
            'items' => $items,
        ]);
    }

    public function show($slug)
    {
        $item = Item::where('slug', $slug)
            ->where('is_active', true)
            ->with(['category.parent', 'featuredImage', 'files'])
            ->firstOrFail();

        $user = auth()->user();
        $isBookmarked = $user ? $user->bookmarks()->where('item_id', $item->id)->exists() : false;

        // Get related items (same category, excluding current item)
        $relatedItems = Item::where('category_id', $item->category_id)
            ->where('id', '!=', $item->id)
            ->where('is_active', true)
            ->with(['category.parent', 'featuredImage'])
            ->limit(3)
            ->get()
            ->map(function ($relatedItem) use ($user) {
                $bookmarkedItemIds = $user ? $user->bookmarks()->pluck('item_id')->toArray() : [];
                return [
                    'id' => $relatedItem->id,
                    'title' => $relatedItem->title,
                    'slug' => $relatedItem->slug,
                    'publisher' => $relatedItem->publisher ?? '',
                    'type' => $relatedItem->type_label,
                    'type_value' => $relatedItem->type,
                    'icon' => $relatedItem->type_icon,
                    'category_id' => $relatedItem->category_id,
                    'category_name' => $relatedItem->category ? $relatedItem->category->name : '',
                    'category_color' => $relatedItem->category ? $relatedItem->category->color : '#3B82F6',
                    'featured_image_url' => $relatedItem->featuredImage ? $relatedItem->featuredImage->url : null,
                    'is_bookmarked' => in_array($relatedItem->id, $bookmarkedItemIds),
                ];
            });

        return view('single_product_page', [
            'item' => $item,
            'isBookmarked' => $isBookmarked,
            'relatedItems' => $relatedItems,
        ]);
    }
}
