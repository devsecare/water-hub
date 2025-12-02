<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\DownloadLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class FileDownloadController extends Controller
{
    public function download(Request $request, File $file)
    {
        // Check if file exists
        if (!Storage::disk('local')->exists($file->path)) {
            abort(404, 'File not found');
        }

        // Get the file path
        $filePath = Storage::disk('local')->path($file->path);

        // Log the download (automatic tracking)
        try {
            if (Auth::check()) {
                $logData = [
                    'file_id' => $file->id,
                    'media_id' => null,
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
                    'file_id' => $file->id,
                ]);
            }
        } catch (\Exception $e) {
            // Log error but don't break the download
            Log::error('Failed to log download: ' . $e->getMessage(), [
                'file_id' => $file->id,
                'user_id' => Auth::id(),
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }

        // Increment download count
        $file->incrementDownloadCount();

        // Return file download response with cache control headers
        $response = Response::download($filePath, $file->original_name);
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');
        return $response;
    }

    public function getSignedUrl(Request $request, File $file)
    {
        // Check if file exists
        if (!Storage::disk('local')->exists($file->path)) {
            abort(404, 'File not found');
        }

        // Generate a temporary signed URL (valid for 1 hour)
        $url = Storage::disk('local')->temporaryUrl(
            $file->path,
            now()->addHour(),
            [
                'ResponseContentDisposition' => 'attachment; filename="' . $file->original_name . '"',
            ]
        );

        return response()->json([
            'url' => $url,
            'expires_at' => now()->addHour()->toIso8601String(),
        ]);
    }
}

