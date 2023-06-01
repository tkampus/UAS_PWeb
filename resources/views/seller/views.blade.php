 @extends('seller\master')

 @section('konten')
 <div class="jdl">
    <h2>Daftar View Produk</h2>
 </div>
 <div class="main">
    <div class="kotak">
       <p style="color: red; font-style: italic;">Maaf, Halaman ini belum bisa berfungsi sebagaimana mesetinya.</p>
       <table class="tabel">
          <thead>
             <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kunjungan Produk</th>
             </tr>
          </thead>
          <tbody>
             <tr>
                <td>1</td>
                <td>produk1</td>
                <td>25</td>
             </tr>
             <tr>
                <td>2</td>
                <td>produk2</td>
                <td>10</td>
             </tr>
          </tbody>
       </table>
    </div>
    @endsection