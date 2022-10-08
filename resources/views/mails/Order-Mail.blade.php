<!DOCTYPE html>
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
                <th>Title Book</th>
                <th>Price</th>
                <th>Number of copies</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @php
                $subTotal = 0
            @endphp
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->title }}</td>
                    <td>{{ $order->price }} $</td>
                    <td>{{ $order->pivot->number_of_copies }}</td>
                    <td>{{ $order->pivot->number_of_copies * $order->price }} $</td>

                    @php
                        $subTotal += $order->pivot->number_of_copies * $order->price
                    @endphp
                </tr>
            @endforeach
            <hr>
            <tr>
                <td colspan="3" style="border-top:1px solid #ccc;"></td>
                <td style="font-size:15px;font-weight:bold;border-top:1px solid #ccc;">Total Price : {{ $subTotal }} $</td>
            </tr>
        </tbody>
    </table>
</body>
</html>