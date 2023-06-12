<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;

class Rvisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Mendapatkan URL halaman saat ini
        $currentPage = $request->path();
        // Mendapatkan tanggal hari ini
        $currentDate = date('Y-m-d');
        // Mengecek apakah pengunjung sudah tercatat di session pada tanggal hari ini
        $visitorKey = 'visitor_' . $currentPage . '_' . $currentDate;
        // Mendapatkan data visitor hari ini
        $visitor = Visitor::where('page', $currentPage)->where('date', $currentDate)->first();
        // Cek apakah sudah ada yang mengunjungi hari ini
        if (!$visitor) {
            Visitor::create([
                'page' => $currentPage,
                'date' => $currentDate,
                'visits' => 1,
                'visitor' => 1,
            ]);
            $request->session()->put($visitorKey, true);
        } else {
            if (!$request->session()->has($visitorKey)) {
                // Jika pengunjung belum tercatat, buat data baru dan set session
                $request->session()->put($visitorKey, true);
                // Tambah Jumlah pengunjung
                $visitor->visitor++;
            }
            // Tambahkan jumlah kunjungan
            $visitor->visits++;
            $visitor->save();
        }
        return $next($request);
    }
}
