<?php

namespace App\Http\Controllers;

use App\Exports\ProdukExport;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index',[
            'title' => "Data Produk",
            'kategori' => Kategori::all(),
            'produk' => Produk::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tambah_produk',[
            'title' => "Tambah Produk",
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $tambah = request()->validate([
            'nama' => 'required|max:255',
            'gambar' => 'image|file|max:2560',
            'kategori_id' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required'
        ]);

        if(request()->file('gambar')){
            $tambah['gambar'] = request()->file('gambar')->store('gambar-produk');
        }

        Produk::create($tambah);
        return redirect('/produk')->with('success','Produk telah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('dashboard.ubah_produk',[
            'title' => 'Ubah Data Produk',
            'produk' => $produk,
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdukRequest  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $ubah = request()->validate([
            'nama' => 'required|max:100',
            'gambar' => 'image|file|max:2560',
            'kategori_id' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric'
        ]);
        if(request()->file('gambar')){
            if(request()->gambar_lama){
                Storage::delete(request()->gambar_lama);
            }
            $ubah['gambar'] = request()->file('gambar')->store('gambar-produk');
        }
        Produk::where('id', $produk->id)
                ->update($ubah);
        return redirect('/produk')->with('success','Produk telah berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        if($produk->gambar){
            Storage::delete($produk->gambar);
        }
        Produk::destroy($produk->id);
        return redirect('/produk')->with('success','Produk telah berhasil dihapus!');
    }

    public function export_excel(){
        return Excel::download(new ProdukExport,'produk.xlsx');
    }
}
