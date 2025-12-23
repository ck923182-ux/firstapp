<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ImageUploadRequest;

class ImageController extends Controller
{
    public function upload(ImageUploadRequest  $request)
    {
        

        // 2. Store the file in public storage
        $path = $request->file('image')->store('uploads', 'public');

        // 3. Create full URL
        $url = asset('storage/' . $path);

        // 4. Return JSON response
        return response()->json([
            'message' => 'Image uploaded successfully',
            'file_path' => $path,
            'url' => $url,
        ]);
    }

}
