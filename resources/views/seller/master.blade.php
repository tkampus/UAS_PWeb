<!DOCTYPE html>

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PRODUKU</title>
   <link rel="stylesheet" href="/css/style.css">
   <link rel="stylesheet" href="/css/style1.css">
</head>

<body class="w4">
   <div class="head">
      <div class="nav w3" onclick="window.scrollTo({ top: 0, behavior: 'smooth' });">
      </div>
      <div class="sidebar w4">
         <a class="a-logo" href="/seller/profil">
            <img class="logo" src="/img/logo_produku.png" alt="logo">
         </a>
         <a href="/seller/profil">Profil</a>
         <a href="/seller/produk">Produk</a>
         <a href="/seller/views">View</a>
         <a href="/seller/ulasan">Ulasan</a>
         <?php
         if ($toko->namatoko) {
         ?>
            <a href="/{{$toko->namatoko}}">Preview</a>
         <?php
         } else {
         ?>
            <a href="" onclick="alert('Toko anda belum memiliki nama');return false">Preview</a>
         <?php } ?>
         <a href="../actionlogout">logout</a>
      </div>

   </div>
   @yield('konten')
   </div>
</body>

</html>