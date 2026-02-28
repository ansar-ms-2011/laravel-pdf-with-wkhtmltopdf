<!-- resources/views/pdfs/urdu-document-url.blade.php -->
<!DOCTYPE html>
<html dir="rtl" lang="ur">
<head>
    <meta charset="UTF-8">
    <style>
        @font-face {
            font-family: 'Jameel Noori Nastaleeq';
            src: url('{{ $font_path }}') format('truetype');
        }

        body {
            font-family: 'Jameel Noori Nastaleeq', sans-serif;
            direction: rtl;
            text-align: right;
            font-size: 18pt;
            line-height: 2.2;
        }
    </style>

</head>
<body>
<h1>{{ $title }}</h1>
<p>{{ $content }}</p>
</body>
</html>
