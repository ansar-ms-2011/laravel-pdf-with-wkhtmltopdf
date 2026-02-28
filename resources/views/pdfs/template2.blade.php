<!-- resources/views/pdfs/urdu-document.blade.php -->
<!DOCTYPE html>
<html dir="rtl" lang="ur">
<head>
    <meta charset="UTF-8">
    <title>دستاویز</title>
    <style>
        body {
            font-family: 'jameelnoorinastaleeq', sans-serif;
            line-height: 2;
            color: #333;
        }
        h1 {
            color: #007348;
            font-size: 24pt;
            text-align: center;
            margin-bottom: 30px;
        }
        p {
            font-size: 14pt;
            margin-bottom: 15px;
        }
        .urdu-text {
            text-align: right;
        }
        .highlight {
            color: #c0392b;
            font-weight: bold;
        }
    </style>
</head>
<body>
<h1>اردو زبان کا نمونہ</h1>

<div class="urdu-text">
    <p>احساسات: اکساہٹ (جوش، تحریک)، اعصابی</p>
    <p>بیرونی (خارجی) طور پر آنے والی محرکات</p>
    <p>یہ ایک <span class="highlight">مکمل</span> اردو جملہ ہے جو صحیح طور پر منسلک ہو کر ظاہر ہونا چاہیے۔</p>
    <p>تاریخ: {{ date('Y-m-d') }}</p>
</div>
</body>
</html>
