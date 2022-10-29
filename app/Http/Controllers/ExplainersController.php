<?php

namespace App\Http\Controllers;

use App\Models\Explainer;
use Illuminate\Http\Request;

class ExplainersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Explainers = Explainer::all();
        return view('admin.indexExplainers' , compact('Explainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.CreateExplainers');
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

        $Explainer = new Explainer();
        $Explainer->name = $request->name;
        $Explainer->description = $request->description;
        $Explainer->save();

        session()->flash('flash_message' , 'The Explainer has been added successfully');
        return redirect('/admin/explainers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Explainer $Explainer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Explainer = Explainer::FindOrFail($id);
        return view('admin.EditExplainers' , compact('Explainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Explainer $Explainer)
    {
        $this->validate($request , [
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $Explainer->name = $request->name;
        $Explainer->description = $request->description;
        $Explainer->save();

        session()->flash('flash_message' , 'The Explainer has been successfully updated');
        return redirect('/admin/explainers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Explainer $Explainer)
    {
        $Explainer->delete();
        session()->flash('flash_message' , 'The Explainer has been deleted successfully');
        return redirect('/admin/explainers');
    }

    public function indexExplainers()
    {
        $Explainers = Explainer::all()->sortBy('name');
        $title = 'Explainers';
        return view('project.Explainers' , compact('Explainers' , 'title'));
    }

    public function search(Request $request)
    {
        $Explainers = Explainer::where('name' , 'like' , "%{$request->search}%")->get()->sortBy('name');
        $title = 'Search results for: ' . $request->search;
        return view('project.Explainers' , compact('Explainers' , 'title'));
    }

    public function showExplainers(Explainer $Explainer)
    {
        $Courses = $Explainer->courses()->paginate(12);
        $title = 'Courses belonging for : ' . $Explainer->name;
        return view('project.gallery' , compact('Courses' , 'title'));
    }
}
