<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>{{$toko->namatoko}}</title>

   <!-- Bootstrap -->
   <link href="preview/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="preview/css/style.css" rel="stylesheet" type="text/css">
   <link href="preview/css/flexslider.css" rel="stylesheet" type="text/css">
   <link href="preview/icons/css/ionicons.min.css" rel="stylesheet" type="text/css">
   <link href="preview/icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">

   <!--revolution slider setting css-->
   <link href="preview/rs-plugin/css/settings.css" rel="stylesheet">
   <link href="preview/css/prettyPhoto.css" rel="stylesheet" type="text/css" />

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="80">


   <!-- Static navbar -->
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
               <li><a href="#about">About</a></li>
               <li><a href="#produk">Produks</a></li>
               <li><a href="#contact">Contact & Ulasan</a></li>
               <li><a href="faq/{{$toko->namatoko}}">FAQ</a></li>
            </ul>
         </div><!--/.nav-collapse -->
      </div><!--/.container-fluid -->
   </nav>


   <div class="fullwidthbanner" id="home">
      <div class="tp-banner">
         <ul>
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
            <!-- SLIDE 1 -->
            <li data-transition="fade" data-slotamount="7" data-masterspeed="1500">
               <!-- MAIN IMAGE -->
               <img src="{{$img2}}" alt="desk" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
               <!-- LAYERS -->
               <!-- LAYER NR. 1 -->
               <div class="tp-caption slider-title" data-x="center" data-y="center" data-voffset="-30" data-speed="500" data-start="1200" data-easing="Power4.easeInOut">
                  welcome to <span>{{$toko->namatoko}}</span>
               </div> <!-- /tp-caption -->
               <!-- LAYER NR. 2 -->
               <div class="tp-caption slider-caption" data-x="center" data-y="center" data-voffset="40" data-speed="500" data-start="1800" data-easing="Power4.easeInOut" data-captionhidden="on">
                  Menikmati cita rasa yang menggugah selera
               </div> <!-- /tp-caption -->>
            </li>

         </ul>
      </div>
   </div><!--full width banner-->

   <!-- about -->
   <section id="about" class="section-padding">
      <div class="container">
         <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
               <div class="section-title">
                  <h1>About <span class="alo">{{$toko->namatoko}}</span></h1>
                  <span class="border-line"></span>
                  <p class="lead subtitle-caption">
                     {{$toko->detailtoko}}
                  </p>
               </div>
            </div>
         </div><!-- title row end-->
      </div><!--container-->
   </section><!--about section end-->

   <div class="team" id="produk">
      <div class="container">
         <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
               <div class="section-title text-center">
                  <h1> <span class="alo">{{$toko->namatoko}}</span> Produks</h1>
                  <span class="border-line"></span>
                  <p class="lead subtitle-caption">
                     Toko {{$toko->namatoko}}
                  </p>
               </div>
            </div>
         </div>
         <div class="row">
            <!-- produk -->
            @foreach($produk as $item)
            <div class="col-sm-4 margin-bottom30">
               <?php
               $img = asset('storage/file/' . $item->idtoko . '/produk/' . $item->foto);
               ?>
               <div class="team-box">
                  <img src="{{$img}}" class="img-responsive" alt="">
                  <ul class="social list-inline">
                     <li><a href="#">.</a></li>
                  </ul>
               </div>
               <div class="team-desc">
                  <h4>{{$item->namaproduk}}</h4>
                  <em>{{$item->size}} / {{$item->harga}}</em>
                  <em>{{$item->detail}}</em>
               </div>
            </div><!--team col end-->
            @endforeach
            <!-- end produk -->
         </div>
      </div>
   </div><!--team section end-->


   <section id="contact" class="section-padding">
      <div class="container">
         <div class="col-md-4 contact-details">
            <div class="row">
               <div class="col-md-1">
                  <i class="ion-ios-location-outline"></i>
               </div>
               <div class="col-md-8">
                  <h4>{{$toko->alamat}}</h4>
               </div>
            </div>
            <div class="row">
               <div class="col-md-1">
                  <i class="ion-ios-email-outline"></i>
               </div>
               <div class="col-md-8">
                  <h4><a href="{{$toko->shope}}" style="color:white">Shope</a></h4>
               </div>
            </div>
            <div class="row">
               <div class="col-md-1">
                  <i class="ion-ios-email-outline"></i>
               </div>
               <div class="col-md-8">
                  <h4><a href="{{$toko->tokopedia}}" style="color:white">Tokopedia</a></h4>
               </div>
            </div>
            <div class="row">
               <div class="col-md-1">
                  <i class="ion-ios-telephone-outline"></i>
               </div>
               <div class="col-md-8">
                  <h4>{{$toko->notoko}}</h4>
               </div>
            </div>
         </div>

         <div class="row col-md-8">
            <div class="col-sm-6" style="width:100%; ">
               <form class="contact-form" method="post" action="{{ route('kirimulasan') }}">
                  @csrf
                  <h3>Berikan Ulasan</h3>
                  @if(session('success'))
                  <span style="color: #00be00; font-weight: bold; font-size: 12px;">{{ session('success') }}</span>
                  @endif
                  <div class="row">
                     <div class="col-md-12">
                        <div class="row control-group">
                           <div class="form-group col-xs-12 controls">
                              <input type="hidden" name="idtoko" value="{{$toko->idtoko}}">
                              <input type="text" name="nama" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                              <p class="help-block"></p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="row control-group">
                           <div class="form-group col-xs-12 controls">
                              <input type="email" name="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                              <p class="help-block"></p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row control-group">
                     <div class="form-group col-xs-12 controls">
                        <textarea rows="5" class="form-control" name="pesan" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                        <p class="help-block"></p>
                     </div>
                  </div>
                  <!-- <div class="row control-group">
                     <div class="form-group col-xs-12 controls">
                        <textarea rows="5" class="form-control" name="jawaban" placeholder="Jawaban" id="message" required data-validation-required-message="Please enter a message."></textarea>
                        <p class="help-block"></p>
                     </div>
                  </div> -->
                  <br>
                  <div id="success"></div>
                  <div class="row">
                     <div class="form-group col-xs-12 text-right">
                        <button type="submit" class="btn btn-white btn-lg">Kirim Ulasan</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </section><!--contact section end-->

   <footer class="footer">
      <div class="container text-center">
         <span class="alo">{{$toko->namatoko}}</span>
         <span class="copyright">&copy; Copyright 2023. {{$toko->namatoko}} By <a href="/">Produku</a></span>
      </div>
   </footer>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="preview/js/jquery.min.js" type="text/javascript"></script>
   <script src="preview/js/moderniz.min.js" type="text/javascript"></script>
   <script src="preview/js/jquery.easing.1.3.js" type="text/javascript"></script>
   <!-- bootstrap js-->
   <script src="preview/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   <script type="text/javascript" src="preview/js/jquery.flexslider-min.js"></script>
   <script type="text/javascript" src="preview/js/parallax.min.js"></script>
   <script type="text/javascript" src="preview/js/jquery.prettyPhoto.js"></script>
   <script type="text/javascript" src="preview/js/jqBootstrapValidation.js"></script>
   <!--revolution slider scripts-->
   <script src="preview/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
   <script src="preview/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
   <script src="preview/js/template.js" type="text/javascript"></script>

</body>

</html>