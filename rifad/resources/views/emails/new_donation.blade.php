<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: "Cairo", sans-serif;
            background: #f9f9f9;
            color: #222;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 30px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #C9A227, #0A4D68);
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .header img {
            height: 50px;
            margin-bottom: 10px;
        }
        .content {
            padding: 25px;
            line-height: 1.8;
        }
        .content h2 {
            color: #0A4D68;
            margin-bottom: 15px;
        }
        .details {
            background: #f3f6fa;
            border-radius: 10px;
            padding: 15px;
            margin: 20px 0;
        }
        .details li {
            margin-bottom: 8px;
        }
        .cta {
            text-align: center;
            margin-top: 25px;
        }
        .cta a {
            display: inline-block;
            background: linear-gradient(135deg, #C9A227, #B08C1A);
            color: #0A4D68;
            font-weight: bold;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            box-shadow: 0 6px 18px rgba(201,162,39,0.3);
        }
        .footer {
            background: #0A4D68;
            color: #fff;
            text-align: center;
            padding: 15px;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>منصّة التبرعات</h1>
        </div>
        <div class="content">
            <h2>📩 إشعار تبرع جديد</h2>
            <p>وصل تبرع جديد بانتظار موافقتك. التفاصيل الكاملة:</p>
            <ul class="details">
                <li><strong>اسم المتبرع:</strong> {{ $donor->name }}</li>
                <li><strong>البريد الإلكتروني:</strong> {{ $donor->email ?? 'غير مذكور' }}</li>
                <li><strong>الهاتف:</strong> {{ $donor->phone ?? 'غير مذكور' }}</li>
                <li><strong>المبلغ:</strong> {{ number_format($donor->donated_amount, 2) }} </li>
                <li><strong>المشروع:</strong> {{ $donor->project->title }}</li>
                <li><strong>الحالة الحالية:</strong> {{ $donor->status }}</li>
            </ul>
            <div class="cta">
                <a href="{{ url('/filament/auth/admin/donors') }}">🔗 الدخول للوحة التحكم للموافقة</a>
            </div>
        </div>
        <div class="footer">
            © {{ date('Y') }} منصّة التبرعات – جميع الحقوق محفوظة
        </div>
    </div>
</body>
</html>
