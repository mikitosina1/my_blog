<?php

namespace App\Extensions;

use TCPDF;

class TCPDF_Extension_Resume extends TCPDF
{

    public function Footer(): void
    {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

    public function AddPage($orientation = '', $format = '', $keepmargins = false, $tocpage = false): void {
        parent::AddPage($orientation, $format, $keepmargins, $tocpage);
        $dimensions = $this->getPageDimensions();
        $this->setPageMark(0, 0, $dimensions['wk'], $dimensions['hk'], public_path('images/Resume_background.svg'), true, 0, false);
    }
}
