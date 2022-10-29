@extends('layouts.main')

@section('style')
    
@endsection
<br>
<br>
<br>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <video class="mb-4" autoplay controls>
                            {{-- {{ $video->video }} --}}
                            <source src="{{ asset('upload') }}/{{ $video->video }}">
                        </video>
                        <div class="row justify-content-center">
                            <div>
                                <h1 class="h4">{{ $video->title }}</h1>
                                <br>
                                <h5 class="h5">{{ $video->description}}</h5>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection