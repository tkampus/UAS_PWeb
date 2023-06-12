<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\toko;
use App\Models\produk;
use App\Models\ulasan;
use App\Models\visitor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class sellerController extends Controller
{

    public function index()
    {
        return redirect('seller/profil');
    }
    public function profil()
    {
        $userId = Auth::id();
        $toko = toko::where('idtoko', $userId)->first();
        return view('seller/profil', ['toko' => $toko]);
    }

    public function updateprofil(Request $request)
    {
        // ambil data id dan data toko
        $userid = Auth::id();
        $toko = toko::where('idtoko', $userid)->first();
        $update = [
            'alamat' => $request->get('alamat') ? $request->get('alamat') : '',
            'tokopedia' => $request->get('tokoped') ? $request->get('tokoped') : '',
            'notoko' => $request->get('notoko') ? $request->get('notoko') : '',
            'namapemilik' => $request->get('namauser') ? $request->get('namauser') : '',
            'nopemilik' => $request->get('nouser') ? $request->get('nouser') : '',
            'detailtoko' => $request->get('detail') ? $request->get('detail') : '',
            'shope' => $request->get('shope') ? $request->get('shope') : ''
        ];
        // cek apakah namatoko berubah dan duplikat
        if ($request->get('namatoko') !== $toko->namatoko) {
            $validator = Validator::make(
                $request->all(),
                [
                    'namatoko' => ['required', 'string', 'max:255', 'unique:tokos'],
                ],
                [
                    'namatoko.required' => 'Kolom nama toko harus diisi.',
                    'namatoko.string' => 'Kolom nama toko harus berupa string.',
                    'namatoko.max' => 'Kolom nama toko maksimal memiliki 255 karakter.',
                    'namatoko.unique' => 'Nama toko sudah digunakan oleh toko lain.',
                ]
            );
            if ($validator->fails()) {
                return redirect('seller/profil')->withErrors($validator)->withInput();
            } else {
                $update['namatoko'] = $request->get('namatoko');
            }
        }
        // update data toko 
        toko::where('idtoko', $userid)->update($update);
        // cek validasi gambar
        $validator = Validator::make(
            $request->all(),
            [
                'fotobg' => ['nullable', 'image', 'mimes:jpeg,jpg,gif', 'max:5048'],
                'fotoprovil' => ['nullable', 'image', 'mimes:jpeg,ico,jpg,gif', 'max:5048'],
            ],
            [
                'fotoprovil.image' => 'Foto profil harus berupa gambar.',
                'fotoprovil.mimes' => 'Format foto profil harus jpeg, ico, jpg, atau gif.',
                'fotoprovil.max' => 'Ukuran foto profil maksimum adalah 5048 KB.',
                'fotobg.image' => 'Foto latar belakang harus berupa gambar.',
                'fotobg.mimes' => 'Format foto latar belakang harus jpeg, jpg, atau gif.',
                'fotobg.max' => 'Ukuran foto latar belakang maksimum adalah 5048 KB.',
            ]
        );
        // inputkan gambar provil
        if ($validator->passes('fotoprovil')) {
            if ($request->hasFile('fotoprovil')) {
                $file = $request->file('fotoprovil');
                $folder = 'public/file/' . Auth::id() . '/pp/';
                if (Storage::exists($folder)) {
                    Storage::deleteDirectory($folder);
                }
                // Buat folder baru
                Storage::makeDirectory($folder);
                $extension = $file->getClientOriginalExtension(); // Mendapatkan ekstensi file asli
                $fileName = uniqid() . '.' . $extension; // Menyimpan nama file dengan ekstensi yang sama
                $file->storeAs($folder, $fileName);
                toko::where('idtoko', $userid)->update([
                    'fotoprovil' => $fileName
                ]);
            }
        }
        // input gambar bg
        if ($validator->passes('fotobg')) {
            if ($request->hasFile('fotobg')) {
                $file1 = $request->file('fotobg');
                $folder1 = 'public/file/' . Auth::id() . '/bg/';
                if (Storage::exists($folder1)) {
                    Storage::deleteDirectory($folder1);
                }
                // Buat folder baru
                Storage::makeDirectory($folder1);
                // simpan file
                $extension = $file1->getClientOriginalExtension(); // Mendapatkan ekstensi file asli
                $fileName = uniqid() . '.' . $extension; // Menyimpan nama file dengan ekstensi yang sama
                $file1->storeAs($folder1, $fileName);
                toko::where('idtoko', $userid)->update([
                    'fotobg' => $fileName
                ]);
            }
        }

        if ($validator->fails()) {
            return redirect('seller/profil')->withErrors($validator)->withInput();
        }
        $request->session()->flash('success', 'Profil berhasil diperbarui.');
        return redirect('seller/profil');
    }
    
    public function produk()
    {
        $userId = Auth::id();
        $toko = toko::where('idtoko', $userId)->first();
        $produk = produk::where('idtoko', $userId)->get();
        return view('seller/produk', ['produk' => $produk, 'toko' => $toko]);
    }
    public function createproduk(Request $request)
    {
        // Validasi data yang diterima dari POST request
        $validatedData = $request->validate([
            'nama-p' => 'required',
            'size1' => 'required',
            'detail-p' => 'required',
            'fotop' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'harga' => 'required|numeric',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'image' => 'File :attribute harus berupa gambar.',
            'mimes' => 'File :attribute harus memiliki format: :values.',
            'max' => 'File :attribute tidak boleh lebih dari :max kilobita.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
        ]);

        // Mendapatkan ID toko dari Auth::id()
        $idtoko = Auth::id();

        // Menyimpan foto produk ke dalam direktori
        $foto = $request->file('fotop');
        $extension = $foto->getClientOriginalExtension(); // Mendapatkan ekstensi file asli
        $namaFoto = uniqid() . '.' . $extension; // Menyimpan nama file dengan ekstensi yang sama
        $foto->storeAs('public\file\\' . Auth::id() . '\\produk', $namaFoto);

        // Membuat instance model Produk dan mengisi data
        produk::create([
            'idtoko'  => $idtoko,
            'namaproduk' => $request->get('nama-p'),
            'size'  => $request->get('size1'),
            'detail'  => $request->get('detail-p'),
            'foto'  => $namaFoto,
            'harga'  => $request->get('harga')
        ]);
        return redirect('seller/produk');
    }
    public function deleteproduk(Request $request)
    {
        $userId = Auth::id();
        $produk = produk::where('id', $request->idproduk)->first();
        $dir = 'public\file\\' . Auth::id() . '\\produk\\' . $produk->foto;
        Storage::delete($dir);
        $produk->delete();
        return redirect('seller/produk');
    }
    public function views()
    {
        $userId = Auth::id();
        $toko = toko::where('idtoko', $userId)->first();
        $namatoko = str_replace(' ', '%20', $toko->namatoko);

        // Mendapatkan tanggal 7 hari yang lalu
        $startDate = Carbon::now()->subDays(7)->startOfDay();

        // Menyimpan data nama hari;
        $hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu", "Minggu"];

        // Mendapatkan tanggal hari ini
        $endDate = Carbon::now()->endOfDay();

        // Mengambil data pengunjung laman 'kedainenek' dalam rentang waktu
        $visitors = visitor::where('page', $namatoko)
            ->whereBetween('date', [$startDate, $endDate])
            ->orderBy('date')
            ->get();
        $faqVisitors = visitor::where('page', 'faq/' . $namatoko)
            ->whereBetween('date', [$startDate, $endDate])
            ->orderBy('date')
            ->get();

        // Mengambil jumlah total visits dan visitor
        $totalVisits = Visitor::where('page', $namatoko)->sum('visits');
        $totalVisitors = Visitor::where('page', $namatoko)->sum('visitor');
        $totalVisitsFaq = Visitor::where('page', 'faq/' . $namatoko)->sum('visits');
        $totalVisitorsFaq = Visitor::where('page', 'faq/' . $namatoko)->sum('visitor');

        // Membuat array kosong untuk menyimpan data pengunjung dan hari-hari
        $visitorData = [];
        $visitData = [];
        $visitorFaqData = [];
        $visitFaqData = [];
        $daysOfWeek = [];
        $daysOfWeekFaq = [];

        // Memasukkan data pengunjung ke dalam array $visitorData dan hari-hari ke dalam array $daysOfWeek
        foreach ($visitors as $visitor) {
            $visitorData[] = $visitor->visitor;
            $visitData[] = $visitor->visits;
            $daysOfWeek[] = $hari[Carbon::parse($visitor->date)->format('N') - 1];
        }
        foreach ($faqVisitors as $visitor) {
            $visitorFaqData[] = $visitor->visitor;
            $visitFaqData[] = $visitor->visits;
            $daysOfWeekFaq[] = $hari[Carbon::parse($visitor->date)->format('N') - 1];
        }

        // Mengisi nilai default 0 jika data pengunjung tidak mencukupi
        $missingDays = 7 - count($visitorData);
        for ($i = 1; $i < $missingDays; $i++) {
            $visitorData[] = 0;
            $visitData[] = 0;
            $daysOfWeek[] = $hari[Carbon::parse($startDate)->addDays($i)->format('N') - 1];
        }
        $missingDays = 7 - count($visitorFaqData);
        for ($i = 1; $i < $missingDays; $i++) {
            $visitorFaqData[] = 0;
            $visitFaqData[] = 0;
            $daysOfWeekFaq[] = $hari[Carbon::parse($startDate)->addDays($i)->format('N') - 1];
        }

        // Memasukkan data ke dalam variabel untuk digunakan dalam view
        return view('seller/views', [
            'toko' => $toko,
            'visitor' => json_encode($visitorData),
            'visit' => json_encode($visitData),
            'visitorFaq' => json_encode($visitorFaqData),
            'visitFaq' => json_encode($visitFaqData),
            'days' => json_encode($daysOfWeek),
            'daysFaq' => json_encode($daysOfWeekFaq),
            'totalvisit' => json_encode($totalVisits),
            'totalvisitor' => json_encode($totalVisitors),
            'totalvisitfaq' => json_encode($totalVisitsFaq),
            'totalvisitorfaq' => json_encode($totalVisitorsFaq),
            // ===============
            'namatoko' => $namatoko,
        ]);
    }
    public function ulasan()
    {
        $userId = Auth::id();
        $toko = toko::where('idtoko', $userId)->first();
        $ulasan = ulasan::where('idtoko', $userId)->where('faq', '!=', 2)->get();
        return view('seller/ulasan', ['toko' => $toko, 'ulasan' => $ulasan]);
    }
    public function upulasan(Request $request)
    {
        $id = $request->id;
        $pesan = "Data ulasan Berhasil di update";
        switch ($request->up) {
            case 'faq-1':
                ulasan::where('id', $id)->update([
                    'faq' => 0,
                ]);
                // echo 'batalkan faq';
                break;
            case 'faq-2':
                ulasan::where('id', $id)->update([
                    'faq' => 1,
                ]);
                // echo 'jadikan faq';
                break;
            case 'up':
                ulasan::where('id', $id)->update([
                    'jawaban' => $request->jwb,
                ]);
                // echo 'update jawaban';
                break;
            case 'del':
                ulasan::where('id', $id)->update([
                    'faq' => 2,
                ]);
                $pesan = "Ulasan berhasil di hapus";
                // echo 'hapus ulasan';
                break;
        }
        return redirect()->back()->with('success', $pesan);
    }
}
