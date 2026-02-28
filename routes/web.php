<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('convert-font', function () {
    require_once base_path('vendor/tecnickcom/tcpdf/tcpdf.php');

    $fontPath = storage_path('app/fonts/NotoNastaliqUrdu-Regular.ttf'); // Adjust path

    // Convert the font
    $fontname = TCPDF_FONTS::addTTFfont(
        $fontPath,
        'TrueTypeUnicode',
        '',
        32
    );
    //jameelnoorinastaleeq notonastaliqurdu
    return "Font converted successfully. Use font name: " . $fontname;
});


Route::get('/pdf/urdu', [PDFController::class, 'generateUrduPDF'])->name('pdf.urdu');
Route::get('/pdf/urdu-enriched', [PDFController::class, 'generateEnrichedUrduPDF'])->name('pdf.urdu.enriched');
