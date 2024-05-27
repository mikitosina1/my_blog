<?php

namespace App\Services;

use App\Models\PdfService;
use Illuminate\Http\Request;

class ExperiencePdfService extends PdfService
{
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