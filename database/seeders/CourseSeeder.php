<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\category;
use App\Models\Course;
use App\Models\Explainer;
use App\Models\publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'Explainer_id' => Explainer::where('name' , 'test')->first()->id,
            'title'        => 'Remote Recruitment',
            'number_of_videos' => '300',
            'number_of_hours' => '288',
            'price'     => '17',
            'cover_image' => 'images/covers/1.png',
            'description' => 'Course 1',
            'publish_year' => '1966',
        ]);

        Course::create([
            'Explainer_id' => Explainer::where('name' , 'test')->first()->id,
            'title'        => 'Remote Recruitment 2',
            'number_of_videos' => '300',
            'number_of_hours' => '288',
            'price'     => '20',
            'cover_image' => 'images/covers/2.png',
            'description' => 'Course 2',
            'publish_year' => '1966',
        ]);

        Course::create([
            'Explainer_id' => Explainer::where('name' , 'test')->first()->id,
            'title'        => 'Remote Recruitment 3',
            'number_of_videos' => '300',
            'number_of_hours' => '288',
            'price'     => '33',
            'cover_image' => 'images/covers/3.png',
            'description' => 'Course 3',
            'publish_year' => '1966',
        ]);

        Course::create([
            'Explainer_id' => Explainer::where('name' , 'test')->first()->id,
            'title'        => 'Remote Recruitment 4',
            'number_of_videos' => '300',
            'number_of_hours' => '288',
            'price'     => '44',
            'cover_image' => 'images/covers/4.png',
            'description' => 'Course 4',
            'publish_year' => '1966',
        ]);

        Course::create([
            'Explainer_id' => Explainer::where('name' , 'test')->first()->id,
            'title'        => 'Remote Recruitment 5',
            'number_of_videos' => '300',
            'number_of_hours' => '288',
            'price'     => '55',
            'cover_image' => 'images/covers/5.png',
            'description' => 'Course 5',
            'publish_year' => '1966',
        ]);

        Course::create([
            'Explainer_id' => Explainer::where('name' , 'test')->first()->id,
            'title'        => 'Remote Recruitment 6',
            'number_of_videos' => '300',
            'number_of_hours' => '288',
            'price'     => '66',
            'cover_image' => 'images/covers/6.png',
            'description' => 'Course 6',
            'publish_year' => '1966',
        ]);

    }
}
