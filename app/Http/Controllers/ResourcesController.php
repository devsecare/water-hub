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
                $query->where('is_active', true);
            }])
            ->whereNull('parent_id')
            ->orderBy('name')
            ->get();

        // Get all active items with their relationships
        $items = Item::where('is_active', true)
            ->with(['category.parent', 'featuredImage'])
            ->orderBy('created_at', 'desc')
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
                    'featured_image_url' => $item->featuredImage ? $item->featuredImage->url : null,
                ];
            });

        return view('resources', [
            'requiresAuth' => false,
            'categories' => $categories,
            'items' => $items,
        ]);
    }
}
