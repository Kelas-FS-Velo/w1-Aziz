<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function uploadGambar(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gambar = $request->file('gambar');
        $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
        $gambar->move(public_path('images'), $namaGambar);

        $profile = Profile::find($request->id);
        $profile->gambar = $namaGambar;
        $profile->save();

        return response()->json([
            'message' => 'Gambar berhasil diupload',
            'data' => $profile
        ]);
    }
}
