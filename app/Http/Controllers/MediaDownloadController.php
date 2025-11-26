<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class MediaDownloadController extends Controller
{
    public function download(Request $request, Media $media)
    {
        // Check if media exists
        if (!$media || !$media->path) {
            abort(404, 'Media not found');
        }

        // Get the disk from media or use default
        $disk = $media->disk ?? config('curator.disk', 'public');
        
        // Get the file path - Curator stores path relative to disk root
        $filePath = $media->path;
        
        // Check if file exists on the disk
        if (!Storage::disk($disk)->exists($filePath)) {
            abort(404, 'File not found');
        }

        // Get the full file path for download
        // For public disk, use the storage path
        if ($disk === 'public') {
            $fullPath = Storage::disk($disk)->path($filePath);
        } else {
            // For other disks, get the path
            $fullPath = Storage::disk($disk)->path($filePath);
        }

        // Get the original filename for download
        // Priority: file_name > title > extract from path > default
        $fileName = null;
        
        if (!empty($media->file_name)) {
            $fileName = $media->file_name;
        } elseif (!empty($media->title)) {
            $fileName = $media->title;
        } else {
            // Try to extract filename from path
            $pathInfo = pathinfo($media->path);
            if (!empty($pathInfo['filename'])) {
                $fileName = $pathInfo['filename'];
            }
        }
        
        // If still no filename, use default
        if (empty($fileName)) {
            $fileName = 'download';
        }
        
        // Ensure filename has extension
        if (!pathinfo($fileName, PATHINFO_EXTENSION)) {
            $extension = $media->ext ?? pathinfo($media->path, PATHINFO_EXTENSION);
            if ($extension) {
                $fileName .= '.' . ltrim($extension, '.');
            }
        }

        // Return file download response
        return Response::download($fullPath, $fileName);
    }
}
