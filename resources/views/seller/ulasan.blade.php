 @extends('seller\master')

 @section('konten')
 <link href="/preview/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 <link href="/preview/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <div class="jdl">
    <h2>Daftar Ulasan</h2>
 </div>
 <div class="main">
    <div>
       <p style="color: red; font-style: italic;margin-bottom : 5px;">Maaf, Halaman ini belum bisa berfungsi sebagaimana mesetinya.</p>
       <!--  -->
       <div class="container section-padding">
          <div class="table-responsive">
             <table class="table tabel-ulasan" id="dataTable" width="100%" cellspacing="0">
                <thead>
                   <tr>
                      <th rowspan="2">
                         <p>Pengirim</p>
                      </th>
                      <th rowspan="2">
                         <p>Ulasan</p>
                      </th>
                      <th colspan="3">Aksi</th>
                   </tr>
                   <tr>
                      <th>FAQ</th>
                      <th>Hapus</th>
                      <th>Up</th>
                   </tr>
                </thead>
                <tbody>
                   @foreach($ulasan as $item)
                   <tr>
                      <td>
                         <p><b>{{$item->nama}}</b></p>
                         <p>{{$item->email}}</p>
                      </td>
                      <td>
                         <p><b>{{$item->pesan}}</b></p>
                         <p>{{$item->jawaban}}</p>
                      </td>
                      <td>wfkhb</td>
                      <td>weskfj</td>
                      <td>weskfj</td>
                   </tr>
                   @endforeach
                </tbody>
             </table>
          </div>
       </div>
    </div>
    <!-- data table -->
    <script src="/preview/datatables/jquery.min.js"></script>
    <script src="/preview/datatables/jquery.dataTables.min.js"></script>
    <script src="/preview/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/preview/datatables/datatables-demo.js"></script>
 </div>
 @endsection