<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
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

        // Retrieve the authenticated user
        $user = auth()->user();

        // Determine the model class based on $entityType
        $modelClass = 'App\Models\\' . ucfirst($entityType);

        // Find the entity by ID
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
}