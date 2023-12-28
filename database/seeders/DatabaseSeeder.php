<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Item;
use App\Models\User;
use App\Models\Item_detail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::create([
            'username' => 'rizky',
            'email' => 'cahzello@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin'

        ]);

        User::create([
            'username' => 'yukina minato',
            'email' => 'yukina@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'user'
        ]);

        Item::create([
            'user_id' => 11,
            'bahan_baku' => 'Teping Tapioka'
        ]);

        $data = [
            'bulan' => ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'],
            'beli' => [1800, 1900, 1800, 1950, 1950, 1850, 1900, 1850, 1800, 1700, 1750, 1800],
            'penggunaan' => [1950, 1750, 1650, 1790, 1950, 1900, 1925, 1725, 1830, 1650, 1530, 1900]
        ];

        foreach ($data['bulan'] as $i => $bulan) {
            $beli = $data['beli'][$i];
            $penggunaan = $data['penggunaan'][$i];
        
            Item_detail::create([
                'item_id' => 1,
                'bulan' => $bulan,
                'jumlah_pembelian' => $beli,
                'jumlah_penggunaan' => $penggunaan,
                'biaya_pemesanan' => 47916,
                'biaya_penyimpanan' => rand(1, 99),
                'leadtime' => rand(1, 9),
            ]);
        }
    }
}
