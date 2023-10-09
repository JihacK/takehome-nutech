@extends('dashboard.layout.main')
@section('isi')
  <div class="container mt-5">
    <div class="row g-3">
      <div class="col-12">
        <img class="img-fluid" src="{{ asset('img/Frame 98700.png') }}" alt="">
      </div>
      <div class="col-12">
        <h4>{{ $user->name }}</h4>
      </div>
      <div class="col-8">
        <label for="inputNama" class="form-label">Nama Kandidat</label>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><i class="bi bi-at"></i></span>
          <input type="text" class="form-control" id="inputNama" value="{{ $user->name }}" disabled>
        </div>
      </div>
      <div class="col-4">
        <label for="inputPosisi" class="form-label">Posisi Kandidat</label>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><i class="bi bi-code-slash"></i></span>
          <input type="text" class="form-control" id="inputPosisi" value="{{ $user->position }}" disabled>
        </div>
      </div>
    </div>
  </div>
@endsection
