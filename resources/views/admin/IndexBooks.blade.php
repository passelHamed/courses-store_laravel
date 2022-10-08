@extends('theme.default')

@section('style')
    <!-- Custom styles for this page -->
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
Show Books
@endsection

@section('title')
<a class="btn btn-primary" href="/admin/books/create"><i class="fas fa-plus"></i> Create New Book</a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Website</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="books-table" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>ISBN</th>
                                <th>Categories</th>
                                <th>Authors</th>
                                <th>Publishers</th>
                                <th>Price</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td><a href="/admin/books/{{ $book->id }}">{{ $book->title }}</a></td>
                                    <td>{{ $book->isbn }}</td>
                                    <td>{{ $book->category != NULL ? $book->category->name : '' }}</td>
                                    <td>
                                        @if ($book->Authors->count() > 0)
                                            @foreach ($book->Authors as $author)
                                            {{ $loop->first ? '' : ',' }}
                                            {{ $author->name}}
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if ($book->publisher)
                                            {{ $book->publisher->name }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $book->price }} $
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="/admin/books/{{ $book->id }}/edit"><i class="fa fa-edit"></i>Edit</a>
                                        <form action="/admin/books/{{ $book->id }}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#books-table').DataTable();
        } );
    </script>
@endsection