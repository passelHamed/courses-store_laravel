@extends('theme.default')

@section('heading')
Create New Category
@endsection

@section('content')
<div class=" row justify-content-center">
    <div class="shadow card mb-4 col-md-8">
        <div class="card-header">
            Add New Category
        </div>
        <div class="card-body">
            <form action="/admin/categories" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-left">name category</label>
                    <div class="col-md-6">
                        <input name="name" type="text" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-left">description</label>
                    <div class="col-md-6">
                        <textarea name="description" type="text" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" autocomplete="description">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-2 mt-3">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>  
            </form>
        </div>
    </div>
</div>
@endsection