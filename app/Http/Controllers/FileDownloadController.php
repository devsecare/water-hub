<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\DownloadLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class FileDownloadController extends Controller
{
    public function download(Request $request, File $file)
    {
        // File is automatically resolved via route model binding

        // Check if file exists
        if (!Storage::disk('local')->exists($file->path)) {
            abort(404, 'File not found on disk');
        }

        // Get full path
        $filePath = Storage::disk('local')->path($file->path);

        // Log download
        if (Auth::check()) {
            try {
                DownloadLog::create([
                    'file_id' => $file->id,
                    'media_id' => null,
                    'user_id' => Auth::id(),
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'downloaded_at' => now(),
                ]);
            } catch (\Exception $e) {
                // Don't break download if logging fails
            }
        }

        // Increment download count
        try {
            $file->incrementDownloadCount();
        } catch (\Exception $e) {
            // Don't break download if increment fails
        }

        // Download file using Laravel's standard method
        return Response::download($filePath, $file->original_name);
    }

    public function getSignedUrl(Request $request, File $file)
    {
        if (!Storage::disk('local')->exists($file->path)) {
            abort(404, 'File not found');
        }

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
