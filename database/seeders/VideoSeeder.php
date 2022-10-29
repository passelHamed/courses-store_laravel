<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Explainer;
use App\Models\video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        video::create([
            'title' => 'introduction programming',
            'description' => 'the first video',
            'course_id'  => 1,
            'video' => '',
        ]);
    }
}
