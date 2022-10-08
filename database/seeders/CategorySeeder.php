<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        category::create(['name' => 'leading businesses']);
        category::create(['name' => 'freelance work']);
        category::create(['name' => 'sales and marketing']);
        category::create(['name' => 'the design']);
        category::create(['name' => 'programming']);
        category::create(['name' => 'programming 2']);
    }
}
