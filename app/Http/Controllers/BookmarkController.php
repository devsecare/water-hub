<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function toggle(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
        ]);

        $user = Auth::user();
        $itemId = $request->input('item_id');

        $bookmark = Bookmark::where('user_id', $user->id)
            ->where('item_id', $itemId)
            ->first();

        if ($bookmark) {
            $bookmark->delete();
            return response()->json(['status' => 'removed', 'message' => 'Bookmark removed successfully.']);
        } else {
            Bookmark::create([
                'user_id' => $user->id,
                'item_id' => $itemId,
            ]);
            return response()->json(['status' => 'added', 'message' => 'Bookmark added successfully.']);
        }
    }
}
