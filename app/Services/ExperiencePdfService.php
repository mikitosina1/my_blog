<?php

namespace App\Services;

use App\Contracts\PdfServiceInterface;
use App\Extensions\TCPDF_ExtensionResume;
use Illuminate\Http\Request;

class ExperiencePdfService implements PdfServiceInterface
{
    /** @var TCPDF_ExtensionResume */
    protected TCPDF_ExtensionResume $tcpdf;

    public function __construct()
    {
        $this->tcpdf = new TCPDF_ExtensionResume();
    }
    public function generatePdf(Request $request): string
    {
        // Логика создания описания опыта работы с использованием TCPDF
        $this->tcpdf->AddPage();
        $this->tcpdf->SetFont('times', 'B', 16);
        $this->tcpdf->Cell(40, 10, $request->get('type'));

        // Возвращаем содержимое PDF-документа в виде строки
        return $this->tcpdf->Output($request->get('type').'.pdf', 'I');//I to S
    }
}
