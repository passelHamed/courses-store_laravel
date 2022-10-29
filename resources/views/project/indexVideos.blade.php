@extends('layouts.main')

@section('style')
    
@endsection
<br>
<br>
<br>
<br>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="mb-4 h4">{{ $title }} ({{ $courses->videos->count() }})</h3>
                        @if ($courses->videos->count())
                            <ul class="list-group">
                                @foreach ($courses->videos as $video)
                                    <a href="/courses/videos/{{ $video->id }}">
                                        <li class="list-group-item">
                                            {{ $video->title  }}
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