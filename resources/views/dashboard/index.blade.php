@extends('dashboard.layout.main')
@section('isi')
  <h4>{{ $title }}</h4>
  @if (session()->has('success'))
   <div class="alert alert-info alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <div class="container mt-5">
    <div class="row">
      <div class="col-2">
        <input type="text" class="form-control form-control-sm" id="filterNama" onkeyup="saringNama()" placeholder="Cari ..." title="Type in a name">
      </div>
      <div class="col-2">
        <select class="form-select form-select-sm" id="filterKategori" oninput="saringKategori()">
          <option>Semua</option>
            @foreach ($kategori as $k)
              <option>{{ $k->nama }}</option>
            @endforeach
        </select>
      </div>
      <div class="col-5"></div>
      <div class="col-3">
        <a href="/export_excel" class="btn btn-success btn-sm" target="_blank"><i class="bi bi-file-earmark-spreadsheet"></i> Export Excel</a> 
        <a href="/produk/create" class="btn btn-danger btn-sm"><i class="bi bi-plus-circle"></i> Tambah Produk</a>
      </div>
    </div>
  </div>

  <div class="container mt-3">
    <div class="row">
      <div class="col">
        <table class="table" id="tblProduk">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Gambar</th>
              <th scope="col">Nama Produk</th>
              <th scope="col">Kategori Produk</th>
              <th scope="col">Harga Beli (Rp)</th>
              <th scope="col">Harga Jual (Rp)</th>
              <th scope="col">Stok Produk</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($produk as $p)
              <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>@if ($p->gambar)
                    <img class="img-fluid img-thumbnail" style="width: 48px; height: 48px;" src="{{ asset('storage/'.$p->gambar) }}" alt="{{ $p->nama }}">
                  @else
                  <img class="img-fluid img-thumbnail" style="width: 48px; height: 48px;" src="https://us.123rf.com/450wm/pavelstasevich/pavelstasevich1811/pavelstasevich181101027/112815900-no-image-available-icon-flat-vector.jpg" alt="{{ $p->nama }}">
                  @endif</td>
                  <td>{{ $p->nama }}</td>
                  <td>{{ $p->kategori->nama }}</td>
                  <td>{{ $p->harga_beli }}</td>
                  <td>{{ $p->harga_jual }}</td>
                  <td>{{ $p->stok }}</td>
                  <td><a href="/produk/{{ $p->id }}/edit" class="badge bg-primary border-0"><i class="bi bi-pencil-square"></i></a> <form action="/produk/{{ $p->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button onclick="return confirm('Apakah Anda yakin?')" class="badge bg-danger border-0"><i class="bi bi-trash"></i></button>
                  </form></td>
              </tr>
              @endforeach
          </tbody>
          </table>
      </div>
    </div>
  </div>

<script>
$(document).ready( function () {
  $('#tblProduk').DataTable({
    searching : false
  });
});

function saringNama() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("filterNama");
  filter = input.value.toUpperCase();
  table = document.getElementById("tblProduk");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
      }
    }
  }
}

function saringKategori() {
  let dropdown, table, rows, cells, kategori, filter;
  dropdown = document.getElementById("filterKategori");
  table = document.getElementById("tblProduk");
  rows = table.getElementsByTagName("tr");
  filter = dropdown.value;

  for (let row of rows) {
    cells = row.getElementsByTagName("td");
    kategori = cells[2] || null;
    if (filter === "Semua" || !kategori || (filter === kategori.textContent)) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  }
}
</script>
@endsection
