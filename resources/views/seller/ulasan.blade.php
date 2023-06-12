 @extends('seller\master')

 @section('konten')
 <link href="/preview/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 <link href="/preview/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <div class="jdl">
    <h2>Daftar Ulasan</h2>
 </div>
 <div class="main">
    <div>
       <!--  -->
       <div class="container section-padding">
          @if (session('success'))
          <span style="color: #00be00; font-weight: bold; font-size: 12px;">{{ session('success') }}</span>
          @endif
          <div class="table-responsive">
             <table class="table tabel-ulasan" id="dataTable" width="100%" cellspacing="0">
                <thead>
                   <tr>
                      <th rowspan="2">
                         <p>Pengirim</p>
                      </th>
                      <th rowspan="2">
                         <p>Date</p>
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
                      <form action="{{ route('upulasan') }}" method="post">
                         @csrf
                         <input type="hidden" name="id" value="{{$item->id}}" id="{{$item->id}}">
                         <td>
                            <p><b>{{$item->nama}}</b></p>
                            <p>{{$item->email}}</p>
                         </td>
                         <td>
                            <p>{{$item->created_at}}</p>
                         </td>
                         <td>
                            <p><b>{{$item->pesan}}</b></p>
                            <textarea class="textarea-auto" oninput="autoResize(this)" name="jwb" readonly>{{$item->jawaban}}</textarea>
                         </td>
                         <td class="aksi">
                            @if($item->faq == 1)
                            <button type="submit" name="up" value="faq-1" class="aksi-1">yes</button>
                            @elseif($item->faq == 0)
                            <button type="submit" name="up" value="faq-2" class="aksi-2">no</button>
                            @endif
                         </td>
                         <td class="aksi">
                            <button type="submit" name="up" value="del" class="aksi-3">del</button>
                         </td>
                         <td class="aksi">
                            <div>
                               <button type="button" name="up" class="aksi-1" onclick="edit(this)">edit</button>
                            </div>
                            <div style="display: none">
                               <button type="submit" name="up" value="up" class="aksi-1">update</button>
                               <button type="button" class="aksi-3" onclick="an(this)">batal</button>
                            </div>
                         </td>
                      </form>
                   </tr>
                   @endforeach
                </tbody>
             </table>
             <script>
                function edit(tbl) {
                   var siblingDiv = tbl.parentNode.nextElementSibling;
                   var parentDiv = tbl.parentNode;
                   siblingDiv.style.display = 'block';
                   parentDiv.style.display = 'none';

                   var textarea = parentDiv.parentNode.parentNode.querySelector('.textarea-auto');
                   textarea.removeAttribute('readonly');
                }

                function an(tbl) {
                   var siblingDiv = tbl.parentNode.previousElementSibling;
                   var parentDiv = tbl.parentNode;
                   siblingDiv.style.display = 'block';
                   parentDiv.style.display = 'none';

                   var textarea = siblingDiv.parentNode.parentNode.querySelector('.textarea-auto');
                   textarea.setAttribute('readonly', 'readonly');
                }

                function autoResize(textarea) {
                   textarea.style.height = 'auto';
                   textarea.style.height = textarea.scrollHeight + 'px';
                }
                window.addEventListener('DOMContentLoaded', function() {
                   var textarea = document.querySelector('.textarea-auto');
                   autoResize(textarea);
                });
             </script>
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