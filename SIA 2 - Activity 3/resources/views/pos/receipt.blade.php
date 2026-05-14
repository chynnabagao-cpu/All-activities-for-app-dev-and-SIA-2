<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>

    <style>
        body {
            font-family: 'Courier New', monospace;
            width: 300px;
            margin: auto;
            font-size: 13px;
            line-height: 1.5;
        }

        .center { text-align: center; }
        .right { text-align: right; }
        .bold { font-weight: bold; }

        hr {
            border-top: 1px dashed #000;
            margin: 6px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            font-size: 13px;
            padding: 2px 0;
        }

        .footer {
            margin-top: 10px;
        }

        .small {
            font-size: 11px;
        }
    </style>

</head>

<body onload="window.print()">

    <!-- HEADER -->
    <div class="center">
        <h3 style="margin:0;">🛒 Grocery POS</h3>
        <div class="small">Cebu City</div>
        <div class="small">Tel: 0912-345-6789</div>
    </div>

    <hr>

    <!-- ORDER INFO -->
    <div class="small">
        Date: {{ $order->created_at->format('M d, Y h:i A') }}<br>
        Order #: {{ $order->id }}
    </div>

    <hr>

    <!-- ITEMS -->
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th class="center">Qty</th>
                <th class="right">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td class="center">{{ $item->quantity }}</td>
                <td class="right">
                    ₱{{ number_format($item->price * $item->quantity,2) }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <!-- TOTALS -->
    <table>
        <tr>
            <td class="bold">TOTAL</td>
            <td class="right bold">₱{{ number_format($order->total,2) }}</td>
        </tr>
        <tr>
            <td>Cash</td>
            <td class="right">₱{{ number_format($order->cash,2) }}</td>
        </tr>
        <tr>
            <td>Change</td>
            <td class="right">₱{{ number_format($order->change,2) }}</td>
        </tr>
    </table>

    <hr>

    <!-- FOOTER -->
    <div class="center footer">
        <p style="margin:5px 0;">Thank you for your purchase!</p>
        <p class="small">Please come again 😊</p>
    </div>

</body>
</html>
