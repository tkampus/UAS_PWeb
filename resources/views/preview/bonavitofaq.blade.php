<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>{{$toko->namatoko}}</title>

   <!-- Bootstrap -->
   <link href="../preview/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="../preview/css/style.css" rel="stylesheet" type="text/css">
   <link href="../preview/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="80">


   <nav class="navbar navbar-default navbar-fixed-top before-color">
      <div class="container">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand alo" href="{{$toko->namatoko}}">{{$toko->namatoko}}</a>
         </div>
         <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right scroll-to">
               <li class="active"><a href="#home">Home</a></li>
               <li><a href="../{{$toko->namatoko}}#about">About</a></li>
               <li><a href="../{{$toko->namatoko}}#contact">Contact</a></li>
               <li><a href="../{{$toko->namatoko}}#produk">Produks</a></li>
               <li><a href="../faq/{{$toko->namatoko}}">FAQ</a></li>
            </ul>
         </div><!--/.nav-collapse -->
      </div><!--/.container-fluid -->
   </nav>


   <div class="page-title">
      <div class="container text-center">
         <h3>FAQ</h3>
         <span class="border-line"></span>
      </div>
   </div>
   <div class="container section-padding">
      <div class="table-responsive">
         <table class="table " id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>FAQ</th>
               </tr>
            </thead>
            <tbody>
               @foreach($faq as $item)
               <tr>
                  <td>
                     <h4 style="color: #03a9f4">{{$item->pesan}}</h4>
                     <p><b>Jawaban : </b>{{$item->jawaban}}</p>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>

   <footer class="footer">
      <div class="container text-center">
         <span class="alo">{{$toko->namatoko}}</span>
         <span class="copyright">&copy; Copyright 2023. {{$toko->namatoko}} By <a href="/">Produku</a></span>
      </div>
   </footer>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <!-- data table -->
   <script src="../preview/datatables/jquery.min.js"></script>
   <script src="../preview/datatables/jquery.dataTables.min.js"></script>
   <script src="../preview/datatables/dataTables.bootstrap4.min.js"></script>
   <script src="../preview/datatables/datatables-demo.js"></script>

</body>

</html>