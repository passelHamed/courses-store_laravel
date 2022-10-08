<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        return view('admin.indexCategories' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.CreateCategory');
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

        $category = new category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        session()->flash('flash_message' , 'The category has been added successfully');
        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::FindOrFail($id);
        return view('admin.EditCategory' , compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $this->validate($request , [
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        session()->flash('flash_message' , 'The category has been successfully Updated');
        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();
        session()->flash('flash_message' , 'The category has been deleted successfully');
        return redirect('/admin/categories');
    }

    public function indexCategories()
    {
        $categories = category::all()->sortBy('name');
        $title = 'categories';
        return view('project.categories' , compact('categories' , 'title'));
    }

    public function showCategories(category $category)
    {
        $books = $category->books()->paginate(12);
        $title = 'Books belonging to : ' . $category->name;
        return view('project.gallery' , compact('books' , 'title'));
    }

    public function search(Request $request)
    {
        $categories = category::where('name' , 'like' , "%{$request->search}%")->get()->sortBy('name');
        $title = 'Search results for: ' . $request->search;
        return view('project.categories' , compact('categories' , 'title'));
    }
}
