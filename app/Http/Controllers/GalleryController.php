<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Course;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $Courses = Course::paginate(12);
        $title = 'Courses Exhibition';
        return view('project.gallery' , compact('Courses' , 'title'));
    }

    public function search(Request $request)
    {
        $Courses = Course::where('title' , 'like' , "%{$request->search}%")->paginate(12);
        $title = 'Search results for: ' . $request->search ;
        return view('project.gallery' , compact('Courses' , 'title'));
    }
}
