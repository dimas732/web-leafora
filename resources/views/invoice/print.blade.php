<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Invoice {{ $order->invoice }}</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .container {
            width: 100%;
        }

        .header {
            width: 100%;
            margin-bottom: 25px;
        }

        .logo {
            width: 40%;
            float: left;
        }

        .invoice-info {
            width: 60%;
            float: right;
            text-align: right;
        }

        .clear {
            clear: both;
        }

        h2 {
            margin: 0;
        }

        .info {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .text-right {
            text-align: right;
        }

        .summary {
            margin-top: 15px;
            float: right;
            width: 40%;
        }

        .summary table td {
            border: none;
            padding: 5px;
        }

        .total {
            font-size: 14px;
            font-weight: bold;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 11px;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="container">

        {{-- HEADER --}}
        <div class="header">
            <div class="logo">
                <img src="./templates/ogani-master/img/leafora.png" alt="" width="150">
            </div>

            <div class="invoice-info">
                <h2>INVOICE</h2>
                <p><strong>No:</strong> {{ $order->invoice }}</p>
                <p><strong>Tanggal:</strong> {{ $order->created_at->format('d M Y') }}</p>
                <p><strong>Status:</strong> {{ $order->status ?? 'Menunggu Pembayaran' }}</p>
            </div>
        </div>

        <div class="clear"></div>

        {{-- CUSTOMER --}}
        <div class="info">
            <p><strong>Ditagihkan Kepada:</strong></p>
            <p class="text-capitalized">{{ $order->cust_name }}</p>
            <p>{{ $order->cust_phone }}</p>
        </div>

        {{-- TABLE PRODUK --}}
        <table>
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Produk</th>
                    <th width="15%">Harga</th>
                    <th width="10%">Qty</th>
                    <th width="20%">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->details as $i => $item)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td class="text-capitalized">{{ $item->product->name ?? '-' }}</td>
                        <td>Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>Rp{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- SUMMARY --}}
        <div class="summary">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td class="text-right">
                        Rp{{ number_format($order->total_price, 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <td>Diskon</td>
                    <td class="text-right">Rp0</td>
                </tr>
                <tr class="total">
                    <td>Total</td>
                    <td class="text-right">
                        Rp{{ number_format($order->total_price, 0, ',', '.') }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="clear"></div>

        {{-- FOOTER --}}
        <div class="footer">
            <p>Terima kasih telah berbelanja di <strong>Leafora</strong></p>
            <p>Invoice ini dihasilkan secara otomatis</p>
        </div>

    </div>

</body>

</html>
