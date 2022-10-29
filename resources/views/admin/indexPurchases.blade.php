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
            <div class="card-body">
                <div class="table-responsive">
                    <table id="books-table" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Buyer</th>
                                <th>course</th>
                                <th>price</th>
                                <th>date of purchase</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allCourses as $product)
                                <tr>
                                    <td>{{ $product->user::find($product->user_id)->name }}</td>
                                    <td><a href="/admin/courses/{{ $product->course_id }}">{{ $product->course::find($product->course_id)->title }}</a></td>
                                    <td>{{ $product->price }} $</td>
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