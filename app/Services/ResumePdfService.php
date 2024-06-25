<?php

namespace App\Services;

use App\Contracts\PdfServiceInterface;
use App\Extensions\TCPDF_Extension_Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;


/**
 * ResumePdfService
 * ---------------------------------------------------------------------------------------------------------------------
 * Return built resume
 */
class ResumePdfService implements PdfServiceInterface
{
    /** @var string store route to temp folder */
    private string $tempFile = '';
    /** @var TCPDF_Extension_Resume */
    protected TCPDF_Extension_Resume $tcpdf;

    public function __construct()
    {
        $this->tcpdf = new TCPDF_Extension_Resume();
    }

    /**
     * @param Request $request
     * @return string
     */
    public function generatePdf(Request $request): string
    {
        $this->setMainSettings();
        $this->tcpdf->AddPage();
        $this->tcpdf->setImageScale(1);
        $html = $this->generateHtml($request);

        $this->tcpdf->writeHTML($html, true, false, true);

        if ($this->tempFile)
            Storage::delete($this->tempFile);

        return $this->tcpdf->Output(mb_strtolower($request->get('type')).'.pdf','S'); //I to F
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
        $this->tcpdf->SetMargins(0, 10, 0);
        $this->tcpdf->SetHeaderMargin(0);
        $this->tcpdf->SetFooterMargin(0);
        $this->tcpdf->SetAutoPageBreak(TRUE, 20);
        $this->tcpdf->setImageScale(0);
        $this->tcpdf->setPrintHeader(false);
    }

    /**
     * generateHtml
     * -----------------------------------------------------------------------------------------------------------------
     * @param Request $request
     * @return string
     */
    private function generateHtml(Request $request): string
    {
        return View::make('documents.'.mb_strtolower($request->get('type')), $this->prepareData($request))->render();
    }

    /**
     * prepareData
     * -----------------------------------------------------------------------------------------------------------------
     * return to template additional data if it exists
     *
     * @param Request $request
     * @return array
     */
    private function prepareData(Request $request): array
    {
        return [
            'type' => mb_strtolower($request->get('type')),
            'name' => $request->get('resources'),
            'photo' => $this->getPhotoPath($request),
            'additional' => $this->getAdditionalData($request->get('additional')),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'country' => $request->get('country'),
            'city' => $request->get('city'),
            'address' => $request->get('address'),
            'zip' => $request->get('zip'),
            'skills' => $request->get('skills'),
            'experience' => $request->get('experience'),
            'studying' => $request->get('studying'),
            'certificates' => $request->get('certificates'),
        ];
    }

    /**
     * getPhotoPath
     * -----------------------------------------------------------------------------------------------------------------
     * save photo and returns url to this photo
     *
     * @param Request $request
     * @return string
     */
    public function getPhotoPath(Request $request): string
    {
        if ($request->hasFile('profile_photo')) {
            $folder = 'public/temp/';
            Storage::makeDirectory($folder);
            $this->tempFile = $request->file('profile_photo')->store($folder);
            return Storage::url($this->tempFile);
        } else {
            return '';
        }
    }

    /**
     * getAdditionalData
     * -----------------------------------------------------------------------------------------------------------------
     * return to template additional data if it exists
     *
     * @param array $additional fields for additional connections name: data
     * @return array
     */
    private function getAdditionalData(array $additional = []): array
    {
        $additional_fields = [];
        if ($additional) {
            foreach ($additional as $addValue) {
                list($key, $value) = explode(':', $addValue, 2);
                $additional_fields[$key] = $value;
            }
        }
        return $additional_fields;
    }
}
