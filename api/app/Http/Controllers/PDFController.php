<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    static public function generatePDF($demande_id,$date,$totale_ht,$totale_ttc){
        $dompdf = new Dompdf();

// Ensure that demande_id, date, totale_ht, totale_ttc are correctly set
        $html = '<br><br><br><br>
                  <br><br><br><br>
                  <br><br><br>
                  <br><hr><br><div style="text-align: center"><h1>Demande ID: '.$demande_id.'</h1></div><br><br>
         <div style="text-align: center"><h1>Date: '.$date.'</h1></div><br><br>
         <div style="text-align: center"><h1>Total HT: '.$totale_ht.'</h1></div><br><br>
         <div style="text-align: center"><h1>Total TTC: '.$totale_ttc.'</h1></div><br><hr>';

// Load HTML content
        $dompdf->loadHtml($html);

// Render the HTML as PDF
        $dompdf->render();

// Output the generated PDF content
        $pdfContent = $dompdf->output();

// Define file path
        $filePath = 'devis/' . $demande_id . '.pdf';

// Store the PDF content to the specified file path
        Storage::put($filePath, $pdfContent);

// Return the file path
        return $filePath;
    }
}
