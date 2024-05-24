<?php

namespace App\Services;

use App\Models\PdfService;
use Illuminate\Http\Request;


/**
 * ResumePdfService
 * ---------------------------------------------------------------------------------------------------------------------
 * Return built resume
 */
class ResumePdfService extends PdfService
{
    public function generatePdf(Request $request): string
    {
        $this->tcpdf->AddPage();
        $this->tcpdf->SetFont('courier', 'B', 16);
        $this->tcpdf->Cell(40, 10, $request->get('type'));

        return $this->tcpdf->Output($request->get('type').'.pdf', 'I'); //I to F
    }
}
