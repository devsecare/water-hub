<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\DownloadLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class MediaDownloadController extends Controller
{
    public function download(Request $request, $mediaId)
    {
        // Find the media
        $media = Media::find($mediaId);
        
        if (!$media) {
            abort(404, 'Media not found');
        }

        // Get disk and path
        $disk = $media->disk ?? 'public';
        $filePath = $media->path;

        // Check if file exists
        if (!Storage::disk($disk)->exists($filePath)) {
            abort(404, 'File not found on disk');
        }

        // Get full path
        $fullPath = Storage::disk($disk)->path($filePath);

        // Check if custom filename is provided via query parameter (from additional_resources)
        $fileName = $request->query('filename');
        
        // If no custom filename, use media's file_name or name
        if (empty($fileName)) {
            $fileName = $media->file_name ?? $media->name ?? 'download';
        }
        
        // Ensure filename has extension
        if (!pathinfo($fileName, PATHINFO_EXTENSION)) {
            $extension = $media->ext ?? pathinfo($filePath, PATHINFO_EXTENSION) ?? 'pdf';
            $fileName .= '.' . ltrim($extension, '.');
        }

        // Log download
        if (Auth::check()) {
            try {
                DownloadLog::create([
                    'media_id' => $media->id,
                    'file_id' => null,
                    'user_id' => Auth::id(),
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'downloaded_at' => now(),
                ]);
            } catch (\Exception $e) {
                // Don't break download if logging fails
            }
        }

        // Download file using Laravel's standard method
        return Response::download($fullPath, $fileName);
    }
}
