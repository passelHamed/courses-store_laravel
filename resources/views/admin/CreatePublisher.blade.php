@extends('theme.default')

@section('heading')
Create New Publisher
@endsection

@section('content')
<div class=" row justify-content-center">
    <div class="shadow card mb-4 col-md-8">
        <div class="card-header">
            Add New Publisher
        </div>
        <div class="card-body">
            <form action="/admin/publishers" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-left">name Publisher</label>
                    <div class="col-md-6">
                        <input name="name" type="text" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-left">address</label>
                    <div class="col-md-6">
                        <textarea name="address" type="text" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" autocomplete="address">{{ old('address') }}</textarea>
                        @error('address')
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