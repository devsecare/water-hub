<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->get('category_id');
        $keyword = $request->get('keyword');

        // Get all active categories
        $categories = Category::where('is_active', true)
            ->orderBy('sort')
            ->get();

        // Build query for items
        $query = Item::where('is_active', true)
            ->with(['category', 'featuredImage', 'files']);

        // Filter by category if selected
        if ($selectedCategory) {
            $query->where('category_id', $selectedCategory);
        }

        // Filter by keyword if provided
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%")
                    ->orWhere('address', 'like', "%{$keyword}%");
            });
        }

        $items = $query->get();

        // Get bookmarked items for authenticated users
        $user = auth()->user();
        $bookmarkedItemIds = $user ? $user->bookmarks()->pluck('item_id')->toArray() : [];

        return view('map.index', [
            'categories' => $categories,
            'items' => $items,
            'selectedCategory' => $selectedCategory,
            'keyword' => $keyword,
            'bookmarkedItemIds' => $bookmarkedItemIds,
        ]);
    }

    public function api(Request $request)
    {
        $selectedCategory = $request->get('category_id');
        $keyword = $request->get('keyword');

        // Build query for items
        $query = Item::where('is_active', true)
            ->with(['category', 'featuredImage', 'files']);

        // Filter by category if selected
        if ($selectedCategory) {
            $query->where('category_id', $selectedCategory);
        }

        // Filter by keyword if provided
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%")
                    ->orWhere('address', 'like', "%{$keyword}%");
            });
        }

        $items = $query->get();

        // Get bookmarked items for authenticated users
        $user = auth()->user();
        $bookmarkedItemIds = $user ? $user->bookmarks()->pluck('item_id')->toArray() : [];

        return response()->json($items->map(function ($item) use ($bookmarkedItemIds) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'slug' => $item->slug,
                'author' => $item->author ?? $item->publisher ?? '',
                'description' => $item->description,
                'short_description' => $item->short_description,
                'address' => $item->address,
                'latitude' => (float) $item->latitude,
                'longitude' => (float) $item->longitude,
                'category' => [
                    'id' => $item->category->id,
                    'name' => $item->category->name,
                    'color' => $item->category->color,
                    'icon' => $item->category->icon ?? 'folder',
                ],
                'featured_image_id' => $item->featured_image_id,
                'files_count' => $item->files->count(),
                'is_bookmarked' => in_array($item->id, $bookmarkedItemIds),
            ];
        }));
    }
}
