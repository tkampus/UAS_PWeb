<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\toko;
use Session;
use Illuminate\Support\Facades\Storage;


class registerController extends Controller
{
    public function register()
    {
        if (Auth::check()) {
            return redirect('seller/profil');
        } else {
            return view('in/register');
        }
    }

    public function actionregister(Request $request)
    {

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => "seller",
            'active' => 1
        ]);

        $toko = toko::create([
            'idtoko' => $user->id,
            'namatoko' => '',
            'alamat' => '',
            'tokopedia' => '',
            'notoko' => '',
            'namapemilik' => '',
            'nopemilik' => '',
            'detailtoko' => '',
            'fotoprovil' => '',
            'fotobg' => '',
            'shope' => '',
        ]);

        $folderPath = 'public\file\\' . $user->id; // Ganti dengan path yang sesuai
        Storage::makeDirectory($folderPath);

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('register');
    }
}
