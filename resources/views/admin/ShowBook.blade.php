@extends('theme.default')

@section('headding')
Show Details Book
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
    Show Details Book ({{ $book->title }})
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Show Book Details
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Title</th>
                            <td class="lead"><b>{{ $book->title }}</b></td>
                        </tr>
                        <tr>
                            <th>Users Ratings</th>
                            <td>
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
                                <span>Rating number {{ $book->ratings()->count() }} user</span>
                            </td>
                        </tr>
                        @if ($book->isbn)
                            <tr>
                                <th>Serial Number</th>
                                <td>{{ $book->isbn }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>Cover Photo</th>
                            <td><img class="img-fluid img-thumbnail" src="{{ asset('/storage/' . $book->cover_image) }}" width="400" height="150"></td>
                        </tr>
                        @if ($book->category)
                            <tr>
                                <th>Category</th>
                                <td>{{ $book->category->name }}</td>
                            </tr>
                        @endif
                        @if ($book->Authors()->count() > 0)
                            <tr>
                                <th>Authors</th>
                                <td>
                                    @foreach ($book->Authors as $author)
                                        {{ $loop->first ? '' : ',' }}
                                        {{ $author->name}}
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        @if ($book->publisher)
                            <tr>
                                <th>publisher</th>
                                <td>{{ $book->publisher->name }}</td>
                            </tr>
                        @endif
                        @if ($book->description)
                            <tr>
                                <th>description</th>
                                <td>{{ $book->description }}</td>
                            </tr>
                        @endif
                        @if ($book->publish_year)
                            <tr>
                                <th>publish year</th>
                                <td>{{ $book->publish_year }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>number of pages</th>
                            <td>{{ $book->number_of_pages }}</td>
                        </tr>
                        <tr>
                            <th>number of copies</th>
                            <td>{{ $book->number_of_copies }}</td>
                        </tr>
                        <tr>
                            <th>price</th>
                            <td>{{ $book->price }} $</td>
                        </tr>
                    </table>
                    <a class="btn btn-info btn-sm" href="/admin/books/{{ $book->id }}/edit"><i class="fa fa-edit"></i>Edit</a>
                    <form action="/admin/books/{{ $book->id }}" method="post" class="d-inline-block">
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