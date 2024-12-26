<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileExampleController extends Controller
{
    public function upload(Request $request)
    {
        $path = $request->file('file')->store('uploads', 's3');
        $url = Storage::disk('s3')->url($path);
        Upload::create(['url' => $url]);

        return redirect()->back();
    }

    public function download($uploadId)
    {
        $upload = Upload::find($uploadId);
        $filename = basename($upload->url);

        $file = Storage::disk('s3')->get('uploads/'. $filename);

        return response($file, 200)
            ->header('Content-Type', 'application/octet-stream')
            ->header('Content-Disposition', 'attachement; filename="'.$filename. '"');

    }
}
