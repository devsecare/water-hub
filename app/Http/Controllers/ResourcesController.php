<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResourcesController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::with(['category.parent', 'featuredImage', 'files'])
            ->where('is_active', true);

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('publisher', 'like', "%{$search}%")
                    ->orWhere('short_description', 'like', "%{$search}%");
            });
        }

        // Filter by category (include sub-categories if parent is selected)
        if ($request->has('category') && $request->category) {
            $category = Category::with('children')->find($request->category);
            if ($category) {
                // If it's a parent category, include items from all its children
                if ($category->parent_id === null && $category->children->count() > 0) {
                    $categoryIds = $category->children->pluck('id')->push($category->id);
                    $query->whereIn('category_id', $categoryIds);
                } else {
                    // If it's a sub-category, only show items from that category
                    $query->where('category_id', $request->category);
                }
            }
        }

        // Filter by type
        if ($request->has('type') && $request->type) {
            $query->where('type', $request->type);
        }

        // Get all active parent categories with their children for sidebar
        $categories = Category::where('is_active', true)
            ->whereNull('parent_id')
            ->with(['children' => function ($query) {
                $query->where('is_active', true)->orderBy('name');
            }])
            ->orderBy('name')
            ->get();

        // Paginate results
        $items = $query->orderBy('created_at', 'desc')
            ->paginate(12)
            ->withQueryString();

        // Get bookmarked item IDs for the current user
        $bookmarkedItemIds = [];
        if (Auth::check()) {
            $bookmarkedItemIds = Auth::user()->bookmarks()->pluck('item_id')->toArray();
        }

        return view('resources', [
            'items' => $items,
            'categories' => $categories,
            'search' => $request->search ?? '',
            'selectedCategory' => $request->category ?? null,
            'selectedType' => $request->type ?? null,
            'bookmarkedItemIds' => $bookmarkedItemIds,
        ]);
    }

    public function show($slug)
    {
        $item = Item::with(['category.parent', 'files', 'featuredImage'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Get related items from the same category (excluding current item)
        $relatedItems = Item::with(['category.parent', 'files'])
            ->where('category_id', $item->category_id)
            ->where('id', '!=', $item->id)
            ->where('is_active', true)
            ->limit(3)
            ->get();

        // Get category color for gradient
        $displayCategory = $item->category->parent ?? $item->category;
        $categoryColor = $displayCategory->color ?? '#0E1C62';
        if (!str_starts_with($categoryColor, '#')) {
            $categoryColor = '#' . $categoryColor;
        }
        $hex = ltrim($categoryColor, '#');
        if (strlen($hex) == 3) {
            $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
        }
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        $r2 = min(255, $r + (255 - $r) * 0.3);
        $g2 = min(255, $g + (255 - $g) * 0.3);
        $b2 = min(255, $b + (255 - $b) * 0.3);
        $gradientEnd = sprintf('#%02x%02x%02x', $r2, $g2, $b2);

        // Check if item is bookmarked
        $isBookmarked = false;
        if (Auth::check()) {
            $isBookmarked = Auth::user()->bookmarks()->where('item_id', $item->id)->exists();
        }

        // Get bookmarked item IDs for related items
        $bookmarkedItemIds = [];
        if (Auth::check()) {
            $bookmarkedItemIds = Auth::user()->bookmarks()->pluck('item_id')->toArray();
        }

        return view('single_product_page', [
            'item' => $item,
            'relatedItems' => $relatedItems,
            'categoryColor' => $categoryColor,
            'gradientEnd' => $gradientEnd,
            'displayCategory' => $displayCategory,
            'isBookmarked' => $isBookmarked,
            'bookmarkedItemIds' => $bookmarkedItemIds,
        ]);
    }
}
