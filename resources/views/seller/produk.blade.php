  @extends('seller\master')

  @section('konten')
  <div class="jdl">
     <h2>Daftar Produk</h2>
  </div>
  <div class="main">
     <div>
        <!-- tambah -->

        <!-- @error('fotoprovil')
        <p style="color: red; font-style: italic;">{{ $message }}</p>
        @enderror -->
        @foreach($errors->all() as $error)
        <p style="color: red; font-style: italic;font-size:13px;">{{ $error }}</p>
        @endforeach
        <div class="ipt main3">
           <input type="submit" name="" value="Tambah Produk" class="btn wid-10 tomboltambah">
        </div>
        <form action="{{ route('createproduk') }}" method="post" accept-charset="utf-8" class="formproduk hidden" enctype="multipart/form-data">
           @csrf
           <div class="kotak main3 mab-2 wp bdr-solid">
              <div class="p-foto">
                 <img src="../img/bgtoko.png" alt="">
                 <!-- pp -->
                 <input type="file" name="fotop" class="ipt-mx">
                 <input type="hidden" name="idproduk" value="">
              </div>
              <div>
                 <h4>Size</h4>
                 <hr class="w3">
                 <div style="padding: 10px 10px 10px 0px;">
                    <h5>Ukuran produk</h5>
                    <input type="text" name="size1" value="" class="ipt-mx w4">
                    <h5>Harga produk</h5>
                    <input type="number" name="harga" value="" class="ipt-mx w4">
                 </div>
              </div>
              <div>
                 <h4>Detail</h4>
                 <hr class="w3">
                 <div class="p-detail">
                    <h5>Nama Produk</h5>
                    <input type="text" name="nama-p" class="ipt-mx w4">
                    <h5>Detail Produk</h5>
                    <textarea name="detail-p" id="" rows=7; class="ipt-mx w4 mb-2"></textarea>
                    <p><input type="submit" name="tambah" value="tambahkan" class="ipt-mx w3"></p>
                 </div>
              </div>
           </div>
        </form>
        <!--  -->
        @foreach($produk as $item)
        <form action="{{ route('deleteproduk') }}" method="post" accept-charset="utf-8" class="formproduk" enctype="multipart/form-data">
           @csrf
           <div class="kotak main3 mb-2 wp bdr-solid">
              <div class="p-foto">
                 <!--  -->
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
                    <h5>Harga</h5>
                    <input type="text" name="harga" value="{{$item->harga}}" class="ipt-mx w4" readonly>
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
                    <p><input type="submit" name="hapus" value="Hapus" onclick="return confirm('Menghapus produk {{$item->namaproduk}}?')" class="ipt-mx wm tombolhapus"></p>
                 </div>
              </div>
           </div>
        </form>
        @endforeach
        <!--  -->
        @if($produk->isEmpty())
        <div>
           <p style="color: red; font-style: italic;">Produk belum ada</p>
        </div>
        @endif
     </div>
     <script src="../js/script1.js" type="text/javascript" charset="utf-8" async defer></script>
     @endsection