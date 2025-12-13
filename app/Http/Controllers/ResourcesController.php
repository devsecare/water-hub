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
            ->with(['category.parent', 'featuredImage'])
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
                    'category_icon' => $item->category ? ($item->category->icon ?? 'folder') : 'folder',
                    'featured_image_url' => $item->featuredImage ? $item->featuredImage->url : null,
                    'featured_image_id' => $item->featuredImage ? $item->featuredImage->id : null,
                    'is_bookmarked' => in_array($item->id, $bookmarkedItemIds),
                    'is_case_study' => $item->is_case_study ?? false,
                    'latitude' => $item->latitude ? (float) $item->latitude : null,
                    'longitude' => $item->longitude ? (float) $item->longitude : null,
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
            ->with(['category.parent', 'featuredImage'])
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
                    'category_icon' => $relatedItem->category ? ($relatedItem->category->icon ?? 'folder') : 'folder',
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

    public function caseStudy(Request $request)
    {
        // Get filter parameters
        $selectedCountry = $request->get('country');
        $selectedPhase = $request->get('phase');
        $searchKeyword = $request->get('search');

        // Get all active items with latitude and longitude
        $user = auth()->user();
        $bookmarkedItemIds = $user ? $user->bookmarks()->pluck('item_id')->toArray() : [];

        // Build query
        $query = Item::where('is_active', true)
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->with(['category', 'featuredImage']);

        // Apply filters
        if ($selectedCountry) {
            $query->where('country', $selectedCountry);
        }

        if ($selectedPhase) {
            $query->where('project_phase', $selectedPhase);
        }

        if ($searchKeyword) {
            $query->where(function ($q) use ($searchKeyword) {
                $q->where('title', 'like', "%{$searchKeyword}%")
                    ->orWhere('description', 'like', "%{$searchKeyword}%")
                    ->orWhere('address', 'like', "%{$searchKeyword}%");
            });
        }

        $items = $query->get()
            ->map(function ($item) use ($bookmarkedItemIds) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'slug' => $item->slug,
                    'author' => $item->author ?? $item->publisher ?? '',
                    'latitude' => (float) $item->latitude,
                    'longitude' => (float) $item->longitude,
                    'country' => $item->country,
                    'project_phase' => $item->project_phase,
                    'category' => [
                        'id' => $item->category->id,
                        'name' => $item->category->name,
                        'color' => $item->category->color,
                        'icon' => $item->category->icon ?? 'folder',
                    ],
                    'category_color' => $item->category->color ?? '#2CBFA0',
                    'category_icon' => $item->category->icon ?? 'folder',
                    'category_name' => $item->category->name,
                    'featured_image_id' => $item->featured_image_id,
                    'is_bookmarked' => in_array($item->id, $bookmarkedItemIds),
                ];
            });

        // Get unique countries and phases for dropdowns
        $countries = Item::where('is_active', true)
            ->whereNotNull('country')
            ->where('country', '!=', '')
            ->distinct()
            ->orderBy('country')
            ->pluck('country')
            ->toArray();

        $phases = [
            'planning' => 'Planning',
            'construction' => 'Construction',
            'completed' => 'Completed',
            'proposal' => 'Proposal',
        ];

        return view('case_study', [
            'items' => $items,
            'countries' => $countries,
            'phases' => $phases,
            'selectedCountry' => $selectedCountry,
            'selectedPhase' => $selectedPhase,
            'searchKeyword' => $searchKeyword,
        ]);
    }
}
