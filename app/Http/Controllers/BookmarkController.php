<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function store(Request $request, Item $item)
    {
        $user = Auth::user();
        
        if (!$user) {
            return response()->json(['error' => 'You must be logged in to bookmark items.'], 401);
        }

        // Check if already bookmarked
        if ($user->bookmarks()->where('item_id', $item->id)->exists()) {
            return response()->json(['message' => 'Item already bookmarked', 'bookmarked' => true], 200);
        }

        // Bookmark the item
        $user->bookmarks()->attach($item->id);

        return response()->json(['message' => 'Item bookmarked successfully', 'bookmarked' => true], 200);
    }

    public function destroy(Request $request, Item $item)
    {
        $user = Auth::user();
        
        if (!$user) {
            return response()->json(['error' => 'You must be logged in to unbookmark items.'], 401);
        }

        // Remove bookmark
        $user->bookmarks()->detach($item->id);

        return response()->json(['message' => 'Item unbookmarked successfully', 'bookmarked' => false], 200);
    }

    public function toggle(Request $request, Item $item)
    {
        $user = Auth::user();
        
        if (!$user) {
            return response()->json(['error' => 'You must be logged in to bookmark items.'], 401);
        }

        $isBookmarked = $user->bookmarks()->where('item_id', $item->id)->exists();

        if ($isBookmarked) {
            $user->bookmarks()->detach($item->id);
            return response()->json(['message' => 'Item unbookmarked', 'bookmarked' => false], 200);
        } else {
            $user->bookmarks()->attach($item->id);
            return response()->json(['message' => 'Item bookmarked', 'bookmarked' => true], 200);
        }
    }
}
