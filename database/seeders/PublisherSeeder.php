<?php

namespace Database\Seeders;

use App\Models\publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        publisher::create(['name' => 'passel hamed']);
    }
}
