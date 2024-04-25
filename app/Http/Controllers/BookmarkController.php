<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BookmarkController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        $bookmarkedHotels = $user->bookmarks()->where('bookmarkable_type', Hotel::class)->get();
        $bookmarkedRooms = $user->bookmarks()->where('bookmarkable_type', Room::class)->get();
        // dd($bookmarkedRooms, $bookmarkedHotels);
        return view('bookmarks', compact('bookmarkedHotels', 'bookmarkedRooms', 'user'));
    }
    // Bookmark a room
    public function bookmarkRoom(Request $request)
    {
        $userId = auth()->id();
        $roomId = $request->input('entity_id');

        $message = $this->toggleBookmark('room', $userId, $roomId);

        return response()->json(['message' => $message]);
    }
    // Cancel bookmark for a room
    public function cancelRoomBookmark(Request $request, $id)
    {
        $userId = auth()->id();

        $message = $this->toggleBookmark('room', $userId, $id, false);

        return response()->json(['message' => $message]);
    }

    // Cancel bookmark for a hotel
    public function cancelHotelBookmark(Request $request, $id)
    {
        $userId = auth()->id();

        $message = $this->toggleBookmark('hotel', $userId, $id, false);

        return response()->json(['message' => $message]);
    }


    // Helper method to toggle bookmarks
    protected function toggleBookmark($entityType, $userId, $entityId, $add = true)
    {
        $entityClass = 'App\\Models\\' . ucfirst($entityType);

        $bookmark = Bookmark::where([
            ['user_id', $userId],
            ['bookmarkable_id', $entityId],
            ['bookmarkable_type', $entityClass],
        ])->first();

        if ($add) {
            if ($bookmark) {
                return $entityType . ' already bookmarked';
            } else {
                Bookmark::create([
                    'user_id' => $userId,
                    'bookmarkable_id' => $entityId,
                    'bookmarkable_type' => $entityClass,
                ]);
                return $entityType . ' bookmarked successfully';
            }
        } else {
            if ($bookmark) {
                $bookmark->delete();
                return $entityType . ' bookmark removed successfully';
            } else {
                return $entityType . ' is not bookmarked';
            }
        }
    }
}
