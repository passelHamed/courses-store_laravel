@extends('theme.default')

@section('heading')
    Edit Book
@endsection

@section('style')
    
@endsection

@section('content')
<div class="shadow row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            Edit Book
        </div>
        <div class="card-body">
            <form action="/admin/books/{{ $book->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-left">Title Book</label>
                    <div class="col-md-6">
                        <input name="title" type="text" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $book->title }}" autocomplete="title">
                        @error('title')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="isbn" class="col-md-4 col-form-label text-md-left">ISBN Book</label>
                    <div class="col-md-6">
                        <input name="isbn" type="number" id="isbn" class="form-control @error('isbn') is-invalid @enderror" value="{{ $book->isbn }}" autocomplete="isbn">
                        @error('isbn')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cover_image" class="col-md-4 col-form-label text-md-left">image for Book</label>
                    <div class="col-md-6">
                        <input name="cover_image" accept="image/*" type="file" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror" value="{{ $book->cover_image }}" autocomplete="cover_image">
                        @error('cover_image')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category" class="col-md-4 col-form-label text-md-left">category for book</label>
                    <div class="col-md-6">
                        <select class="form-control" id="category" name="category">
                            <option disabled {{ $book->category == null ? "selected" : ""  }}>choose category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $book->category == $category ? "selected" : "" }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="author" class="col-md-4 col-form-label text-md-left">the author</label>
                    <div class="col-md-6">
                        <select class="form-control" id="author" name="author">
                            <option disabled {{ $book->Authors()->count() == 0 ? "selected" : '' }}>choose author</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}" {{ $book->authors->contains($author) ? "selected" : "" }}>{{ $author->name }}</option>
                            @endforeach
                        </select>                        
                        @error('author')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publisher" class="col-md-4 col-form-label text-md-left">the publisher</label>
                    <div class="col-md-6">
                        <select class="form-control" id="publisher" name="publisher">
                            <option disabled {{ $book->publisher = null ? "selected" : "" }}>choose publisher</option>
                            @foreach ($publishers as $publisher)
                                <option value="{{ $publisher->id }}" {{ $book->publisher == $publisher ? "selected" : "" }}>{{ $publisher->name }}</option>
                            @endforeach
                        </select> 
                        @error('publisher')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-left">description</label>
                    <div class="col-md-6">
                        <textarea name="description" type="text" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" autocomplete="description">{{ $book->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="publish_year" class="col-md-4 col-form-label text-md-left">publish year</label>
                    <div class="col-md-6">
                        <input name="publish_year" type="number" id="publish_year" class="form-control @error('publish_year') is-invalid @enderror" value="{{ $book->publish_year }}" autocomplete="publish_year">
                        @error('publish_year')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="number_of_pages" class="col-md-4 col-form-label text-md-left">number of pages</label>
                    <div class="col-md-6">
                        <input name="number_of_pages" type="number" id="number_of_pages" class="form-control @error('number_of_pages') is-invalid @enderror" value="{{ $book->number_of_pages }}" autocomplete="number_of_pages">
                        @error('number_of_pages')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="number_of_copies" class="col-md-4 col-form-label text-md-left">number_of_copies</label>
                    <div class="col-md-6">
                        <input name="number_of_copies" type="number" id="number_of_copies" class="form-control @error('number_of_copies') is-invalid @enderror" value="{{ $book->number_of_copies }}" autocomplete="number_of_copies">
                        @error('number_of_copies')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-left">price for Book</label>
                    <div class="col-md-6">
                        <input name="price" type="number" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ $book->price }}" autocomplete="price">
                        @error('price')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-2 mt-3">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Edit Book</button>
                    </div>
                </div>  
            </form>
        </div>
    </div>
</div>
@endsection