@extends('theme.default')

@section('heading')
Create New Video
@endsection

@section('content')
<div class=" row justify-content-center">
    <div class="shadow card mb-4 col-md-8">
        <div class="card-header">
            Add New Video
        </div>
        <div class="card-body">
            <form action="/admin/courses/{{ $courses->id }}/videos" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-left">Title Video</label>
                    <div class="col-md-6">
                        <input name="title" type="text" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" autocomplete="title">
                        @error('title')
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

                <div class="form-group row">
                    <label for="video" class="col-md-4 col-form-label text-md-left">Video for Course</label>
                    <div class="col-md-6">
                        <input name="video" type="file" id="video" class="form-control @error('video') is-invalid @enderror" value="{{ old('video') }}" autocomplete="video">
                        @error('video')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <input type="hidden" name="course_id" value="{{ $courses->id }}">

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