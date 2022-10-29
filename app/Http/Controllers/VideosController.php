<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\video;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        // $videos = $course->videos();
        $courses = Course::findOrFail($course->id);
        $title = 'Videos';
        return view('admin.indexVideos' , compact('courses','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $courses = Course::findOrFail($id);
        return view('admin.createVideo' , compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'video'  => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
            'course_id' => 'nullable',
        ]);

        $file = $request->file('video');
        $file->move('upload' , $file->getClientOriginalName());
        $file_name = $file->getClientOriginalName();

        $video = new video();
        $video->title = $request->title;
        $video->description = $request->description;
        $video->video = $file_name;
        $video->course_id = $request->course_id;
        $video->save();
        Session()->flash('flash_message','The Video has been added successfully');
        return redirect('/admin/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = video::findOrFail($id);
        return view('admin.ShowVideo' , compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        // Storage::disk('upload')->delete($video->video);
        // $video->delete();
        // session()->flash('flash_message' , 'The video has been deleted successfully');
        // return redirect()->back();
    }

    public function indexVideos($id)
    {
        // $videos = $course->videos();
        // $videos = video::all();
        $courses = Course::findOrFail($id);
        $title = 'Videos';
        return view('project.indexVideos' , compact('courses','title'));
    }

    public function showVideos($id)
    {
        $video = video::findOrFail($id);
        return view('project.ShowVideo' , compact('video'));
    }
}
