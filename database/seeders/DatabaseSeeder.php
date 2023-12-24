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
            'password'=> bcrypt('password'),
            'role' => 'admin'
        
        ]);

        User::create([
            'username' => 'yukina minato',
            'email' => 'yukina@gmail.com',
            'password'=> bcrypt('password'),
            'role' => 'user'
        ]);

        Item::create([
            'user_id' => 11,
            'bahan_baku' => 'Coklat'
        ]);

        $bulan = ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];

        foreach ($bulan as $value) {
            Item_detail::create([
                'item_id' => 1,
                'bulan' => $value,
                'jumlah_pembelian' => rand(1, 99),
                'jumlah_penggunaan'=> rand(1, 99),
                'biaya_pemesanan' => rand(1, 99),
                'biaya_penyimpanan' => rand(1, 99),
                'leadtime' => rand(1, 9),
            ]);
        }
    }
}
