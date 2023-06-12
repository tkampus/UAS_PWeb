<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\toko;
use App\Models\produk;
use App\Models\ulasan;

class previewController extends Controller
{
    public function index($param)
    {
        // echo $param;
        $toko = toko::where('namatoko', $param)->first();
        $produk = produk::where('idtoko', $toko->idtoko)->get();
        return view('preview/bonavito', ['produk' => $produk, 'toko' => $toko]);
    }
    public function kirimulasan(Request $request)
    {
        ulasan::create([
            'idtoko' => $request->get('idtoko'),
            'email' => $request->get('email'),
            'nama' => $request->get('nama'),
            'pesan' => $request->get('pesan'),
            'faq' => 0,
        ]);
        return back()->with('success', 'ulasan sukses dikirim');
    }
    public function faq($param)
    {
        $toko = toko::where('namatoko', $param)->first();
        $faq = ulasan::where('idtoko', $toko->idtoko)->where('faq', 1)->get();
        return view('preview/bonavitofaq', ['faq' => $faq, 'toko' => $toko]);
    }
}
