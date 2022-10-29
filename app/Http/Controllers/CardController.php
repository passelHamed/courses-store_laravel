<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function addToCart(Request $request)
    {
        $Course = Course::find($request->idCourse);
        if (auth()->user()->coursesInCart->contains($Course)) {
            session()->flash('flash_warning', 'You have already purchased this course');
            return redirect()->back();
        } else{
            auth()->user()->coursesInCart()->attach($Course);
        }

        return redirect('/cart');
    }

    public function viewCart()
    {
        $items = auth()->user()->coursesInCart;
        return view('project.indexCart' , compact('items'));
    }

    public function remove(Course $Course)
    {
        auth()->user()->coursesInCart()->detach($Course->id);
        return redirect()->back();
    }
}




