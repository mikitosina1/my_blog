<?php

namespace App\Services;

use App\Models\PdfService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


/**
 * ResumePdfService
 * ---------------------------------------------------------------------------------------------------------------------
 * Return built resume
 */
class ResumePdfService extends PdfService
{
    /**
     * @param Request $request
     * @return string
     */
    public function generatePdf(Request $request): string
    {
        $this->setMainSettings();
        $this->tcpdf->AddPage();
        $html = $this->generateHtml($request);

        $this->tcpdf->writeHTML($html, true, false, true);

        return $this->tcpdf->Output(mb_strtolower($request->get('type')).'.pdf'); //I to F
    }


    /**
     * Fonts:
     ** 'cormorantgaramondb' - bold
     ** 'cormorantgaramondbi' - bold italic
     ** 'cormorantgaramondi' - italic
     ** 'cormorantgaramondlight' - light
     ** 'cormorantgaramondlighti' - light italic
     ** 'cormorantgaramondmedium' - medium
     ** 'cormorantgaramondmediumi' - medium italic
     ** 'cormorantgaramond' - regular
     ** 'cormorantgaramondsemib' - semibold
     ** 'cormorantgaramondsemibi' - semibold italic
     *
     * @return void
     */
    private function setMainSettings(): void
    {
        $this->tcpdf->SetFont('cormorantgaramondmedium');
        $this->tcpdf->SetMargins(0, 0, 0);
        $this->tcpdf->SetHeaderMargin(0);
        $this->tcpdf->SetFooterMargin(0);
        $this->tcpdf->SetAutoPageBreak(TRUE);
        $this->tcpdf->setImageScale(0);
        $this->tcpdf->setPrintHeader(false);
    }

    /**
     * @param Request $request
     * @return string
     */
    private function generateHtml(Request $request): string
    {
        $data = [
            'type' => mb_strtolower($request->get('type')),
            'title_name' => 'Test Titlename',
        ];

        return View::make('documents.'.mb_strtolower($request->get('type')), $data)->render();
    }
}
