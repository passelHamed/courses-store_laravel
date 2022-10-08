@extends('theme.default')

@section('style')
    <!-- Custom styles for this page -->
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
All purchases
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
                                <th>Buyer</th>
                                <th>book</th>
                                <th>price</th>
                                <th>number of copies</th>
                                <th>total price</th>
                                <th>date of purchase</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allBooks as $product)
                                <tr>
                                    <td>{{ $product->user::find($product->user_id)->name }}</td>
                                    <td><a href="/admin/book/{{ $product->book_id }}">{{ $product->book::find($product->book_id)->title }}</a></td>
                                    <td>{{ $product->price }} $</td>
                                    <td>{{ $product->number_of_copies }}</td>
                                    <td>{{ $product->number_of_copies * $product->price }} $</td>
                                    <td>{{ $product->created_at->diffForHumans() }}</td>
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