@extends('theme.default')

@section('style')
    
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div>
                                <h1 class="h4">{{ $video->title }}</h1>
                                <br>
                                <h5 class="h5">{{ $video->description}}</h5>
                            </div>
                        </div>
                        <br>
                        <video class="mb-4"  muted>
                            <source src="{{ asset('upload') }}/{{ $video->video }}">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection