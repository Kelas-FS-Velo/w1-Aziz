<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            return response()->json(['path' => $path], 200);
        }

        return response()->json(['error' => 'Upload gagal'], 400);
    }
}
