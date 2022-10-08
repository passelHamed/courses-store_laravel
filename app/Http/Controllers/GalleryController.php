<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $books = Book::paginate(12);
        $title = 'Books Exhibition';
        return view('project.gallery' , compact('books' , 'title'));
    }

    public function search(Request $request)
    {
        $books = Book::where('title' , 'like' , "%{$request->search}%")->paginate(12);
        $title = 'Search results for: ' . $request->search ;
        return view('project.gallery' , compact('books' , 'title'));
    }
}
