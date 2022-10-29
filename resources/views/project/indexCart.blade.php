@extends('layouts.main')

<br>
<br>
<br>
@section('content')
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div id="success" style="display:none;" class="col-md-8 text-center h3 p-4 bg-success text-light rounded">
                Purchase completed successfully
            </div>
            @if (session('message'))
                <div class="col-md-8 text-center h3 p-4 bg-success text-light rounded">
                    Purchase completed successfully
                </div>
            @endif
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        @if ($items->count())
                            <table class="table">
                                <thead class="thead-hight">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Options</th>
                                    </tr>
                                </thead>
                                @php($totalPrice = 0)
                                @foreach ($items as $item)
                                    @php($totalPrice += $item->price)
                                    <tbody>
                                        <tr>
                                            <td scope="row">{{ $item->title }}</td>
                                            <td>{{ $item->price }} $</td>
                                            <td>
                                                <form action="{{ Route('cart.remove' , $item->id) }}" method="post" style="float:left;margin:auto 5px;">
                                                @csrf
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>

                            <h4 class="mb-5">Total Price : {{ $totalPrice }} $</h4>
                            <!-- Set up a container element for the button -->
                            <div class="d-inline-block float-start" id="paypal-button-container"></div>
                            <a href="/checkout" class="d-inline-block float-start mb-4 ms-2 btn bg-cart" style="text-decoration:none;">
                                <span>credit cart</span>
                                <i class="fas fa-credit-card"></i>
                            </a>
                        @else
                            <div class="alert alert-info text-center">
                                There are no Courses in the cart
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
        <!-- Replace "test" with your own sandbox Business account app client ID -->
        <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
        <script>
            paypal.Buttons({
                // Sets up the transaction when a payment button is clicked
                createOrder: (data, actions) => {
                    return fetch('/api/paypal/create-payment',{
                        method : 'POST',
                        body: JSON.stringify({
                            'userId' : "{{ auth()->user()->id }}",
                        }),
                    }).then(function(res){
                        return res.json();
                    }).then(function(orderData){
                        return orderData.id;
                    });
                },
                // Finalize the transaction after payer approval
                onApprove: (data, actions) => {
                    return fetch('/api/paypal/execute-payment', {
                        method:'POST',
                        body: Json.stringify({
                            orderId : data.orderId,
                            userId : "{{ auth()->user()->id }}"
                        })
                    }).then(function(res){
                        return res.json();
                    }).then(function(orderData){
                        $('#success').slideDown(200);
                        $('.card-body').slideUp(0);
                    })
                }
            }).render('#paypal-button-container');
        </script>
@endsection