<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF()
    {
        // Instantiate Dompdf
        $dompdf = new Dompdf();

        // Load HTML content
        $html = '<h1>Hello, world!</h1>';
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (optional: you can also choose to save the PDF to a file)
        $dompdf->render();

        // Output the generated PDF to the browser
        return $dompdf->stream('document.pdf');
    }
}
