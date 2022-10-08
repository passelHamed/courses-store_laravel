@extends('theme.default')

@section('style')
    <!-- Custom styles for this page -->
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
Show Publishers
@endsection

@section('title')
<a class="btn btn-primary" href="/admin/publishers/create"><i class="fas fa-plus"></i> Create New Publishers</a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Publishers</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="books-table" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>address</th>
                                <th>books</th>
                                <th>options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publishers as $publisher)
                                <tr>
                                    <td>{{ $publisher->name }}</td>
                                    <td>
                                        @if ($publisher->address)
                                            {{ $publisher->address }}
                                        @endif
                                    </td>
                                    <td>
                                        @foreach ($publisher->books as $book)
                                            {{ $loop->first ? '' : ',' }}
                                            {{ $book->title}}
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="/admin/publishers/{{ $publisher->id }}/edit"><i class="fa fa-edit"></i>Edit</a>
                                        <form action="/admin/publishers/{{ $publisher->id }}" method="post" class="d-inline-block">
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