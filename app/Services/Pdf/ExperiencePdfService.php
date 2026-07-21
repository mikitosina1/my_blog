<?php

namespace App\Services\Pdf;

use App\Contracts\PdfServiceInterface;
use App\Data\Pdf\GeneratePdfData;
use App\Extensions\TCPDF_Extension_Resume;

class ExperiencePdfService implements PdfServiceInterface
{
    protected TCPDF_Extension_Resume $tcpdf;

    public function __construct()
    {
        $this->tcpdf = new TCPDF_Extension_Resume;
    }

    public function generatePdf(GeneratePdfData $data): string
    {
        $this->tcpdf->AddPage();
        $this->tcpdf->SetFont('times', 'B', 16);
        $this->tcpdf->Cell(40, 10, $data->type);

        return $this->tcpdf->Output($data->type.'.pdf', 'S'); // I to S
    }
}
