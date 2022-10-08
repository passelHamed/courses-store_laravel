<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\category;
use App\Models\publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book1 = Book::create([
            'category_id' => category::where('name' , 'leading businesses')->first()->id,
            'publisher_id' => publisher::where('name' , 'passel hamed')->first()->id,
            'title'        => 'Remote Recruitment',
            'number_of_copies' => '300',
            'number_of_pages' => '288',
            'price'     => '17',
            'isbn'     => '100000000000',
            'cover_image' => 'images/covers/1.png',
            'description' => 'book 1'
        ]);
        $book1->Authors()->attach(Author::where('name', 'fatma 7besha')->first());

        $book2 = Book::create([
            'category_id' => category::where('name' , 'freelance work')->first()->id,
            'publisher_id' => publisher::where('name' , 'passel hamed')->first()->id,
            'title'        => 'Remote Recruitment 2',
            'number_of_copies' => '400',
            'number_of_pages' => '258',
            'price'     => '20',
            'isbn'     => '1000000000002',
            'cover_image' => 'images/covers/2.png',
            'description' => 'book 2'
        ]);
        $book2->Authors()->attach(Author::where('name', 'mohamed 3rabe')->first());

        $book3 = Book::create([
            'category_id' => category::where('name' , 'sales and marketing')->first()->id,
            'publisher_id' => publisher::where('name' , 'passel hamed')->first()->id,
            'title'        => 'Remote Recruitment 3',
            'number_of_copies' => '100',
            'number_of_pages' => '388',
            'price'     => '33',
            'isbn'     => '1000000000003',
            'cover_image' => 'images/covers/3.png',
            'description' => 'book 3'
        ]);
        $book3->Authors()->attach(Author::where('name', 'mohamed alzaer')->first());

        $book4 = Book::create([
            'category_id' => category::where('name' , 'the design')->first()->id,
            'publisher_id' => publisher::where('name' , 'passel hamed')->first()->id,
            'title'        => 'Remote Recruitment 4',
            'number_of_copies' => '200',
            'number_of_pages' => '488',
            'price'     => '44',
            'isbn'     => '1000000000004',
            'cover_image' => 'images/covers/4.png',
            'description' => 'book 4'
        ]);
        $book4->Authors()->attach(Author::where('name', 'omar alnoaoy')->first());

        $book5 = Book::create([
            'category_id' => category::where('name' , 'programming')->first()->id,
            'publisher_id' => publisher::where('name' , 'passel hamed')->first()->id,
            'title'        => 'Remote Recruitment 5',
            'number_of_copies' => '350',
            'number_of_pages' => '588',
            'price'     => '55',
            'isbn'     => '1000000000005',
            'cover_image' => 'images/covers/5.png',
            'description' => 'book 5'
        ]);
        $book5->Authors()->attach(Author::where('name', 'maged 3toa')->first());

        $book6 = Book::create([
            'category_id' => category::where('name' , 'programming 2')->first()->id,
            'publisher_id' => publisher::where('name' , 'passel hamed')->first()->id,
            'title'        => 'Remote Recruitment 6',
            'number_of_copies' => '323',
            'number_of_pages' => '266',
            'price'     => '66',
            'isbn'     => '1000000000006',
            'cover_image' => 'images/covers/6.png',
            'description' => 'book 6'
        ]);
        $book6->Authors()->attach(Author::where('name', 'reaad samr')->first());

    }
}
