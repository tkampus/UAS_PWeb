 @extends('seller\master')

 @section('konten')
 <!-- <link href="/css/chart-app.css" rel="stylesheet"> -->
 <div class="jdl">
    <h2>Daftar View Produk</h2>
    <!-- <p>{{$days}}</p> -->
 </div>
 <div class="main">
    <div class="kotak">
       <div class="card shadow">
          <h2>Kunjungan laman profil <a href="../{{$namatoko}}">{{$toko->namatoko}}</a></h2>
          <br>
          <div class="chart-container">
             <canvas id="lineChart1"></canvas>
             <hr>
             <p>
                Rekam Kunjungan Laman Web Provil Satu Minggu Terakhir
             </p>
          </div>
       </div>
       <br><br>
       <div class="card shadow">
          <h2>Kunjungan laman FAQ <a href="../faq/{{$namatoko}}">{{$toko->namatoko}}</a></h2>
          <br>
          <div class="chart-container">
             <canvas id="lineChart2"></canvas>
             <hr>
             <p>
                Rekam Kunjungan Laman Web FaQ Satu Minggu Terakhir
             </p>
          </div>
       </div>
    </div>
    <div class="kotak">
       <div class="card shadow">
          <h2>Data Kunjungan</h2>
          <br>
          <p>Total Kunjungan</p>
          <table class="tabel-jumlah-visitor wp">
             <thead>
                <tr>
                   <td></td>
                   <td>Visits</td>
                   <td>Visitor</td>
                </tr>
             </thead>
             <tbody>
                <tr>
                   <td>Profil</td>
                   <td>{{str_replace('"', '', $totalvisit)}}</td>
                   <td>{{str_replace('"', '', $totalvisitor)}}</td>
                </tr>
                <tr>
                   <td>FAQ</td>
                   <td>{{str_replace('"', '', $totalvisitfaq)}}</td>
                   <td>{{str_replace('"', '', $totalvisitorfaq)}}</td>
                </tr>
                <tr>
                   <td>Total</td>
                   <td>{{str_replace('"', '', $totalvisitfaq)+str_replace('"', '', $totalvisit)}}</td>
                   <td>{{str_replace('"', '', $totalvisitorfaq)+str_replace('"', '', $totalvisitor)}}</td>
                </tr>
             </tbody>
          </table>
       </div>
    </div>
 </div>

 <script>
    var dataVisitor = <?php echo ($visitor) ?>;
    var dataVisit = <?php echo ($visit) ?>;
    var dataHari = <?php echo ($days) ?>;
    var dataHariFaq = <?php echo ($daysFaq) ?>;
    var dataFaqVisitor = <?php echo ($visitorFaq) ?>;
    var dataFaqVisit = <?php echo ($visitFaq) ?>;
 </script>
 <script src="/js/chart.js"></script>
 <script src="/js/chart-app.js"></script>

 @endsection