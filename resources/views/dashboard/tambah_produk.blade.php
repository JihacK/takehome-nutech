@extends('dashboard.layout.main')
@section('isi')
  <h4><span class="text-secondary">Daftar Produk</span> > {{ $title }}</h4>
  <div class="container mt-5">
    <form class="row g-3" action="/produk" method="POST" enctype="multipart/form-data" oninput="harga_jual.value=parseFloat(harga_beli.value)+(parseFloat(harga_beli.value)*0.3)">
      @csrf
      <div class="col-md-4">
        <label for="inputKategori" class="form-label">Kategori</label>
        <select name="kategori_id" class="form-select" id="inputKategori">
          <option selected>Pilih Kategori</option>
          @foreach ($kategori as $k)
          <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? ' selected' : ' ' }}>{{ $k->nama }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-8">
        <label for="inputNama" class="form-label @error('nama')
        is-invalid
      @enderror">Nama Barang</label>
        <input type="text" name="nama" class="form-control" id="inputNama" placeholder="Nama Produk" value="{{ old('nama') }}" required autofocus>
        @error('nama')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div>
      <div class="col-4">
        <label for="inputHargaBeli" class="form-label @error('harga_beli')
        is-invalid
      @enderror">Harga Beli</label>
        <input type="text" name="harga_beli" class="form-control" id="inputHargaBeli" placeholder="Harga Beli" value="{{ old('harga_beli') }}" required>
        @error('harga_beli')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div>
      <div class="col-4">
        <label for="inputHargaJual" class="form-label @error('harga_jual')
        is-invalid
      @enderror">Harga Jual</label>
        <input type="text" name="harga_jual" class="form-control" id="inputHargaJual" placeholder="Harga Jual" value="{{ old('harga_jual') }}" required>
        @error('harga_jual')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div>
      <div class="col-4">
        <label for="inputStok" class="form-label @error('stok')
        is-invalid
      @enderror">Stok Barang</label>
        <input type="text" name="stok" class="form-control" id="inputStok" placeholder="Stok" value="{{ old('stok') }}" required>
        @error('stok')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div>
      {{-- <div class="col-md-12">
        <label for="inputGambar" class="form-label @error('gambar')
        is-invalid
      @enderror">Gambar</label>
        <input name="gambar" class="form-control form-control-sm" id="gambar" type="file" id="inputGambar">
        @error('gambar')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div> --}}
      <div class="file-upload col-12">
        <div class="image-upload-wrap">
          <input class="file-upload-input" name="gambar" type='file' onchange="readURL(this);" accept="image/*" />
          <div class="drag-text @error('gambar')
          is-invalid
        @enderror">
            <h3>Drag and drop a file or select add Image</h3>
          </div>
        </div>
        <div class="file-upload-content">
          <img class="file-upload-image" src="#" alt="your image" />
          <div class="image-title-wrap">
            <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
          </div>
        </div>
        @error('gambar')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="col-12">
        <a href="/produk" class="btn btn-success"><i class="bi bi-arrow-bar-left"></i> Kembali</a> <button type="submit" class="btn btn-primary"><i class="bi bi-plus-square"></i> Tambah</button>
      </div>
    </form>
  </div>

<script>
  function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
		$('.image-upload-wrap').addClass('image-dropping');
	});
	$('.image-upload-wrap').bind('dragleave', function () {
		$('.image-upload-wrap').removeClass('image-dropping');
});

</script>
@endsection
