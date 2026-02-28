<!-- resources/views/pdfs/invoice.blade.php -->
<!DOCTYPE html>
<html dir="rtl" lang="ur">
<head>
    <meta charset="UTF-8">
    <title>انوائس {{ $invoice_no }}</title>
    <style>

        @font-face {
            font-family: 'Jameel Noori Nastaleeq';
            src: url('{{ $font_path }}') format('truetype');
        }
        body {
            font-family: 'Jameel Noori Nastaleeq', sans-serif;
            direction: rtl;
            line-height: 1.8;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .company-name {
            font-size: 28pt;
            color: #007348;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th {
            background: #007348;
            color: white;
            padding: 12px;
            font-size: 14pt;
        }
        td {
            padding: 10px;
            border: 1px solid #ddd;
            font-size: 13pt;
        }
        .total {
            font-size: 16pt;
            font-weight: bold;
            text-align: left;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12pt;
            color: #666;
        }
    </style>
</head>
<body>
<div class="invoice-box">
    <div class="header">
        <div class="company-name">الشرکۃ التجاریہ</div>
        <h2>انوائس</h2>
    </div>

    <div class="invoice-details">
        <p><strong>گاہک کا نام:</strong> {{ $customer_name }}</p>
        <p><strong>انوائس نمبر:</strong> {{ $invoice_no }}</p>
        <p><strong>تاریخ:</strong> {{ $date }}</p>
    </div>

    <table>
        <thead>
        <tr>
            <th>مصنوعات</th>
            <th>قیمت (روپے)</th>
            <th>تعداد</th>
            <th>کل رقم</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ $item['product'] }}</td>
                <td>{{ $item['price'] }}</td>
                <td>{{ $item['qty'] }}</td>
                <td>{{ $item['price'] * $item['qty'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @php
        $total = collect($items)->sum(function($item) {
            return $item['price'] * $item['qty'];
        });
    @endphp

    <div class="total">
        کل رقم: {{ $total }} روپے
    </div>

    <div class="footer">
        <p>شکریہ! ہمارے ساتھ کاروبار کرنے کا</p>
        <p>یہ انوائس کمپیوٹر سے تیار کی گئی ہے، دستخط کی ضرورت نہیں</p>
    </div>
</div>
</body>
</html>
