<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jihad Abdurrahman Fauzi',
            'email' => 'jihad.abd2011@yahoo.com',
            'password' => bcrypt('123qwe'),
            'position' => 'PHP Programmer'

        ]);

        Kategori::create([
            'nama' => 'Alat Musik'
        ]);

        Kategori::create([
            'nama' => 'Alat Olahraga'
        ]);

        Produk::create([
            'nama' => 'Jersey Liverpool',
            'kategori_id' => '2',
            'harga_beli' => '1250000',
            'harga_jual' => '1625000',
            'stok' => '120'
        ]);

        Produk::create([
            'nama' => 'Dumbbell 5kg',
            'kategori_id' => '2',
            'gambar' => 'gambar-produk/dumbell.jpg',
            'harga_beli' => '80000',
            'harga_jual' => '140000',
            'stok' => '25'
        ]);

        Produk::create([
            'nama' => 'Yoga Mat',
            'kategori_id' => '2',
            'gambar' => 'gambar-produk/yogamat.jpg',
            'harga_beli' => '120000',
            'harga_jual' => '156000',
            'stok' => '30'
        ]);
    }
}
