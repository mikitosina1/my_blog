<?php

namespace App\Extensions;

use TCPDF;

class TCPDF_Extension_Resume extends TCPDF
{

    public function Footer(): void
    {
        $this->ImageSVG(public_path('images/Resume_background.svg'), 0, 0, 210, 297);
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
