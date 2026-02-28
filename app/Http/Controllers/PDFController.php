<?php

namespace App\Http\Controllers;

use App\Services\TcpdfService;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use TCPDF;

class PDFController extends Controller
{

    public function __construct()
    {
        //
    }

    private function getFontUrl()
    {
        // Convert Windows path to file:// URL format
        $fontPath = public_path('fonts/JameelNooriNastaleeq.ttf');

        // Replace backslashes with forward slashes and add file:// prefix
        return 'file:///' . str_replace('\\', '/', $fontPath);
    }


    public function generateUrduPDF()
    {
        // Generate full URL to your font
        $fontUrl = url('fonts/JameelNooriNastaleeq.ttf');

        $data = [
            'title' => 'اردو دستاویز',
            'content' => 'احساسات: اکساہٹ (جوش، تحریک)، اعصابی',
            'date' => now()->format('Y-m-d'),
            'font_path' => $this->getFontUrl(),
        ];

        // Load view and generate PDF
        $pdf = SnappyPdf::loadView('pdfs.template1', $data);

        $pdf->setOption('encoding', 'utf-8');
        $pdf->setOption('enable-local-file-access', true); // Allow local font access
        $pdf->setOption('javascript-delay', 1000); // Give time for fonts to load
        $pdf->setOption('disable-smart-shrinking', true); // Keep exact proportions
        $pdf->setOption('margin-top', 15);
        $pdf->setOption('margin-bottom', 15);
        $pdf->setOption('margin-left', 15);
        $pdf->setOption('margin-right', 15);

        // For debugging (remove in production)
        // $pdf->setOption('debug-javascript', true);
        // $pdf->setOption('no-stop-slow-scripts', true);

        return $pdf->stream('urdu-document.pdf');
    }

    public function generateEnrichedUrduPDF()
    {
        // Generate full URL to your font
        $fontUrl = url('fonts/JameelNooriNastaleeq.ttf');

        // Rich data array with Urdu content
        $data = [
            'title' => 'الشرکۃ التجاریہ المحدود',
            'subtitle' => 'گروپ آف کمپنیز - کاروبار عظیم کی طرف',
            'date' => '۲۸ فروری ۲۰۲۶',
            'content' => 'احساسات: اکساہٹ (جوش، تحریک)، اعصابی، اینٹھن (مروڑ، کھچاؤ)، بیرونی (خارجی) طور پر آنے والی محرکات کے جواب میں انسانی جسم کے مختلف رد عمل ظاہر ہوتے ہیں۔ یہ تمام کیفیات ہماری روزمرہ زندگی کا حصہ ہیں اور ان کا مطالعہ نفسیات کی اہم شاخ ہے۔ جدید تحقیق کے مطابق انسانی جذبات کا اظہار مختلف طریقوں سے ہوتا ہے جن میں چہرے کے تاثرات، جسمانی حرکات اور آواز کے لہجے شامل ہیں۔',
            'items' => [
                ['description' => 'مشاورتی خدمات', 'amount' => '۵۰,۰۰۰', 'status' => 'مکمل'],
                ['description' => 'تربیتی پروگرام', 'amount' => '۷۵,۰۰۰', 'status' => 'جاری'],
                ['description' => 'تحقیقی منصوبہ', 'amount' => '۱,۲۰,۰۰۰', 'status' => 'زیر التواء'],
                ['description' => 'بین الاقوامی کنسلٹنسی', 'amount' => '۳,۰۰,۰۰۰', 'status' => 'منظور شدہ'],
            ],
            'font_path' => $this->getFontUrl(),
        ];

        // Load the enriched template
        $pdf = SnappyPdf::loadView('pdfs.template4', $data);

        // Configure PDF options for best Urdu rendering
        $pdf->setOption('encoding', 'utf-8')
            ->setOption('enable-local-file-access', true)
            ->setOption('javascript-delay', 3000) // Allow time for font loading
            ->setOption('disable-smart-shrinking', true)
            ->setOption('load-error-handling', 'ignore')
            ->setOption('load-media-error-handling', 'ignore')
            ->setOption('margin-top', 5)
            ->setOption('margin-bottom', 5)
            ->setOption('margin-left', 0)
            ->setOption('margin-right', 0)
            ->setOption('page-size', 'A4')
            ->setOption('orientation', 'Portrait')
            ->setOption('dpi', 300) // High DPI for better quality
            ->setOption('image-quality', 94)
            ->setOption('enable-javascript', true)
            ->setOption('no-stop-slow-scripts', true);

        // For debugging (remove in production)
         $pdf->setOption('debug-javascript', true);

        return $pdf->stream('urdu-enriched-document.pdf');
    }
}
