@extends('theme.default')

@section('headding')
Show Details Course
@endsection

@section('style')
    <style>
        table{
            table-layout:fixed;
        }
        table tr th{
            width:30%;
        }
        .score{
            display: block;
            font-size: 16px;
            position:relative;
            overflow: hidden;
        }
        .score-wrap{
            display: inline-block;
            position: relative;
            height: 19px
        }
        .score .stars-active{
            color: #FFCA00;
            position: relative;
            z-index: 10;
            display: block;
            overflow: hidden;
            white-space: nowrap;
        }
        .score .stars-inactive{
            color: lightgray;
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
@endsection

@section('heading')
    Show Details Course ({{ $Course->title }})
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Show Course Details
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Title</th>
                            <td class="lead"><b>{{ $Course->title }}</b></td>
                        </tr>
                        <tr>
                            <th>Users Ratings</th>
                            <td>
                                <span class="score">
                                    <div class="score-wrap">
                                        <span class="stars-active" style="width:{{ $Course->rate()*20 }}%;">
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
                                <span>Rating number {{ $Course->ratings()->count() }} user</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Cover Photo</th>
                            <td><img class="img-fluid img-thumbnail" src="{{ asset('/storage/' . $Course->cover_image) }}" width="400" height="150"></td>
                        </tr>
                        @if ($Course->description)
                            <tr>
                                <th>description</th>
                                <td>{{ $Course->description }}</td>
                            </tr>
                        @endif
                        {{-- <tr>
                            <th>Explainer</th>
                            <td>{{ $Course->Explainer->name }}</td>
                        </tr> --}}
                        @if ($Course->publish_year)
                            <tr>
                                <th>publish year</th>
                                <td>{{ $Course->publish_year }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>number of videos</th>
                            <td>{{ $Course->number_of_videos }}</td>
                        </tr>
                        <tr>
                            <th>number of hours</th>
                            <td>{{ $Course->number_of_hours }}</td>
                        </tr>
                        <tr>
                            <th>price</th>
                            <td>{{ $Course->price }} $</td>
                        </tr>
                    </table>
                    <a class="btn btn-info btn-sm" href="/admin/courses/{{ $Course->id }}/edit"><i class="fa fa-edit"></i>Edit</a>
                    <form action="/admin/Courses/{{ $Course->id }}" method="post" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i>Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection