<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\category;
use App\Models\publisher;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $number_of_books = Book::count();
        $number_of_authors = Author::count();
        $number_of_categories = category::count();
        $number_of_publishers = publisher::count();
        return view('admin.index' , compact('number_of_books','number_of_authors','number_of_categories','number_of_publishers'));
    }
}
