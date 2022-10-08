<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create(['name' => 'fatma 7besha']);
        Author::create(['name' => 'mohamed 3rabe']);
        Author::create(['name' => 'mohamed alzaer']);
        Author::create(['name' => 'omar alnoaoy']);
        Author::create(['name' => 'maged 3toa']);
        Author::create(['name' => 'reaad samr']);
    }
}
