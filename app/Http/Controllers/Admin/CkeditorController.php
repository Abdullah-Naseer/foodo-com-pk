<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CkeditorController extends Controller
{


    public function upload(Request $request)
    {
        $file = null;
        if ($request->upload) {
            $file = $request->upload;
            $path = "ckeditor/media";

            $fileName = time() . '.' . $file->extension();
            $file->move(public_path($path), $fileName);
            $file_path = asset("public/".$path . '/' . $fileName);
        }
        return response()->json(['url' => $file_path]);
    }
}
