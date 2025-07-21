<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CkeditorController extends Controller
{


     public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|file|mimes:jpg,jpeg,png,gif,webp|max:10240',
        ]);

        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $path = 'ckeditor/media';

            $fileName = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path($path), $fileName);

            $fileUrl = asset("public/".$path . '/' . $fileName);

            return response()->json([
                'uploaded' => 1,
                'fileName' => $fileName,
                'url' => $fileUrl,
            ]);
        }

        return response()->json([
            'uploaded' => 0,
            'error' => [
                'message' => 'No file uploaded',
            ],
        ]);
    }
}
