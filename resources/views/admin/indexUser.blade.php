@extends('theme.default')

@section('style')
    <!-- Custom styles for this page -->
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
Show Users
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="books-table" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>email</th>
                                <th>type user</th>
                                <th>options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        {{ $user->isSuperAdmin() ? 'Admin Public' : ($user->isAdmin() ? 'Admin' : 'User') }}
                                    </td>
                                    <td>
                                        <form class="mr-4 form-inline" action="/admin/users/{{ $user->id }}" method="post" style="display: inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <select class="form-control form-control-sm" name="administration_level">
                                                <option selected disabled>chosse type</option>
                                                <option value="0">User</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Admin Public</option>
                                            </select>
                                            <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</button>
                                        </form>
                                        <form action="/admin/users/{{ $user->id }}" method="post" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            @if (auth()->user() != $user)
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i>Delete</button>
                                                @else
                                                    <button class="disabled btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</button>
                                            @endif
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