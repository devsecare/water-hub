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
        
        // If no user is logged in, redirect to login or show empty state
        if (!$user) {
            return redirect()->route('login');
        }

        // Get user's bookmarked items
        $query = $user->bookmarks()
            ->with(['category.parent', 'files'])
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

        // Filter by category
        if ($request->has('categories') && is_array($request->categories) && count($request->categories) > 0) {
            $query->whereIn('category_id', $request->categories);
        }

        // Get all active parent categories for sidebar
        $categories = Category::where('is_active', true)
            ->whereNull('parent_id')
            ->with(['children' => function ($query) {
                $query->where('is_active', true)->orderBy('name');
            }])
            ->orderBy('name')
            ->get();

        // Get saved items
        $savedItems = $query->orderBy('created_at', 'desc')->get();

        return view('my_account', [
            'user' => $user,
            'savedItems' => $savedItems,
            'categories' => $categories,
            'search' => $request->search ?? '',
            'selectedCategories' => $request->categories ?? [],
        ]);
    }
}
