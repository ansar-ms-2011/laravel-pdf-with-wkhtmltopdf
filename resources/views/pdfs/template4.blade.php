<!-- resources/views/pdfs/urdu-document-url.blade.php -->
<!DOCTYPE html>
<html dir="rtl" lang="ur">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title ?? 'اردو دستاویز' }}</title>
    <style>
        .page-break {
            page-break-after: always;  /* Forces page break after this element */
        }

        .page-break-before {
            page-break-before: always; /* Forces page break before this element */
        }

        .page-break-avoid {
            page-break-inside: avoid;  /* Prevents page break inside this element */
        }

        /* Keep with next - prevents break between this and next element */
        .keep-with-next {
            page-break-after: avoid;
        }

        /* Orphan/widow control */
        .no-orphans {
            orphans: 3;      /* Minimum lines at bottom of page */
            widows: 3;       /* Minimum lines at top of page */
        }
        @font-face {
            font-family: 'Jameel Noori Nastaleeq';
            src: url('{{ $font_path }}') format('truetype');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Jameel Noori Nastaleeq', 'Traditional Arabic', 'Times New Roman', serif;
            direction: rtl;
            text-align: right;
            font-size: 16pt;
            line-height: 1.5;
            color: #2c3e50;
            background: #ffffff;
            /*padding: 10px;*/
            margin: 0;
        }

        /* Main Container */
        .document-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border-radius: 15px;
            overflow: hidden;
        }

        /* Header Section */
        .document-header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 20px 10px;
            text-align: center;
            border-bottom: 2px dashed #695505;
        }

        .header-title {
            font-size: 36pt;
            font-weight: bold;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            color: #665204;
        }

        .header-subtitle {
            font-size: 20pt;
            color: #665204;
            opacity: 0.25;
            letter-spacing: 1px;
        }

        .header-date {
            color: #665204;
            font-size: 14pt;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 2px dashed rgba(255,255,255,0.8);
            display: inline-block;
        }

        /* Main Content Area */
        .content-section {
            padding: 40px 35px;
            background: #ffffff;
        }

        /* Section Headers */
        .section-title {
            font-size: 28pt;
            color: #1e3c72;
            border-right: 8px solid #625210;
            padding-right: 20px;
            margin-bottom: 5px;
            font-weight: bold;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            right: 20px;
            width: 100px;
            height: 3px;
            background: linear-gradient(to left, #1e3c72, transparent);
        }

        /* Paragraphs and Text */
        .paragraph {
            margin-bottom: 25px;
            text-align: justify;
            text-justify: inter-word;
        }

        .highlight-text {
            background: #fff3cd;
            padding: 15px 25px;
            border-radius: 10px;
            border-right: 5px solid #f1c40f;
            margin: 25px 0;
            color: #856404;
        }

        /* Quote Box */
        .quote-box {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px;
            margin: 30px 0;
            border: 1px solid #dee2e6;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            position: relative;
        }

        .quote-box::before {
            content: '"';
            font-size: 120pt;
            position: absolute;
            top: -20px;
            right: 10px;
            color: rgba(30, 60, 114, 0.1);
            font-family: serif;
        }

        .quote-text {
            font-size: 20pt;
            font-style: italic;
            color: #2c3e50;
            line-height: 2.5;
            position: relative;
            z-index: 1;
        }

        .quote-author {
            font-size: 16pt;
            color: #6c757d;
            margin-top: 15px;
            text-align: left;
        }

        /* Lists */
        .styled-list {
            list-style: none;
            margin: 25px 0;
        }

        .styled-list li {
            padding: 12px 35px 12px 15px;
            margin-bottom: 10px;
            background: #f8f9fa;
            border-radius: 8px;
            position: relative;
            border: 1px solid #e9ecef;
        }

        .styled-list li::before {
            content: '●';
            color: #f1c40f;
            font-size: 24pt;
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
        }

        /* Grid Layout for Cards */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            margin: 35px 0;
        }

        .feature-card {
            background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
            padding: 5px 10px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            border: 1px solid #e9ecef;
            transition: transform 0.3s;
            margin-bottom: 10px;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .card-title {
            font-size: 22pt;
            color: #1e3c72;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px dashed #f1c40f;
        }

        /* Table Styles */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 5px 0;
            font-size: 16pt;
        }

        .data-table th {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 15px;
            font-weight: bold;
        }

        .data-table td {
            padding: 12px 15px;
            border: 1px solid #dee2e6;
        }

        .data-table tr:nth-child(even) {
            background: #f8f9fa;
        }

        .data-table tr:hover {
            background: #e9ecef;
        }

        /* Footer Section */
        .document-footer {
            background: linear-gradient(to right, #f8f9fa, #ffffff);
            padding: 30px 35px;
            border-top: 3px solid #1e3c72;
            margin-top: 40px;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .signature-area {
            text-align: center;
        }

        .signature-line {
            width: 200px;
            height: 2px;
            background: #1e3c72;
            margin: 10px 0;
        }

        .stamp {
            background: #dc3545;
            color: white;
            padding: 10px 25px;
            border-radius: 30px;
            font-size: 18pt;
            font-weight: bold;
            transform: rotate(-5deg);
            display: inline-block;
            box-shadow: 0 3px 10px rgba(220,53,69,0.3);
        }

        .long-paragraph{
            text-align: justify;
            text-justify: inter-word;
            direction: rtl;
            line-height: 1.5;
            font-size: 18pt;
            padding: 10px 25px;
        }
        /* Page Break */
        .page-break {
            page-break-after: always;
        }

        /* Responsive Design */
        @media print {
            body {
                padding: 20px;
            }

            .feature-card {
                break-inside: avoid;
            }
        }

        /* Custom Colors and Effects */
        .text-gold {
            color: #f1c40f;
        }

        .text-blue {
            color: #1e3c72;
        }

        .bg-light {
            background: #f8f9fa;
        }

        .border-right-gold {
            border-right: 5px solid #f1c40f;
        }

        .shadow-sm {
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .rounded {
            border-radius: 10px;
        }

        .p-4 {
            padding: 25px;
        }

        .mt-4 {
            margin-top: 25px;
        }

        .mb-4 {
            margin-bottom: 25px;
        }
    </style>
</head>
<body>
<div class="document-container">
    <!-- Header Section -->
    <div class="document-header">
        <div class="header-title">{{ $title ?? 'الشرکۃ التجاریہ' }}</div>
        <div class="header-subtitle">{{ $subtitle ?? 'برائے فروخت و خریداری' }}</div>
        <div class="header-date">{{ $date ?? now()->format('d F Y') }}</div>
    </div>

    <!-- Main Content -->
    <div class="content-section">
        <!-- Introduction Paragraph -->
        <div class="section-title">تعارف</div>
        <div class="paragraph">
            <span style="line-height: 14px; padding: 1px 0; border: 1px solid red;">Ansar Mehmood Khan</span>
            {{ 'احساسات: اکساہٹ (جوش، تحریک)، اعصابی، اینٹھن (مروڑ، کھچاؤ)، بیرونی (خارجی) طور پر آنے والی محرکات کے جواب میں انسانی جسم کے مختلف رد عمل ظاہر ہوتے ہیں۔  یہ تمام کیفیات ہماری روزمرہ زندگی کا حصہ ہیں۔' }}
            <span style="line-height: 14px; padding: 1px 0; border: 1px solid red;">Ansar Mehmood Khan</span>
            {{ 'احساسات: اکساہٹ (جوش، تحریک)، اعصابی، اینٹھن (مروڑ، کھچاؤ)، بیرونی (خارجی) طور پر آنے والی محرکات کے جواب میں انسانی جسم کے مختلف رد عمل ظاہر ہوتے ہیں۔  یہ تمام کیفیات ہماری روزمرہ زندگی کا حصہ ہیں۔' }}
        </div>

        <!-- Highlight Box -->
        <div class="highlight-text">
            <strong>نوٹ:</strong> یہ ایک سرکاری دستاویز ہے جو تمام قانونی تقاضوں کو پورا کرتی ہے۔ This is an English mixed in urdu   براہ کرم تمام معلومات کی تصدیق کر لیں۔
        </div>

        <!-- Quote Box -->
        <div class="quote-box">
            <div class="quote-text">
                "علم حاصل کرو خواہ تمہیں چین تک جانا پڑے۔ کیونکہ علم کی تلاش ہر مسلمان پر فرض ہے۔"
            </div>
            <div class="quote-author">- حضرت محمد ﷺ</div>
        </div>
        <div class="page-break"></div>
        <!-- Features Grid -->
        <div class="section-title">ہماری خدمات</div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="card-title">مشاورت</div>
                <p>پیشہ ورانہ مشاورت برائے کاروبار و تجارت۔ ہمارے ماہرین آپ کی رہنمائی کے لیے حاضر ہیں۔</p>
            </div>
            <div class="feature-card">
                <div class="card-title">تحقیق و ترقی</div>
                <p>جدید ترین تحقیق اور ترقیاتی منصوبوں میں معاونت۔ نئے آئیڈیاز کو پروان چڑھانا۔</p>
            </div>
            <div class="feature-card">
                <div class="card-title">تربیتی پروگرام</div>
                <p>عملی تربیت اور ورکشاپس کا انعقاد۔ پیشہ ورانہ مہارتوں میں اضافہ۔</p>
            </div>
            <div class="feature-card">
                <div class="card-title">بین الاقوامی تعاون</div>
                <p>عالمی شراکت داری اور بین الاقوامی منصوبوں میں شرکت کے مواقع۔</p>
            </div>
        </div>
        <div class="page-break-avoid">
            <!-- Data Table -->
            <div class="section-title">مالیاتی رپورٹ</div>
            <table class="data-table">
                <thead>
                <tr>
                    <th>تفصیل</th>
                    <th>رقم (روپے)</th>
                    <th>تاریخ</th>
                    <th>حالت</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>فروخت (پہلی سہ ماہی)</td>
                    <td>۵,۰۰,۰۰۰</td>
                    <td>۲۰۲۶-۰۱-۱۵</td>
                    <td>مکمل</td>
                </tr>
                <tr>
                    <td>فروخت (دوسری سہ ماہی)</td>
                    <td>۷,۵۰,۰۰۰</td>
                    <td>۲۰۲۶-۰۴-۲۰</td>
                    <td>زیر التواء</td>
                </tr>
                <tr>
                    <td>اخراجات</td>
                    <td>۲,۰۰,۰۰۰</td>
                    <td>۲۰۲۶-۰۲-۲۸</td>
                    <td>منظور شدہ</td>
                </tr>
                <tr>
                    <td>منافع (مجموعی)</td>
                    <td>۱۰,۵۰,۰۰۰</td>
                    <td>۲۰۲۶-۰۶-۳۰</td>
                    <td>متوقع</td>
                </tr>
                </tbody>
            </table>
        </div>


        <!-- Styled List page-break-avoid-->
        <div class="page-break-avoid">
            <div class="section-title">اہم نکات</div>
            <ul class="styled-list">
                <li>تمام دستاویزات کی تصدیق ضروری ہے</li>
                <li>آخری تاریخ: ۳۰ جون ۲۰۲۶</li>
                <li>براہ کرم اپنی معلومات تازہ ترین رکھیں</li>
                <li>کسی بھی شکایت کے لیے رابطہ کریں</li>
                <li>آن لائن سہولیات سے استفادہ حاصل کریں</li>
                <li>نیا اکاؤنٹ کھولنے کے لیے درخواست دیں</li>
            </ul>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="document-footer">
        <div class="footer-content">
            <div>
                <strong>جاری کردہ:</strong> محکمہ داخلی امور<br>
                <strong>شناختی نمبر:</strong> DOC-{{ rand(10000, 99999) }}<br>
                <strong>صفحہ:</strong> 1/1
            </div>

            <div class="signature-area">
                <div>دستخط مجاز</div>
                <div class="signature-line"></div>
                <div>احمد حسن - ڈائریکٹر</div>
            </div>

            <div class="stamp">
                مصدقہ
            </div>
        </div>

        <!-- Confidential Note -->
        <div style="text-align: center; margin-top: 30px; padding-top: 20px; border-top: 1px dashed #ccc; font-size: 12pt; color: #6c757d;">
            © ۲۰۲۶ - جملہ حقوق محفوظ ہیں۔ یہ دستاویز خفیہ ہے اور صرف مطلوبہ شخص کے استعمال کے لیے ہے۔
        </div>
    </div>
    <div class="long-paragraph">
        <p>**یہ اردو زبان کا ایک خوبصورت نمونہ ہے جو براہ راست تحریر کیا جا رہا ہے۔ اس میں تمام حروف ملاتے ہوئے لکھے گئے ہیں تاکہ قارئین کو پڑھنے میں آسانی ہو اور زبان کی خوبصورتی برقرار رہے۔ اردو زبان کا دامن صدیوں سے علم و ادب کے پھولوں سے بھرا ہوا ہے۔ اس زبان میں شاعری کی روایت نے دنیا بھر میں شہرت حاصل کی ہے۔ غالب، اقبال، فیض اور میر جیسے عظیم شاعروں نے اردو کو عروج بخشا۔
            اردو نہ صرف پاکستان کی قومی زبان ہے بلکہ بھارت کی پندرہ سرکاری زبانوں میں سے ایک ہے۔ اس زبان کی لطافت اور نزاکت کا اندازہ اس بات سے لگایا جا سکتا ہے کہ اس میں محبت اور الفت کے لیے درجنوں الفاظ موجود ہیں۔ اردو کا قاعدہ ہے کہ جتنا بولنے والا شائستہ ہوتا ہے، اس کی زبان بھی اتنی ہی شائستہ ہو جاتی ہے۔
            آج کے دور میں اردو کو جدید تقاضوں سے ہم آہنگ کرنے کی ضرورت ہے۔ انٹرنیٹ اور سوشل میڈیا پر اردو مواد کی فراہمی بڑھ رہی ہے۔ اردو کمپیوٹنگ نے بھی ترقی کی ہے اور اب اردو ٹائپنگ بہت آسان ہو گئی ہے۔ نستعلیق رسم الخط نے اردو کو ایک منفرد جمالیاتی پہچان دی ہے۔ جب ہم اردو پڑھتے ہیں تو صرف الفاظ نہیں پڑھتے بلکہ تہذیب و ثقافت کی ایک پوری روایت سے روشناس ہوتے ہیں۔
            یہ زبان دل کی زبان ہے، جذبات کی زبان ہے اور محبت کے اظہار کا بہترین ذریعہ ہے۔ آئیں ہم سب مل کر اس خوبصورت زبان کو فروغ دیں اور آنے والی نسلوں تک اس کی روایت کو پہنچائیں۔ اردو زندہ باد</p>

        <p>ایرانی ساختہ میزائلوں کے ان چار گروپوں میں بنیادی طور پر سطح سے سطح اور سطح سے سمندر میں مار کرنے والے میزائل شامل ہیں۔
            البتہ دفاعی نظام کے میزائل بھی ایران کے ہتھیاروں میں شامل ہیں جن میں سے کچھ روس اور چین کے بنائے ہوئے ہیں اور کچھ ایرانی مسلح افواج کی اپنی پیشکش ہیں جن کا یہاں ذکر نہیں کیا گیا۔
            اپریل 2024 میں اسرائیل پر اپنے میزائل حملے میں ایران نے ’عماد تھری‘ بیلسٹک میزائل، ’پاوہ‘ کروز میزائل اور ’شاہد 136‘ ڈرون کا استعمال کیا۔
            تاہم اسلامی جمہوریہ کی سرکاری خبر رساں ایجنسی نے ’خیبر شِکن‘ بیلسٹک میزائل داغنے کا بھی دعویٰ کیا تھا۔</p>

        <p>عماد بیلسٹک میزائل درمیانے فاصلے تک مار کرنے والا ہتھیار ہے اور اس کی رینج 1700 کلومیٹر تک ہونے کا دعویٰ کیا جاتا ہے۔ اس میزائل کی لمبائی 15 میٹر ہے اور کہا جاتا ہے کہ اس کے وار ہیڈ کا وزن 750 کلو گرام ہے۔ اس میزائل کی نقاب کشائی سنہ 2015 میں کی گئی تھی۔
            عماد میزائل القدر بیلسٹک میزائل کی بہتر شکل ہے۔
            پاوہ درمیانی فاصلے تک مار کرنے والے کروز میزائلوں کا ایک خاندان ہے جس کی رینج 1650 کلومیٹر ہے اور کہا جاتا ہے کہ یہ میزائلوں کی ایک نسل ہے جو ہدف تک پہنچنے کے لیے مختلف راستے اختیار کر سکتا ہے۔
            پاوہ میزائل گروپ میں حملہ کرنے اور حملے کے دوران ایک دوسرے سے رابطے کی صلاحیت رکھتے ہیں اور شاید اسی وجہ سے اسے اسرائیل پر حملے کے لیے چُنا گیا تھا۔
            پاوہ میزائل کی نقاب کشائی فروری 2023 میں ہوئی تھی اور ایران نے دعویٰ کیا تھا کہ یہ میزائل اسرائیل تک پہنچنے کی صلاحیت رکھتے ہیں، جو 13 اپریل کو ہونے والے حملے میں ثابت بھی ہوا۔
            ایران کے پاس اس وقت میزائلوں کی زیادہ سے زیادہ موثر رینج دو سے ڈھائی ہزار کلومیٹر کے درمیان ہے اور وہ فی الحال یورپی ممالک کو نشانہ بنانے کے قابل نہیں ہے۔
            ایران کی مسلح افواج نے دعویٰ کیا ہے کہ ایسا رہبر اعلیٰ علی خامنہ ای کی ہدایت پر ہے جنھوں نے کہا تھا کہ فی الحال ایرانی میزائلوں کی رینج دو ہزار کلومیٹر سے زیادہ نہیں ہونی چاہیے۔ اس ہدایت کے بعد طویل فاصلے تک مار کرنے والے میزائلوں کی تیاری کا سلسلہ روک دیا گیا ہے۔ آیت اللہ خامنہ ای کے مطابق اس فیصلے کی ایک ’وجہ‘ ہے، لیکن انھوں نے وہ وجہ بیان نہیں کی۔
            ’ذوالفقار‘ ایک اور مختصر فاصلے (700 کلومیٹر) تک مار کرنے والا بیلسٹک میزائل ہے جسے سنہ 2017 اور 2018 میں داعش کے ٹھکانوں پر حملہ کرنے کے لیے استعمال کیا گیا تھا۔ اس میزائل کی لمبائی 10 میٹر ہے، اس میں ایک موبائل لانچ پلیٹ فارم ہے اور اس کے ریڈار پر نظر نہ آنے کی صلاحیت سے لیس ہونے کا دعویٰ کیا جاتا ہے۔
            ذوالفقار فتح 110 میزائل کی بہتر شکل ہے اور اس کے وار ہیڈ کا وزن 450 کلو بتایا جاتا ہے۔
        </p>
    </div>
</div>
</body>
</html>
