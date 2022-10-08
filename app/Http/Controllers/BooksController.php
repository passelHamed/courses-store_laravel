<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\category;
use App\Models\publisher;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Traits\ImageUploadTrait;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class BooksController extends Controller
{

    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.IndexBooks' , compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $publishers = publisher::all();
        $categories = category::all();
        return view('admin.CreateBook' , compact('authors' , 'publishers' , 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Book $book)
    {
        $this->validate($request,[
            'title' => 'required',
            'isbn'  => ['required', 'alpha_num' , Rule::unique('books' , 'isbn')],
            'cover_image' => 'required|image',
            'category_id'    => 'nullable',
            'publisher_id'   => 'nullable',
            'author_id'      => 'nullable',
            'description' => 'nullable',
            'publish_year' => 'numeric|nullable',
            'number_of_pages' => 'numeric|required',
            'number_of_copies' => 'numeric|required',
            'price' => 'numeric|required',
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->cover_image = $this->uploadImage($request->cover_image);
        $book->isbn = $request->isbn;
        $book->category_id = $request->category;
        $book->publisher_id = $request->publisher;
        $book->description = $request->description;
        $book->publish_year = $request->publish_year;
        $book->number_of_pages = $request->number_of_pages;
        $book->number_of_copies = $request->number_of_copies;
        $book->price = $request->price;
        $book->save();
        $book->authors()->attach($request->author);
        session()->flash('flash_message' , 'The book has been added successfully');
        return redirect('/admin/books/'.$book->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.ShowBook' , compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all();
        $publishers = publisher::all();
        $categories = category::all();
        return view('admin.editBook' , compact('book' , 'authors' , 'publishers' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request,[
            'title' => 'required',
            'cover_image' => 'image',
            'category_id'    => 'nullable',
            'publisher_id'   => 'nullable',
            'author_id'      => 'nullable',
            'description' => 'nullable',
            'publish_year' => 'numeric|nullable',
            'number_of_pages' => 'numeric|required',
            'number_of_copies' => 'numeric|required',
            'price' => 'numeric|required',
        ]);
        $book->title = $request->title;
        if ($request->has('cover_image')) {
            Storage::disk('public')->delete($book->cover_image);
            $book->cover_image = $this->uploadImage($request->cover_image);
        }
        $book->isbn = $request->isbn;
        $book->category_id = $request->category;
        $book->publisher_id = $request->publisher;
        $book->description = $request->description;
        $book->publish_year = $request->publish_year;
        $book->number_of_pages = $request->number_of_pages;
        $book->number_of_copies = $request->number_of_copies;
        $book->price = $request->price;
        if ($book->isDirty('isbn')) {
            $this->validate($request,[
                'isbn'  => ['required', 'alpha_num' , Rule::unique('books' , 'isbn')],
            ]);
        };
        $book->save();
        $book->Authors()->detach();
        $book->authors()->attach($request->author);
        session()->flash('flash_message' , 'The book has been successfully updated');
        return redirect('/admin/books/'.$book->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        Storage::disk('public')->delete($book->cover_image);
        $book->delete();
        session()->flash('flash_message', 'The book has been successfully deleted');
        return redirect('admin/books');
    }

    public function ShowBook($id)
    {
        $book = Book::findOrFail($id);
        return view('Project.detailsBook' , compact('book'));
    }


    public function rate(Request $request , Book $book)
    {
        if (Auth()->user()->rated($book)) {
            $rating = Rating::where(['user_id' => auth()->user()->id , 'book_id' => $book->id])->first();
            $rating->value = $request->value;
            $rating->save();
        }else{
            $rating = new Rating();
            $rating->user_id = auth()->user()->id;
            $rating->book_id = $book->id;
            $rating->value = $request->value;
            $rating->save();
        }
        return back();
    }


    public function details($id)
    {
        $book = Book::findOrFail($id);
        $bookFind = 0;
        if (Auth::check()) {
            $bookFind = auth()->user()->ratedpurches()->where('book_id' , $book->id)->first();
        }
        return view('project.detailsBook' , compact('' , 'book'));
    }
}
