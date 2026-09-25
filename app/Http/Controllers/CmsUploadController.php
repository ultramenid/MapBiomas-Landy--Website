<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CmsUploadController extends Controller
{
    /**
     * Handle secure uploads from TinyMCE rich text editor.
     */
    public function upload(Request $request): JsonResponse
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'file' => [
                'required',
                'file',
                'max:15360', // 15MB
                'mimes:jpg,jpeg,png,gif,webp,pdf,doc,docx,xls,xlsx',
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first('file'),
            ], 422);
        }

        $file = $request->file('file');

        // Strictly disallow executable extensions as a secondary defense
        $extension = strtolower($file->getClientOriginalExtension());
        $disallowed = [
            'php', 'php3', 'php4', 'php5', 'phtml', 'phar',
            'html', 'htm', 'shtml', 'htaccess', 'htpasswd',
            'exe', 'bat', 'sh', 'cmd', 'cgi', 'pl', 'jsp', 'asp', 'aspx', 'svg'
        ];

        if (in_array($extension, $disallowed, true)) {
            return response()->json(['error' => 'File extension not permitted.'], 422);
        }

        // Store file with a secure random hash name in storage/app/public/uploads/editor
        $path = $file->store('uploads/editor', 'public');

        return response()->json([
            'location' => Storage::disk('public')->url($path),
        ]);
    }
}
