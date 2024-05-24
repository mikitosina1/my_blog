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
    public function generatePdf(Request $data): string
    {
        // Логика создания резюме с использованием TCPDF
        $this->tcpdf->AddPage();
        $this->tcpdf->SetFont('courier', 'B', 16);
        $this->tcpdf->Cell(40, 10, 'Resume');

        // Возвращаем содержимое PDF-документа в виде строки
        return $this->tcpdf->Output('resume.pdf', 'I'); //I to F
    }
}
