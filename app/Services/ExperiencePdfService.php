<?php

namespace App\Services;

use App\Contracts\PdfServiceInterface;
use App\Extensions\TCPDF_Extension_Resume;
use Illuminate\Http\Request;

class ExperiencePdfService implements PdfServiceInterface
{
	/** @var TCPDF_Extension_Resume */
	protected TCPDF_Extension_Resume $tcpdf;

	public function __construct()
	{
		$this->tcpdf = new TCPDF_Extension_Resume();
	}

	public function generatePdf(Request $request): string
	{
		$this->tcpdf->AddPage();
		$this->tcpdf->SetFont('times', 'B', 16);
		$this->tcpdf->Cell(40, 10, $request->get('type'));

		return $this->tcpdf->Output($request->get('type') . '.pdf', 'I');//I to S
	}
}
