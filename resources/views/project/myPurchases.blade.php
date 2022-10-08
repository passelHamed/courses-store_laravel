@extends('layouts.main')

@section('style')
    <style>
        body{
            background:#eee
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


@section('content')
    <div class="container">
        <a href="/" class="btn btn-primary mb-5">
            <i class="fas fa-plus"></i>
            Buy New Book
        </a>
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                @if ($myBooks->count())
                    @foreach ($myBooks as $book)                        
                        <div class="row p-2 bg-white border rounded">
                            <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{ asset('storage/' . $book->cover_image) }}"></div>
                            <div class="col-md-6 my-auto">
                                <h5><a href="/book/{{ $book->id }}">{{ $book->title }}</a></h5>
                                <div class="d-flex flex-row">
                                    <div>
                                        <span class="score">
                                            <div class="score-wrap">
                                                <span class="stars-active" style="width:{{ $book->rate()*20 }}%;">
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
                                <div class="mt-1 mb-1"><span>{{ $book->category != null ? $book->category->name : '' }}</span></div>
                                <div class="mt-1 mb-1"><span>date of purchase : {{ $book->pivot->created_at->diffForHumans() }}<br></span></div>
                                <p class="text-justify text-truncate para mb-0">Number of copies : {{ $book->pivot->number_of_copies }}<br><br></p>
                            </div>
                            <div class="align-items-center align-content-center col-md-3 border-left my-auto">
                                <div class="d-flex flex-row align-items-center">
                                    <h4 class="mr-1">{{ $book->pivot->price }} $</h4>
                                </div>
                                <h6 class="text-success">total summation : {{ $book->pivot->number_of_copies * $book->pivot->price }} $</h6>
                                <div class="d-flex flex-column mt-4"><a href="/book/{{ $book->id }}" class="btn btn-outline-primary btn-sm" type="button">details book</a></div>
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