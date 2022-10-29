@extends('theme.default')

@section('headding')
Show Videos Course
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
    {{-- Show Videos {{ $courses->title }} --}}
@endsection

@section('title')
<a class="btn btn-primary" href="/admin/courses/{{ $courses->id }}/videos/create"><i class="fas fa-plus"></i> Create New Video</a>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div>
                            {{-- videos for {{ $courses->videos->title }} Course --}}
                        </div>
                    </div>
                    <br>
                    <h3 class="mb-4 h4">{{ $title }} ({{ $courses->videos->count() }})</h3>
                    @if ($courses->videos->count())
                        <ul class="list-group">
                            @foreach ($courses->videos as $video)
                            <a href="/admin/courses/videos/{{ $video->id }}">
                                <li class="list-group-item">
                                        {{ $video->title  }}
                                        {{-- <form action="/courses/videos/{{ $video->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i>Delete</button>
                                        </form> --}}
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    @else
                        <div class="col-12 alert alert-info mt-4 mx-auto text-center">
                            not result
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection