@extends('theme.default')

@section('heading')
    Edit publisher
@endsection

@section('style')
    
@endsection

@section('content')
<div class="shadow row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            Edit publisher
        </div>
        <div class="card-body">
            <form action="/admin/publishers/{{ $publisher->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-left">name Publisher</label>
                    <div class="col-md-6">
                        <input name="name" type="text" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $publisher->name }}" autocomplete="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-left">publisher</label>
                    <div class="col-md-6">
                        <textarea name="address" type="text" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" autocomplete="address">{{ $publisher->address }}</textarea>
                        @error('address')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-2 mt-3">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>  
            </form>
        </div>
    </div>
</div>
@endsection