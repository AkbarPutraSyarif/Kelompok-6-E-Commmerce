<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::create([
            'name' => 'Indomie',
            'harga' => 7500,
            'image' => 'Barang1.jpg',
            'description' => 'Oreo is the trade name of a type of biscuit produced by Nabisco, first made in 1912.',
            'stock' => 100,
            'expired_date' => '2025-01-01',
        ]);


        Product::create([
            'name' => 'Teh Pucuk',
            'harga' => 7500,
            'image' => 'Barang2.jpg',
            'description' => 'Oreo is the trade name of a type of biscuit produced by Nabisco, first made in 1912.',
            'stock' => 100,
            'expired_date' => '2025-01-01',
        ]);
        Product::create([
            'name' => 'Oreo',
            'harga' => 7500,
            'image' => 'Barang3.jpg',
            'description' => 'Oreo is the trade name of a type of biscuit produced by Nabisco, first made in 1912.',
            'stock' => 100,
            'expired_date' => '2025-01-01',

        ]);
        Product::create([
            'name' => 'Chuba',
            'harga' => 2000,
            'image' => 'Barang4.jpg',
            'description' => 'Makan enak',
            'stock' => 100,
            'expired_date' => '2025-01-01',

        ]);
        Product::create([
            'name' => 'Chiki balls',
            'harga' => 3000,
            'image' => 'Barang5.jpg',
            'description' => 'Berasa kejunya',
            'stock' => 100,
            'expired_date' => '2025-01-01',

        ]);
        Product::create([
            'name' => 'Floridina',
            'harga' => 5000,
            'image' => 'Barang6.jpg',
            'description' => 'Jeruk termahal ini',
            'stock' => 100,
            'expired_date' => '2025-01-01',

        ]);
        Product::create([
            'name' => 'Energen',
            'harga' => 4500,
            'image' => 'Barang7.jpg',
            'description' => 'Kalau mau sehat minum ini',
            'stock' => 100,
            'expired_date' => '2025-01-01',

        ]);
        Product::create([
            'name' => 'Redbull',
            'harga' => 6000,
            'image' => 'Barang8.jpg',
            'description' => 'Minuman berenergi',
            'stock' => 100,
            'expired_date' => '2025-01-01',

        ]);
    }
}