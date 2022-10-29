@extends('layouts.main')

@section('style')
    <style>
        body{
            background:#fff
        }
        .ratings i{
            font-size: 16px;
            color: red;
        }
        .strike-text{
            color: red;
            text-decoration: line-through;
        }
        .product-image{
            width: 100%
        }
        .dot{
            height: 7px;
            width: 7px;
            margin-left: 6px;
            margin-right: 6px;
            margin-top: 3px;
            background-color: blue;
            border-radius: 50%;display: inline-block
        }
        .spec-1{
            color: #938787;
            font-size: 15px
        }
        h5{
            font-weight: 400
        }
        .para{
            font-size: 16px
        }
    </style>
@endsection

<br>
<br>
<br>
<br>
@section('content')
    <div class="container">
        <a href="/" class="btn btn-primary mb-5">
            <i class="fas fa-plus"></i>
            Buy New Course
        </a>
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                @if ($myCourses->count())
                    @foreach ($myCourses as $course)                        
                        <div class="row p-2 bg-white border rounded shadow">
                            <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{ asset('storage/' . $course->cover_image) }}"></div>
                            <div class="col-md-6 my-auto">
                                <h5><a href="/courses/{{ $course->id }}">{{ $course->title }}</a></h5>
                                <div class="d-flex flex-row">
                                    <div>
                                        <span class="score">
                                            <div class="score-wrap">
                                                <span class="stars-active" style="width:{{ $course->rate()*20 }}%;">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </span>
                                                <span class="stars-inactive">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-1 mb-1"><span>{{ $course->Explainer != null ? $course->Explainer->name : '' }}</span></div>
                                <div class="mt-1 mb-1"><span>date of purchase : {{ $course->pivot->created_at->diffForHumans() }}<br></span></div>
                            </div>
                            <div class="align-items-center align-content-center col-md-3 border-left my-auto">
                                <div class="d-flex flex-row align-items-center">
                                    <h4 class="mr-1">{{ $course->pivot->price }} $</h4>
                                </div>
                                <h6 class="text-success">total summation : {{ $course->pivot->price }} $</h6>
                                <div class="d-flex flex-column mt-4"><a href="/courses/{{ $course->id }}/videos" class="btn btn-outline-primary btn-sm" type="button">videos course</a></div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-danger mx-auto" role="alert">
                        You haven't bought anything yet
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection