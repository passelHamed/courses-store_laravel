@extends('theme.default')

@section('heading')
admin panel
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <a class="stretched-link" href="/admin/courses" style="text-decoration:none;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    number of Courses</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $number_of_courses }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book-open fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <a class="stretched-link" href="/admin/explainers" style="text-decoration:none;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    number_of_Explainers </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $number_of_Explainers }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-folder fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <a class="stretched-link" href="/admin/users" style="text-decoration:none;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    number of users</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $number_of_users }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-table fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection