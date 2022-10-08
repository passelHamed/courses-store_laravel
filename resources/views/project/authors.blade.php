@extends('layouts.main')
@section('style')
    
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Authors books</div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <form action="/authors/search" method="get">
                                @csrf
                                    <div class="row d-flex justify-content-center">
                                        <input type="text" name="search" id="search" class="col-3 mx-sm-3 mb-2 me-2" placeholder="search for Author . . .">
                                        <button type="submit" class="col-2 btn btn-secondary bg-secondary mb-2">Search</button>
                                    </div>
                                </form>
                        </div>
                        <hr>
                        <br>
                        <h3 class="mb-4 h4">{{ $title }}</h3>

                        @if ($authors->count())
                            <ul class="list-group">
                                @foreach ($authors as $author)
                                    <a href="/authors/{{ $author->id }}">
                                        <li class="list-group-item">
                                            {{ $author->name  }} ({{ $author->books->count() }})
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