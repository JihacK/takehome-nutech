<?php

namespace App\Exports;

use App\Models\Produk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProdukExport implements FromView
{
    public function view(): View
    {
        return view('dashboard.export',[
            'produk' => Produk::get()
        ]);
    }
}
