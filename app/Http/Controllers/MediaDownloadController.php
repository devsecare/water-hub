<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\DownloadLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class MediaDownloadController extends Controller
{
    public function download(Request $request, $mediaId)
    {
        // Debug: Log that the controller method was called - THIS MUST HAPPEN FIRST
        Log::info('MediaDownloadController::download called', [
            'media_id_param' => $mediaId,
            'user_authenticated' => Auth::check(),
            'user_id' => Auth::id(),
            'ip' => $request->ip(),
            'url' => $request->fullUrl(),
            'method' => $request->method(),
        ]);

        // Manually resolve Media model
        $media = Media::find($mediaId);

        if (!$media) {
            Log::error('Media model not found', ['media_id' => $mediaId]);
            abort(404, 'Media not found');
        }

        // Check if media exists
        if (!$media || !$media->path) {
            Log::error('Media not found or has no path', ['media_id' => $media->getKey()]);
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

        // Log the download (automatic tracking)
        try {
            if (Auth::check()) {
                $logData = [
                    'media_id' => $media->getKey(),
                    'file_id' => null,
                    'user_id' => Auth::id(),
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'downloaded_at' => now(),
                ];

                Log::info('Attempting to create download log', $logData);

                $downloadLog = DownloadLog::create($logData);

                Log::info('Download log created successfully', ['log_id' => $downloadLog->id]);
            } else {
                Log::warning('Download attempted but user not authenticated', [
                    'media_id' => $media->getKey(),
                ]);
            }
        } catch (\Exception $e) {
            // Log error but don't break the download
            Log::error('Failed to log download: ' . $e->getMessage(), [
                'media_id' => $media->getKey(),
                'user_id' => Auth::id(),
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }

        // Return file download response with cache control headers
        $response = Response::download($fullPath, $fileName);
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');
        return $response;
    }
}
