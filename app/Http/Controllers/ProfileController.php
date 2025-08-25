<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;

class ProfileController extends Controller
{
    // Tampilkan halaman profil
    public function show()
    {
        $user = \App\Models\User::find(Auth::id());
        $profile = $user->profile; // bisa null
        return view('profile', compact('user', 'profile'));
    }

    // Tampilkan halaman pengaturan
    public function settings()
    {
        $user = \App\Models\User::find(Auth::id());
        $profile = $user->profile;
        return view('pengaturan', compact('user', 'profile'));
    }

    // Update profil: nama, password (opsional), avatar
    public function update(Request $request)
    {
        $user = \App\Models\User::find(Auth::id());

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|max:2048',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Update nama
        $user->name = $request->name;

        // Update password jika diisi
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        // Ambil profile, buat baru jika belum ada
        $profile = $user->profile;
        if (!$profile) {
            $profile = new Profile();
            $profile->user_id = $user->id;
        }

        // Upload avatar jika ada
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($profile->avatar) {
                Storage::disk('public')->delete($profile->avatar);
            }

            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $profile->avatar = $avatarPath;
        }

        $profile->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
