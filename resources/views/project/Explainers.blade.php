@extends('layouts.main')
@section('style')
    
@endsection

<br>
<br>
<br>
@section('content')
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <form action="/explainers/search" method="get">
                                @csrf
                                    <div class="row d-flex justify-content-center">
                                        <input type="text" name="search" id="search" class="col-3 mx-sm-3 mb-2 me-2" placeholder="search for Explainers . . .">
                                        <button type="submit" class="col-2 btn btn-secondary bg-success mb-2">Search</button>
                                    </div>
                            </form>
                        </div>
                        <br>
                        <h3 class="mb-4 h4">{{ $title }}</h3>

                        @if ($Explainers->count())
                            <ul class="list-group">
                                @foreach ($Explainers as $Explainer)
                                    <a href="/explainers/{{ $Explainer->id }}/#popular-courses">
                                        <li class="list-group-item">
                                            {{ $Explainer->name  }} ({{ $Explainer->courses->count() }}) 
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
</section>
@endsection