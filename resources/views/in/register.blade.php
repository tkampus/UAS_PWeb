<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Daftar-PRODUKU</title>
   <link rel="stylesheet" href="/css/style.css">
   <link rel="stylesheet" href="/css/style1.css">
</head>

<body class="w3">
   <div class="kotak-login login1">
      <div class=" kotak-login wp ">
         <div class="logo-login">
            <img src="/img/logo_produku.png" alt="">
         </div>
         <div class="f-ipt">
            <form action="{{route('actionregister')}}" method="post">
               @csrf
               <div class="ipt">
                  @if(session('message'))
                  <p style="color: blue; font-style: italic;">Account successfully created</p>
                  @endif
                  @if ($errors->any())
                  @foreach ($errors->all() as $error)
                  <p style="color: red; font-style: italic;">{{ $error }}</p>
                  @endforeach
                  @endif
                  <label for="id">Email Addres</label>
                  <input type="email" id="id" name="email">
               </div>
               <div class="ipt">
                  <label for="id">Password</label>
                  <input type="password" id="id" name="password" min="5">
               </div>
               <div class="ipt">
                  <label for="id">Confirm Password</label>
                  <input type="password" id="id" name="password_confirmation" min="5">
               </div>
               <div class="ipt">
                  <input type="submit" value="Sign Up" name="daftar" class="btn wid-10">
               </div>
            </form>
         </div>
      </div>
      <div class="kotak-login">
         <div class="main232 t-tengah">
            <div class="garis">
               <hr>
            </div>
            <p class="t2"> Or Continue With </p>
            <div class="garis">
               <hr>
            </div class="garis">
         </div>
         <div>
            <div class="t-tengah login-w">
               <div class="diblk"><a href=""><img src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-suite-everything-you-need-know-about-google-newest-0.png" width="30" /></a></div>
               <div class="diblk"><a href=""><img src="https://www.freepnglogos.com/uploads/facebook-logo-icon/facebook-logo-icon-facebook-icon-png-images-icons-and-png-backgrounds-1.png" width="35" /></a></div>
               <div class="diblk"><a href=""><img src="https://www.freepnglogos.com/uploads/instagram-icon-png/instagram-logo-download-computer-neon-instagram-icons-image-23.png" width="30" /></a></div>
            </div>
         </div>
         <div class="t-tengah">
            <p>Already have an account?. <a href="login">Login</a></p>
         </div>
      </div>
   </div>
</body>

</html>