<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Explainer;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Traits\ImageUploadTrait;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class CoursesController extends Controller
{

    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Courses = Course::all();
        return view('admin.IndexCourses' , compact('Courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Courses = Course::all();
        $Explainers = Explainer::all();
        return view('admin.CreateCourse' , compact('Courses' , 'Explainers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Course $course)
    {
        $this->validate($request,[
            'title' => 'required',
            'cover_image' => 'required|image',
            'description' => 'nullable',
            'explainer_id'   =>  'nullable',
            'publish_year' => 'numeric|nullable',
            'number_of_videos' => 'numeric|required',
            'number_of_hours' => 'numeric|required',
            'price' => 'numeric|required',
        ]);

        $course = new Course();
        $course->title = $request->title;
        $course->cover_image = $this->uploadImage($request->cover_image);
        $course->explainer_id = $request->explainer;
        $course->description = $request->description;
        $course->publish_year = $request->publish_year;
        $course->number_of_videos = $request->number_of_videos;
        $course->number_of_hours = $request->number_of_hours;
        $course->price = $request->price;
        $course->save();

        session()->flash('flash_message' , 'The Course has been added successfully');
        return redirect('/admin/courses/'.$course->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Course = Course::findOrFail($id);
        return view('admin.ShowCourse' , compact('Course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Course = Course::findOrFail($id);
        $Explainers = Explainer::all();
        return view('admin.editCourse' , compact('Course' , 'Explainers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->validate($request,[
            'title' => 'required',
            'cover_image' => 'nullable|image',
            'description' => 'nullable',
            'explainer_id'   =>  'nullable',
            'publish_year' => 'numeric|nullable',
            'number_of_videos' => 'numeric|required',
            'number_of_hours' => 'numeric|required',
            'price' => 'numeric|required',
        ]);
        $course->title = $request->title;
        if ($request->has('cover_image')) {
            Storage::disk('public')->delete($course->cover_image);
            $course->cover_image = $this->uploadImage($request->cover_image);
        }
        $course->explainer_id = $request->explainer;
        $course->description = $request->description;
        $course->publish_year = $request->publish_year;
        $course->number_of_videos = $request->number_of_videos;
        $course->number_of_hours = $request->number_of_hours;
        $course->price = $request->price;
        $course->save();
        session()->flash('flash_message' , 'The Course has been successfully updated');
        return redirect('/admin/courses/'.$course->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $Course)
    {
        Storage::disk('public')->delete($Course->cover_image);
        $Course->delete();
        session()->flash('flash_message', 'The Course has been successfully deleted');
        return redirect('admin/courses');
    }

    public function ShowCourse($id)
    {
        $Course = Course::findOrFail($id);
        $CourseFind = 0;
        if (Auth::check()) {
            $CourseFind = auth()->user()->ratedpurches()->where('Course_id' , $Course->id)->first();
        }
        return view('Project.detailsCourse' , compact('CourseFind' ,'Course'));
    }


    public function rate(Request $request , Course $Course)
    {
        if (Auth()->user()->rated($Course)) {
            $rating = Rating::where(['user_id' => auth()->user()->id , 'course_id' => $Course->id])->first();
            $rating->value = $request->value;
            $rating->save();
        }else{
            $rating = new Rating();
            $rating->user_id = auth()->user()->id;
            $rating->course_id = $Course->id;
            $rating->value = $request->value;
            $rating->save();
        }
        return back();
    }
}
