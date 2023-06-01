   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>{{$toko->namatoko}}</title>
      <link rel="stylesheet" href="/css/style.css">
      <link rel="stylesheet" href="/css/style1.css">
   </head>

   <body class="w1">
      <!--  -->
      <div>
         <?php
         if ($toko->fotoprovil) {
            $img1 = asset("storage/file/" . $toko->idtoko . "/pp/" . $toko->fotoprovil);
         } else {
            $img1 = '../img/avatar.png';
         }
         if ($toko->fotobg) {
            $img2 = asset("storage/file/" . $toko->idtoko . "/bg/" . $toko->fotobg);
         } else {
            $img2 = '../img/bgtoko.png';
         }
         ?>
         <div class="preview-bg">
            <img src="{{$img2}}" alt="background">
         </div>
         <div class="preview-logo">
            <img src="{{$img1}}" alt="provil">
         </div>
      </div>
      <!--  -->
      <div class="main1 t-tengah">
         <div class="main1-div">
            <h1>{{$toko->namatoko}}</h1>
            <br>
            <p>{{$toko->detailtoko}}</p><br>
            <p>Alamat : {{$toko->alamat}}</p>
         </div>
         <hr>
      </div>
      <!--  -->
      <div>
         <h1 class="t-tengah">Produk</h1>
         <br>
         <div class="main-t">
            <div></div>
            <div>
               <!--  -->
               @foreach($produk as $item)
               <div class="kotak main3 mb-2 wp bdr-solid t-wb wid-6">
                  <div class="p-foto">
                     <?php
                     $img = asset('storage/file/' . $item->idtoko . '/produk/' . $item->foto);
                     ?>
                     <img src="{{$img}}" alt="">
                     <!-- pp -->
                     <input type="hidden" name="idproduk" value="{{$item->id}}">
                  </div>
                  <div>
                     <h4>Size</h4>
                     <hr class="w3">
                     <div style="padding: 10px 10px 10px 0px;">
                        <h5>Ukuran produk</h5>
                        <input type="text" name="size1" value="{{$item->size}}" class="ipt-mx w4" readonly>
                        <h5>Harga produk</h5>
                        <input type="text" name="size1" value="{{$item->harga}}" class="ipt-mx w4" readonly>
                     </div>
                  </div>
                  <div>
                     <h4>Detail</h4>
                     <hr class="w3">
                     <div class="p-detail">
                        <h5>Nama Produk</h5>
                        <input type="text" name="nama-p" value="{{$item->namaproduk}}" readonly class="ipt-mx w4">
                        <h5>Detail Produk</h5>
                        <textarea name="detailp" id="" rows=7; class="ipt-mx w4" readonly>{{$item->detail}}</textarea>
                     </div>
                  </div>
               </div>
               <!--  -->
               @endforeach
            </div>
         </div>
         <hr><br>
      </div>
      <!--  -->
      <div>
         <h1 class="t-tengah">Kontak</h1>
         <br>
         <div class="main-t">
            <div></div>
            <div class="ipt">
               <a href="{{$toko->shope}}" class="btn" style="width: 100%;">Shoope</a>
               <a href="{{$toko->tokopedia}}" class="btn" style="width: 100%;">Tokopedia</a>
               <?php 
                  if($toko->notoko)
               ?>
               <a href="wa.me/+62 {{$toko->notoko}}" class="btn" style="width: 100%;">No Toko</a>
            </div>
         </div>
      </div>
      <br>
      </div>
      <!--  -->
      <div class="footer" style="padding: 20px;">
         <p class="t-tengah">Copuright @ 2022 Produku</p>
      </div>
   </body>

   </html>