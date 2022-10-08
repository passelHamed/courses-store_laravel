@extends('layouts.main')

@section('style')
    
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('flash_warning'))
            <div class="col-md-8 text-center h4 p-2 bg-danger text-light rounded">
                This book has not been added, you have exceeded the number of books we have, the maximum number of books you can book from this book is {{ ($book->number_of_copies - auth()->user()->booksInCart()->where('book_id',$book->id)->first()->pivot->number_of_copies) }} book
            </div>
        @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Show Book Details
                </div>
                <div class="card-body">
                    <table class="table">
                        @auth
                            <div class="form text-right mb-3">
                                <input id="bookId" type="hidden" value="{{ $book->id }}">
                                <span class="text-muted mb-3"><input class="form-control d-inline mx-auto" id="quantity" name="quantity" type="number" value="1" min="1" max="{{ $book->number_of_copies }}" style="width:10%;" required></span>
                                <button type="submit" class="add-cart btn bg-cart me-2"><i class="fa fa-cart-plus"></i> add to cart</button>
                            </div>
                        @endauth
                        <tr>
                            <th>Title</th>
                            <td class="lead"><b>{{ $book->title }}</b></td>
                        </tr>
                        <tr>
                            <th>Users Ratings</th>
                            <td>
                                <span class="score">
                                    <div class="score-wrap">
                                        <span class="stars-active" style="width:{{ $book->rate()*20 }}%;">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </span>
                                        <span class="stars-inactive">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </span>
                                <span>Rating number {{ $book->ratings()->count() }} user</span>
                            </td>
                        </tr>
                        @if ($book->isbn)
                            <tr>
                                <th>Serial Number</th>
                                <td>{{ $book->isbn }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>Cover Photo</th>
                            <td><img class="img-fluid img-thumbnail" src="{{ asset('/storage/' . $book->cover_image) }}" width="400" height="150"></td>
                        </tr>
                        @if ($book->category)
                            <tr>
                                <th>Category</th>
                                <td>{{ $book->category->name }}</td>
                            </tr>
                        @endif
                        @if ($book->Authors()->count() > 0)
                            <tr>
                                <th>Authors</th>
                                <td>
                                    @foreach ($book->Authors as $author)
                                        {{ $loop->first ? '' : ',' }}
                                        {{ $author->name}}
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        @if ($book->publisher)
                            <tr>
                                <th>publisher</th>
                                <td>{{ $book->publisher->name }}</td>
                            </tr>
                        @endif
                        @if ($book->description)
                            <tr>
                                <th>description</th>
                                <td>{{ $book->description }}</td>
                            </tr>
                        @endif
                        @if ($book->publish_year)
                            <tr>
                                <th>publish year</th>
                                <td>{{ $book->publish_year }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>number of pages</th>
                            <td>{{ $book->number_of_pages }}</td>
                        </tr>
                        <tr>
                            <th>number of copies</th>
                            <td>{{ $book->number_of_copies }}</td>
                        </tr>
                        <tr>
                            <th>price</th>
                            <td>{{ $book->price }} $</td>
                        </tr>
                    </table>
                    @auth
                        <h4 class="mb-3">Rate this book</h4>
                            @if (auth()->user()->rated($book))
                                <div class="rating">
                                    <span class="rating-star {{ auth()->user()->bookRating($book)->value == 5 ? 'checked' : '' }}" data-value="5"></span>
                                    <span class="rating-star {{ auth()->user()->bookRating($book)->value == 4 ? 'checked' : '' }}" data-value="4"></span>
                                    <span class="rating-star {{ auth()->user()->bookRating($book)->value == 3 ? 'checked' : '' }}" data-value="3"></span>
                                    <span class="rating-star {{ auth()->user()->bookRating($book)->value == 2 ? 'checked' : '' }}" data-value="2"></span>
                                    <span class="rating-star {{ auth()->user()->bookRating($book)->value == 1 ? 'checked' : '' }}" data-value="1"></span>
                                </div>
                            @else
                                <div class="rating">
                                    <span class="rating-star " data-value="5"></span>
                                    <span class="rating-star " data-value="4"></span>
                                    <span class="rating-star " data-value="3"></span>
                                    <span class="rating-star " data-value="2"></span>
                                    <span class="rating-star " data-value="1"></span>
                                </div>
                            @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('.rating-star').click(function(){
            var submitStars = $(this).attr('data-value');
            $.ajax({
                type: 'post',
                url: {{ $book->id }} + '/rate',
                data: {
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    'value' : submitStars
                },
                success: function(){
                    location.reload();
                },
                error: function(){
                    toastr.error('Something wrong')
                }
            })
        })
    </script>

    <script>
        $('.add-cart').on('click',function(event){
            var token = '{{ Session::token() }}';
            var url = '{{ route('cart.add') }}';

            event.preventDefault();

            var bookId = $(this).parents(".form").find('#bookId').val()
            var quantity = $(this).parents(".form").find('#quantity').val()

            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    quantity : quantity,
                    id : bookId,
                    _token : token
                },
                success : function(data){
                    $('span.badge').text(data.num_of_product);
                    toastr.success('The book has been added successfully')
                },
                error : function(){
                    toastr.error('something wrong');
                },
            })
        })
    </script>
@endsection