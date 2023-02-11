<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'oppo',
                'price' => '25000',
                'description' => 'A smart phone with 106gb ram',
                'category' => 'mobile',
                'gallery' => 'https://tse2.mm.bing.net/th?id=OIP.cp6RhXfWOqX41PoJLAlw6gHaF7&pid=Api&P=0',
            ],
            [
                'name' => 'vivo',
                'price' => '15200',
                'description' => 'A smart phone with 8gb ram',
                'category' => 'mobile',
                'gallery' => 'https://www.pakmobizone.pk/wp-content/uploads/2019/02/vivo-Y91C-1.png',
            ],
            [
                'name' => 'LED',
                'price' => '92500',
                'description' => 'A smart tv',
                'category' => 'tv',
                'gallery' => 'https://tse4.mm.bing.net/th?id=OIP.Ut0Fd0BGFab0qqCy11caDwHaE9&pid=Api&P=0',
            ],
            [
                'name' => 'clock',
                'price' => '50000',
                'description' => 'A smart phone with 8gb ram',
                'category' => 'clock',
                'gallery' => 'https://tse1.mm.bing.net/th?id=OIP.7WPITsV5NbXdolMxfiYvkwHaEo&pid=Api&P=0',
            ]
        ]);
    }
}