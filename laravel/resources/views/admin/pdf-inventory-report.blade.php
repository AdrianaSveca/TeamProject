<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>WELLTH - Inventory Report</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px;  color: #333333; margin: 0; padding: 20px; }
        .header { width: 100%; font-weight: 50px; margin-bottom: 40px; border-bottom: 2px solid #7FA82E; padding-bottom: 20px; }
        .header-left { float: left; width: 50%; }
        .header-right { float: right; width: 50%; text-align: right; }
        .clear { clear: both; }
        
        .logo { font-size: 28px; font-weight: bold; color: #1a2920; letter-spacing: 2px; margin: 0; }
        .logo-accent { color: #7FA82E; }
        .report-title { font-size: 20px; font-weight: bold; color: #2B332A; margin: 0 0 5px 0; text-transform: uppercase; }
        .report-meta { font-size: 12px; color: #777777; margin: 0; }

        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background-color: #2B332A; color: #ffffff; text-align: left; padding: 12px 15px; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; }
        td { padding: 12px 15px; border-bottom: 1px solid #eeeeee; color: #444444; }
        tr:nth-child(even) td { background-color: #fafafa; }

        /* Stock Color Coding */
        .stock-badge { padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 11px; text-transform: uppercase; border-radius: 15px; display: inline-block; }
        .stock-good { background-color: #e6f4ea; color: #1e8e3e; }
        .stock-low { background-color: #fef7e0; color: #b06000; }
        .stock-out { background-color: #fce8e6; color: #d93025; }

        .price-text { font-weight: bold; color: #7FA82E; }
        
        .footer { margin-top: 50px; text-align: center; font-size: 10px; color: #999999; border-top: 1px solid #eeeeee; padding-top: 15px; }
    </style>
</head>
<body>

    <div class="header">
        <div class="header-left">
            <h1 class="logo">WELL<span class="logo-accent">TH</span></h1>
            <p style="margin: 5px 0 0 0; color: #777; font-size: 12px;">Premium Supplements & Fitness</p>
        </div>
        <div class="header-right">
            <h2 class="report-title">Inventory Report</h2>
            <p class="report-meta">Generated: {{ \Carbon\Carbon::now()->format('F j, Y - g:i A') }}</p>
            <p class="report-meta">Total Products: {{ $products->count() }}</p>
        </div>
        <div class="clear"></div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th style="text-align: center;">Stock Qty</th>
                <th style="text-align: right;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                @php
                    $stock = $product->product_stock_level ?? 0;
                @endphp
                <tr>
                    <td style="font-weight: bold;">{{ $product->product_name }}</td>
                    <td>{{ $product->category ? $product->category->category_name : 'No Category' }}</td>
                    <td class="price-text">£{{ number_format($product->product_price, 2) }}</td>
                    <td style="text-align: center; font-weight: bold;">{{ $stock }}</td>
                    <td style="text-align: right;">
                        @if($stock > 5)
                            <span class="stock-badge stock-good">In Stock</span>
                        @elseif($stock > 0)
                            <span class="stock-badge stock-low">Low Stock</span>
                        @else
                            <span class="stock-badge stock-out">Out of Stock</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        This is an automatically generated inventory report from the WELLTH Admin Dashboard. <br>
        &copy; {{ date('Y') }} WELLTH. All rights reserved.
    </div>

</body>
</html>