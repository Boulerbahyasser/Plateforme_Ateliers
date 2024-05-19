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
        $html = '<h1>Demande ID:'.$demande_id.'</h1><br>
                 <h1>Date:'.$date.'</h1><br>
                 <h1>Total HT:'.$totale_ht.'</h1><br>
                 <h1>Total TTC:'.$totale_ttc.'</h1>';
        $dompdf->loadHtml($html);
        $pdfContent = $dompdf->output();
        $filePath = 'devis/' . $demande_id . '.pdf';
        Storage::put($filePath, $pdfContent);
        return $filePath;
    }
}
