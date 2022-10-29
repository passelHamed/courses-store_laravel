@component('mail::message')
# {{ $user['name'] }}

We have successfully received your request.

@component('mail::table')
| Title Course       | Price         |
| :--------- | :------------- |
@foreach ($orders as $order)
| {{ $order->title }} | {{ $order->price }} |
@endforeach
@endcomponent

Thanks,

{{ config('app.name') }}
@endcomponent



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Hello,{{ $user->name }}</p>
    <p>We have successfully received your request</p>
    <br>

    <table style="width:600px;">
        <thead>
            <tr>
                <th>Title Course</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->title }}</td>
                    <td>{{ $order->price }} $</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> --}}