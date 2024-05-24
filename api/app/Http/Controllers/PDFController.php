<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    static public function generatePDF($demande_id,$date,$totale_ht,$totale_ttc,$user){
        $dompdf = new Dompdf();
        $totale_ht = number_format($totale_ht, 2, ',', ' ');
        $totale_ttc = number_format($totale_ttc, 2, ',', ' ');

        $html = '
    <style>
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            border: 1px solid #ddd;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            max-width: 800px;
            margin: auto;
        }
        h1 {
            font-size: 36px;
            color: #4CAF50;
            margin-bottom: 20px;
        }
        h2 {
            font-size: 24px;
            color: #555;
            margin-bottom: 20px;
        }
        h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }
        hr {
            border: none;
            height: 1px;
            background-color: #ddd;
            margin: 20px 0;
        }
        .details {
            margin: 20px 0;
        }
        .details div {
            margin-bottom: 15px;
        }
        .details span {
            font-weight: bold;
            color: #333;
        }
        .footer {
            margin-top: 40px;
        }
    </style>
    <br><br><br><br><br><br>
    <div class="container">
        <h1>Détails de devis</h1>
        <hr>
        <div class="details">
            <div><h3>Identifiant de la Demande: <span>' . $demande_id . '</span></h3></div>
            <div><h3>Nom du Client: <span>' . $user->name . '</span></h3></div>
            <div><h3>Date: <span>' . $date . '</span></h3></div>
            <div><h3>Total HT: <span>' . $totale_ht .' DH'. '</span></h3></div>
            <div><h3>Total TTC: <span>' . $totale_ttc .' DH'. '</span></h3></div>
        </div>
        <hr>
        <div class="footer">
            <h2>Merci pour votre confiance !</h2>
        </div>
    </div>';
// Load HTML content
        $dompdf->loadHtml($html);

// Render the HTML as PDF
        $dompdf->render();

// Output the generated PDF content
        $pdfContent = $dompdf->output();

// Define file path
        $filePath = 'public/devis/' . $demande_id . '.pdf';

// Store the PDF content to the specified file path
        Storage::put($filePath, $pdfContent);

// Return the file path
        return $filePath;
    }
}
