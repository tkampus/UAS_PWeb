@extends('seller\master')

@section('konten')
<div class="jdl">
   <h2>Detail Toko</h2>
</div>
<div class="main">
   <div>
      @if (session('success'))
      <span style="color: #00be00; font-weight: bold; font-size: 12px;">{{ session('success') }}</span>
      @endif
      <form action="{{ route('updateprofil') }}" class="f-ipt" method="post" enctype="multipart/form-data">
         @csrf
         <div class="ipt">
            <label for="">Nama Toko
               @error('namatoko')
               <span style="color: red; font-style: italic; font-size: 12px;">{{ $message }}</span>
               @enderror
            </label>
            <input type="text" name="namatoko" style="text-transform: capitalize;" value="{{$toko->namatoko}}{{ old('namatoko') }}" id="">
         </div>
         <div class="ipt">
            <label for="">Alamat Toko</label>
            <input type="text" name="alamat" value="{{$toko->alamat}}{{ old('alamat') }}" id="">
         </div>
         <div class="ipt">
            <label for="">No hp/Wa Toko</label>
            <input type="number" name="notoko" value="{{$toko->notoko}}{{ old('notoko') }}" id="">
         </div>
         <div class="ipt">
            <label for="">Alamat Shope</label>
            <input type="text" name="shope" value="{{$toko->shope}}{{ old('shope') }}" id="">
         </div>
         <div class="ipt">
            <label for="">Alamat Tokopedia</label>
            <input type="text" name="tokoped" value="{{$toko->tokopedia}}{{ old('tokopedia') }}" id="">
         </div>
         <div class="ipt">
            <label for="">Nama Pemilik Toko</label>
            <input type="text" name="namauser" value="{{$toko->namapemilik}}{{ old('namapemilik') }}" id="">
         </div>
         <div class="ipt">
            <label for="">WA pemilik Toko</label>
            <input type="number" name="nouser" value="{{$toko->nopemilik}}{{ old('nopemilik') }}" id="">
         </div>
         <div class="ipt">
            <label for="">Detail Toko</label>
            <textarea rows="" cols="detail" name="detail">{{$toko->detailtoko}}{{ old('detailtoko') }}</textarea>
         </div>
         <div class="ipt">
            <label for="">Foto Provil Toko
               @error('fotoprovil')
               <span style="color: red; font-style: italic; font-size: 12px;">{{ $message }}</span>
               @enderror
            </label>
            <div class="ipt-file">
               <label for="fotoprovil">type file : jpeg,ico,jpg,gif | max:2mb</label>
               <input type="file" name="fotoprovil" id="fotoprovil" value="{{ old('fotoprovil') }}">
            </div>
         </div>
         <div class="ipt">
            <label for="">Foto Backgroud Toko
               @error('fotobg')
               <span style="color: red; font-style: italic; font-size: 12px;">{{ $message }}</span>
               @enderror
            </label>
            <div class="ipt-file">
               <label for="fotobg">type file : jpeg,jpg,gif | max:5mb</label>
               <input type="file" name="fotobg" id="fotobg" value="{{ old('fotobg') }}">
            </div>
         </div>

         <div class=" ipt btn-s">
            <input type="submit" name="tambah" value="Update data" class="iptc">
         </div>
      </form>
   </div>
   <div class="t-tengah">
      <div class="background-profil">
         <p>
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
         </p>
         <img src="{{$img2}}" alt="">
      </div>
      <div class="logo-profil">
         <img src="{{$img1}}" alt="Gambar">

      </div>
   </div>
   <script>
      var fileIpt = document.getElementsByClassName('ipt-file');
      fileIpt = Array.from(fileIpt);
      fileIpt.forEach((fileInput) => {
         fileInput.children[1].addEventListener('change', (event) => {
            const file = event.target.files[0]; // Mendapatkan file yang dipilih

            // Validasi jenis file dan ukuran
            if (file.type.includes('image/') && file.size <= 5 * 1024 * 1024) {
               fileInput.children[0].innerText = file.name;
               // console.log('Nama File:', file.name);
               // Lakukan tindakan lain di sini, seperti mengirim file ke server
            } else {
               fileInput.children[0].innerText = 'File tidak valid. Harap pilih file gambar dengan ukuran maksimum 2MB.';
               // console.log('File tidak valid. Harap pilih file gambar dengan ukuran maksimum 2MB.');
            }
         });
      })
   </script>
   @endsection