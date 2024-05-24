<?php

namespace App\Models;

use Illuminate\Http\Request;
use TCPDF;

/**
 * PdfService
 * ---------------------------------------------------------------------------------------------------------------------
 * Main model for pdf documents with their own basics
 */
class PdfService
{
    protected TCPDF $tcpdf;

    public function __construct()
    {
        $this->tcpdf = new TCPDF();
    }

    /**
     * generatePdf
     * -----------------------------------------------------------------------------------------------------------------
     * Main function pdf generator
     *
     * @param Request $data data from request
     * @return string
     */
    public function generatePdf(Request $data): string
    {
        $this->tcpdf->AddPage();
        $this->tcpdf->SetFont('times', 'I', 16);
        $this->tcpdf->Cell(40, 10, 'Resume');

        return $this->tcpdf->Output('resume.pdf', 'I');
    }
}

