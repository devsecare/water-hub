<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\DownloadLog;
use Illuminate\Http\Request;
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

        // Log the download
        DownloadLog::create([
            'file_id' => $file->id,
            'user_id' => auth()->id(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'downloaded_at' => now(),
        ]);

        // Increment download count
        $file->incrementDownloadCount();

        // Return file download response
        return Response::download($filePath, $file->original_name);
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

