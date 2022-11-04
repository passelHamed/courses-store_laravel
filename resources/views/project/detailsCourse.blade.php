@extends('layouts.main')
<br>
<br>
@section('content')
<section>
<div class="container">
    <div class="row justify-content-center">
        @if (session('flash_warning'))
            <div class="col-md-8 text-center h4 p-2 bg-danger text-light rounded">
                This Course Add Already
            </div>
        @endif
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table">
                        {{-- @auth --}}
                            @if ($CourseFind)
                                <div class="text-right mt-3">
                                    <a href="/courses/{{ $Course->id }}/videos" type="submit" class="add-cart btn bg-view mb-4">view videos</a>
                                </div>
                            @else
                                <div class="form text-right mb-3">
                                    <form action="/cart" method="post">
                                    @csrf
                                        <input name="idCourse" type="hidden" value="{{ $Course->id }}">
                                        <button type="submit" class="add-cart btn bg-cart me-2"><i class="fa fa-cart-plus"></i> buy Course</button>
                                    </form>
                                </div>
                            @endif
                        {{-- @endauth --}}
                        <tr>
                            <th>Title</th>
                            <td class="lead"><b>{{ $Course->title }}</b></td>
                        </tr>
                        <tr>
                            <th>Users Ratings</th>
                            <td>
                                <span class="score">
                                    <div class="score-wrap">
                                        <span class="stars-active" style="width:{{ $Course->rate()*20 }}%;">
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
                                <span>Rating number {{ $Course->ratings()->count() }} user</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Cover Photo</th>
                            <td><img class="img-fluid img-thumbnail" src="{{ asset('/storage/' . $Course->cover_image) }}" width="400" height="150"></td>
                        </tr>
                        @if ($Course->description)
                            <tr>
                                <th>description</th>
                                <td>{{ $Course->description }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>Explainer</th>
                            <td>{{ $Course->Explainer->name }}</td>
                        </tr>
                        @if ($Course->publish_year)
                            <tr>
                                <th>publish year</th>
                                <td>{{ $Course->publish_year }}</td>
                            </tr>
                        @endif
                        <tr>
                            @if ($Course->video)
                                <th>number of videos</th>
                                <td>{{ $Course->number_of_videos }}</td>
                            @endif
                        </tr>
                        <tr>
                            <th>number of hours</th>
                            <td>{{ $Course->number_of_hours }}</td>
                        </tr>
                        <tr>
                            <th>price</th>
                            <td>{{ $Course->price }} $</td>
                        </tr>
                    </table>
                    @auth
                        <h4 class="mb-3">Rate this Course</h4>
                            @if ($CourseFind)                                
                                @if (auth()->user()->rated($Course))
                                    <div class="rating">
                                        <span class="rating-star {{ auth()->user()->courseRating($Course)->value == 5 ? 'checked' : '' }}" data-value="5"></span>
                                        <span class="rating-star {{ auth()->user()->courseRating($Course)->value == 4 ? 'checked' : '' }}" data-value="4"></span>
                                        <span class="rating-star {{ auth()->user()->courseRating($Course)->value == 3 ? 'checked' : '' }}" data-value="3"></span>
                                        <span class="rating-star {{ auth()->user()->courseRating($Course)->value == 2 ? 'checked' : '' }}" data-value="2"></span>
                                        <span class="rating-star {{ auth()->user()->courseRating($Course)->value == 1 ? 'checked' : '' }}" data-value="1"></span>
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
                            @else
                                <div class="alert alert-danger mt-4" role="alert">
                                    You must purchase the course to be able to rate it
                                </div>
                            @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection


@section('script')
    <script>
        $('.rating-star').click(function(){
            var submitStars = $(this).attr('data-value');
            $.ajax({
                type: 'post',
                url: {{ $Course->id }} + '/rate',
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
        // $('.add-cart').on('click',function(event){
        //     var token = '{{ Session::token() }}';
        //     var url = '{{ route('cart.add') }}';

        //     event.preventDefault();

        //     var courseId = $(this).parents(".form").find('#courseId').val()

        //     $.ajax({
        //         method: 'POST',
        //         url: url,
        //         data: {
        //             id : courseId,
        //             _token : token
        //         },
        //         success : function(data){
        //             $('span.badge').text(data.num_of_product);
        //             toastr.success('The course has been added successfully')
        //         },
        //         error : function(){
        //             toastr.error('something wrong');
        //         },
        //     })
        // })
    </script>
@endsection