<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\category;
use App\Models\Course;
use App\Models\Explainer;
use App\Models\publisher;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $number_of_courses = Course::count();
        $number_of_Explainers = Explainer::count();
        $number_of_users = User::count();
        return view('admin.index' , compact('number_of_courses','number_of_Explainers' , 'number_of_users'));
    }
}
