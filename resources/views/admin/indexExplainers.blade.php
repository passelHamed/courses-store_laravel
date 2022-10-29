@extends('theme.default')

@section('style')
    <!-- Custom styles for this page -->
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
Show Explainer
@endsection

@section('title')
<a class="btn btn-primary" href="/admin/explainers/create"><i class="fas fa-plus"></i> Create New Explainer</a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Explainer</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="books-table" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>description</th>
                                <th>Courses</th>
                                <th>options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Explainers as $Explainer)
                                <tr>
                                    <td>{{ $Explainer->name }}</td>
                                    <td>
                                        @if ($Explainer->description)
                                            {{ $Explainer->description }}
                                        @endif
                                    </td>
                                    <td>
                                        @foreach ($Explainer->courses as $course)
                                            {{ $loop->first ? '' : ',' }}
                                            {{ $course->title}}
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="/admin/explainers/{{ $Explainer->id }}/edit"><i class="fa fa-edit"></i>Edit</a>
                                        <form action="/admin/explainers/{{ $Explainer->id }}" method="post" class="d-inline-block">
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