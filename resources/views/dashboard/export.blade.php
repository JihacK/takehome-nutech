<table class="table" id="tblProduk">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Kategori Produk</th>
        <th scope="col">Harga Barang</th>
        <th scope="col">Harga Jual</th>
        <th scope="col">Stok</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($produk as $p)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->kategori->nama }}</td>
            <td>{{ $p->harga_beli }}</td>
            <td>{{ $p->harga_jual }}</td>
            <td>{{ $p->stok }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>