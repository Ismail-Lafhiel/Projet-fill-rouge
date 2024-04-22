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
    // Bookmark room
    public function bookmarkRoom($roomId)
    {
        return $this->bookmark('room', $roomId);
    }

    // Bookmark hotel
    public function bookmarkHotel($hotelId)
    {
        return $this->bookmark('hotel', $hotelId);
    }

    // Bookmark entity
    public function bookmark($entityType, $entityId)
    {
        Log::info('Entity Type: ' . $entityType);
        Log::info('Entity ID: ' . $entityId);

        // Check if $entityType is valid (hotel or room)
        if (!in_array($entityType, ['hotel', 'room'])) {
            return response()->json(['error' => 'Invalid entity type'], 400);
        }

        $user = auth()->user();

        // Determine the model class based on $entityType
        $modelClass = 'App\Models\\' . ucfirst($entityType);

        $entity = $modelClass::findOrFail($entityId);

        // Check if the entity is already bookmarked by the user
        $isBookmarked = $user->bookmarks()->where('bookmarkable_type', $modelClass)->where('bookmarkable_id', $entityId)->exists();

        if (!$isBookmarked) {
            // Create a new bookmark
            $bookmark = new Bookmark();
            $bookmark->user_id = $user->id;
            $bookmark->bookmarkable_type = $modelClass;
            $bookmark->bookmarkable_id = $entityId;
            $bookmark->save();

            // Return success response
            return response()->json(['success' => ucfirst($entityType) . ' bookmarked successfully'])->header('X-Bookmark-Success', ucfirst($entityType) . ' bookmarked successfully');
        } else {
            // Return error response if already bookmarked
            return response()->json(['error' => ucfirst($entityType) . ' already bookmarked'], 400)->header('X-Bookmark-Error', ucfirst($entityType) . ' already bookmarked');
        }
    }

    public function index()
    {
        $user = auth()->user();

        $bookmarkedHotels = $user->bookmarks()->where('bookmarkable_type', Hotel::class)->get();
        $bookmarkedRooms = $user->bookmarks()->where('bookmarkable_type', Room::class)->get();
        // dd($bookmarkedRooms, $bookmarkedHotels);
        return view('bookmarks', compact('bookmarkedHotels', 'bookmarkedRooms', 'user'));
    }

    public function cancelBookmarkHotel($bookmarkId)
    {
        $bookmark = Bookmark::findOrFail($bookmarkId);

        // Check if the authenticated user owns the bookmark
        if (Auth::id() !== $bookmark->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $bookmark->delete();

        return response()->json(['success' => 'Bookmark canceled successfully']);
    }
    public function cancelBookmarkedRoom($bookmarkId)
    {
        $bookmark = Bookmark::findOrFail($bookmarkId);

        // Check if the authenticated user owns the bookmark
        if (Auth::id() !== $bookmark->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $bookmark->delete();

        return response()->json(['success' => 'Bookmark canceled successfully']);
    }
}
