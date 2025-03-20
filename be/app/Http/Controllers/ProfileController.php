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

        if ($request->hasFile('gambar')) {
            // upload file baru
            $path = $request->file('gambar')->store('uploads', 'public');

            // cek apakah sudah ada data gambar
            $gambar = Profile::first();

            if ($gambar) {
                // perbarui gambar yang sudah ada
                $gambar->update(['gambar' => $path]);
            } else {
                // buat gambar jika belum ada
                $gambar = Profile::create(['gambar' => $path]);
            }
            return response()->json([
                'message' => 'Upload gambar berhasil',
                'path' => $path,
                'gambar' => $gambar
            ], 200);
        }
    }
}
