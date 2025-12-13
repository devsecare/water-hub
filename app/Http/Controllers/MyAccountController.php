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

    public function update(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $request->validate([
            'first_name' => 'required|string|max:255',
            'organisation' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'old_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
        ], [], [
            'old_password' => 'current password',
            'new_password' => 'new password',
            'new_password_confirmation' => 'password confirmation',
        ]);

        // Update user information
        $user->first_name = $request->first_name;
        $user->name = $request->first_name; // Keep name for compatibility
        $user->organisation = $request->organisation;

        // Only update email if it changed
        if ($user->email !== $request->email) {
            $user->email = $request->email;
        }

        // Update password if provided
        if ($request->filled('old_password') && $request->filled('new_password')) {
            // Verify old password
            if (!\Illuminate\Support\Facades\Hash::check($request->old_password, $user->password)) {
                return redirect()->route('myaccount', ['show_account_details' => '1'])->withErrors(['old_password' => 'The current password is incorrect.'])->withInput();
            }

            // Update to new password
            $user->password = \Illuminate\Support\Facades\Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->route('myaccount', ['show_account_details' => '1'])->with('success', 'Account details updated successfully!');
    }
}
