<?php

namespace App\Models;

use Illuminate\Http\Request;
use App\Extensions\TCPDF_Extension;

/**
 * PdfService
 * ---------------------------------------------------------------------------------------------------------------------
 * Main model for pdf documents with their own basics
 */
class PdfService
{
    /** @var TCPDF_Extension $tcpdf contain TCPDF extended class */
    protected TCPDF_Extension $tcpdf;

    public function __construct()
    {
        $this->tcpdf = new TCPDF_Extension();
    }

    /**
     * generatePdf
     * -----------------------------------------------------------------------------------------------------------------
     * Main function pdf generator
     *
     * @param Request $request
     * @return string
     */
    public function generatePdf(Request $request): string
    {
        $this->tcpdf->AddPage();
        $this->tcpdf->SetFont('times', 'I', 16);
        $this->tcpdf->Cell(40, 10, $request->get('type'));

        return $this->tcpdf->Output($request->get('type').'.pdf', 'I');
    }
}

