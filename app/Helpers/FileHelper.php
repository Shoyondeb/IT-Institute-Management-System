<?php
// app/Helpers/FileHelper.php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileHelper
{
    /**
     * Upload a profile picture
     */
    public static function uploadProfilePicture(UploadedFile $file, ?string $oldPath = null): string
    {
        // Delete old file if exists
        if ($oldPath) {
            Storage::disk('public')->delete($oldPath);
        }

        // Generate unique filename
        $filename = 'profile_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Store the file
        $path = $file->storeAs('profile-pictures', $filename, 'public');

        return $path;
    }

    /**
     * Delete a profile picture
     */
    public static function deleteProfilePicture(?string $path): void
    {
        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }
}
