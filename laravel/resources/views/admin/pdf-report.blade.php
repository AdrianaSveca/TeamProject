<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>WELLTH - Orders Report</title>
    <style>
        /* Base Styles */
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 13px;
            color: #333333;
            margin: 0;
            padding: 20px;
        }

        /* Header Layout (Using floats for DomPDF compatibility) */
        .header {
            width: 100%;
            margin-bottom: 40px;
            border-bottom: 2px solid #7FA82E;
            padding-bottom: 20px;
        }
        .header-left {
            float: left;
            width: 50%;
        }
        .header-right {
            float: right;
            width: 50%;
            text-align: right;
        }
        .clear {
            clear: both;
        }

        /* Branding */
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #1a2920;
            letter-spacing: 2px;
            margin: 0;
        }
        .logo-accent {
            color: #7FA82E;
        }
        .report-title {
            font-size: 20px;
            font-weight: bold;
            color: #2B332A;
            margin: 0 0 5px 0;
            text-transform: uppercase;
        }
        .report-meta {
            font-size: 12px;
            color: #777777;
            margin: 0;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #2B332A;
            color: #ffffff;
            text-align: left;
            padding: 12px 15px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #eeeeee;
            color: #444444;
        }
        
        /* Zebra Striping */
        tr:nth-child(even) td {
            background-color: #fafafa;
        }

        /* Status Badges */
        .status-badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 11px;
            text-transform: uppercase;
            display: inline-block;
        }
        .status-delivered { background-color: #e6f4ea; color: #1e8e3e; }
        .status-shipped { background-color: #e8f0fe; color: #1a73e8; }
        .status-pending { background-color: #fef7e0; color: #b06000; }

        .total-amount {
            font-weight: bold;
            color: #7FA82E;
        }

        /* Footer */
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 10px;
            color: #999999;
            border-top: 1px solid #eeeeee;
            padding-top: 15px;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="header-left">
            <h1 class="logo">WELL<span class="logo-accent">TH</span></h1>
            <p style="margin: 5px 0 0 0; color: #777; font-size: 12px;">Premium Supplements & Fitness</p>
        </div>
        <div class="header-right">
            <h2 class="report-title">Orders Report</h2>
            <p class="report-meta">Generated: {{ \Carbon\Carbon::now()->format('F j, Y - g:i A') }}</p>
            <p class="report-meta">Total Records: {{ $orders->count() }}</p>
        </div>
        <div class="clear"></div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Order Date</th>
                <th>Status</th>
                <th style="text-align: right;">Total Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td style="font-weight: bold;">#{{ $order->order_id ?? $order->id }}</td>
                    <td>{{ $order->user ? $order->user->name : 'Unknown Customer' }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->order_date)->format('M d, Y') }}</td>
                    <td>
                        <span class="status-badge status-{{ strtolower($order->order_status) }}">
                            {{ $order->order_status }}
                        </span>
                    </td>
                    <td class="total-amount" style="text-align: right;">
                        £{{ number_format($order->order_total, 2) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        This is an automatically generated report from the WELLTH Admin Dashboard. <br>
        &copy; {{ date('Y') }} WELLTH. All rights reserved.
    </div>

</body>
</html>