<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return view('admin.indexAuthors' , compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.CreateAuthor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $author = new Author();
        $author->name = $request->name;
        $author->description = $request->description;
        $author->save();

        session()->flash('flash_message' , 'The author has been added successfully');
        return redirect('/admin/authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::FindOrFail($id);
        return view('admin.EditAuthor' , compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $this->validate($request , [
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $author->name = $request->name;
        $author->description = $request->description;
        $author->save();

        session()->flash('flash_message' , 'The author has been successfully Updated');
        return redirect('/admin/authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        session()->flash('flash_message' , 'The author has been deleted successfully');
        return redirect('/admin/authors');
    }

    public function indexAuthors()
    {
        $authors = Author::all()->sortBy('name');
        $title = 'Authors';
        return view('project.authors' , compact('authors' , 'title'));
    }

    public function showAuthors(Author $author)
    {
        $books = $author->books()->paginate(12);
        $title = 'Books belonging to : ' . $author->name;
        return view('project.gallery' , compact('books' , 'title'));
    }

    public function search(Request $request)
    {
        $authors = Author::where('name' , 'like' , "%{$request->search}%")->get()->sortBy('name');
        $title = 'Search results for: ' . $request->search;
        return view('project.authors' , compact('authors' , 'title'));
    }
}
