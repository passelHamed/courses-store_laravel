@extends('theme.default')

@section('heading')
    Edit Course
@endsection

@section('style')
    
@endsection

@section('content')
<div class="shadow row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            Edit Course
        </div>
        <div class="card-body">
            <form action="/admin/courses/{{ $Course->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-left">Title Course</label>
                    <div class="col-md-6">
                        <input name="title" type="text" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $Course->title }}" autocomplete="title">
                        @error('title')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cover_image" class="col-md-4 col-form-label text-md-left">image for Course</label>
                    <div class="col-md-6">
                        <input name="cover_image" accept="image/*" type="file" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror" value="{{ $Course->cover_image }}" autocomplete="cover_image">
                        @error('cover_image')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="explainer" class="col-md-4 col-form-label text-md-left">Explainer for Course</label>
                    <div class="col-md-6">
                        <select class="form-control" id="explainer" name="explainer">
                            <option disabled {{ $Course->Explainer == null ? "selected" : ""  }}>choose Explainer</option>
                            @foreach ($Explainers as $Explainer)
                                <option value="{{ $Explainer->id }}" {{ $Course->Explainer == $Explainer ? "selected" : "" }}>{{ $Explainer->name }}</option>
                            @endforeach
                        </select>
                        @error('Explainer')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-left">description</label>
                    <div class="col-md-6">
                        <textarea name="description" type="text" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" autocomplete="description">{{ $Course->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="publish_year" class="col-md-4 col-form-label text-md-left">publish year</label>
                    <div class="col-md-6">
                        <input name="publish_year" type="number" id="publish_year" class="form-control @error('publish_year') is-invalid @enderror" value="{{ $Course->publish_year }}" autocomplete="publish_year">
                        @error('publish_year')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="number_of_videos" class="col-md-4 col-form-label text-md-left">number of videos</label>
                    <div class="col-md-6">
                        <input name="number_of_videos" type="number" id="number_of_videos" class="form-control @error('number_of_videos') is-invalid @enderror" value="{{ $Course->number_of_videos }}" autocomplete="number_of_videos">
                        @error('number_of_videos')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="number_of_hours" class="col-md-4 col-form-label text-md-left">number of hours</label>
                    <div class="col-md-6">
                        <input name="number_of_hours" type="number" id="number_of_hours" class="form-control @error('number_of_hours') is-invalid @enderror" value="{{ $Course->number_of_hours }}" autocomplete="number_of_hours">
                        @error('number_of_hours')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-left">price for Course</label>
                    <div class="col-md-6">
                        <input name="price" type="number" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ $Course->price }}" autocomplete="price">
                        @error('price')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-2 mt-3">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Edit Course</button>
                    </div>
                </div>  
            </form>
        </div>
    </div>
</div>
@endsection