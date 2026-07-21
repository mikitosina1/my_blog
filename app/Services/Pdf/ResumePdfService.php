<?php

namespace App\Services\Pdf;

use App\Contracts\PdfServiceInterface;
use App\Data\Pdf\GeneratePdfData;
use App\Extensions\TCPDF_Extension_Resume;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

/**
 * ResumePdfService
 * ---------------------------------------------------------------------------------------------------------------------
 * Return built resume
 */
class ResumePdfService implements PdfServiceInterface
{
    protected TCPDF_Extension_Resume $tcpdf;

    public function __construct(
        protected readonly TemporaryPdfImageStorage $temporaryImages,
    ) {
        $this->tcpdf = new TCPDF_Extension_Resume;

    }

    /**
     *
     * @param GeneratePdfData $data
     * @return string
     */
    public function generatePdf(GeneratePdfData $data): string
    {
        try {
            $this->setMainSettings();
            $this->tcpdf->AddPage();
            $this->tcpdf->setImageScale(1);

            $html = $this->generateHtml($data);
            $this->tcpdf->writeHTML($html, true, false, true);

            return $this->tcpdf->Output(mb_strtolower($data->type).'.pdf', 'S');
        } finally {
            $this->temporaryImages->cleanup();
        }
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
     */
    private function setMainSettings(): void
    {
        $this->tcpdf->SetFont('cormorantgaramondmedium');
        $this->tcpdf->SetMargins(0, 10, 0);
        $this->tcpdf->SetHeaderMargin(0);
        $this->tcpdf->SetFooterMargin(0);
        $this->tcpdf->SetAutoPageBreak(true, 20);
        $this->tcpdf->setImageScale(0);
        $this->tcpdf->setPrintHeader(false);
    }

    /**
     * generateHtml
     * -----------------------------------------------------------------------------------------------------------------
     *
     * @param GeneratePdfData $data
     * @return string
     */
    private function generateHtml(GeneratePdfData $data): string
    {
        return View::make('documents.'.mb_strtolower($data->type), $this->prepareData($data))->render();
    }

    /**
     * prepareData
     * -----------------------------------------------------------------------------------------------------------------
     * return to template additional data if it exists
     *
     * @param GeneratePdfData $data
     * @return array
     */
    private function prepareData(GeneratePdfData $data): array
    {
        return [
            'type' => mb_strtolower($data->type),
            'name' => $data->name,
            'photo' => $this->temporaryImages->store($data->profilePhoto),
            'additional' => $this->getAdditionalData($data->additional),
            'phone' => $data->phone,
            'email' => $data->email,
            'country' => $data->country,
            'city' => $data->city,
            'address' => $data->address,
            'zip' => $data->zip,
            'skills' => $this->prepareSkills($data->skills),
            'experience' => $data->experience,
            'studying' => $data->studying,
            'certificates' => $data->certificates,
        ];
    }

    /**
     * getAdditionalData
     * -----------------------------------------------------------------------------------------------------------------
     * return to template additional data if it exists
     *
     * @param  array  $additional  fields for additional connections name: data
     * @return array
     */
    private function getAdditionalData(array $additional = []): array
    {
        $additional_fields = [];
        if ($additional) {
            foreach ($additional as $addValue) {
                [$key, $value] = explode(':', $addValue, 2);
                $additional_fields[$key] = $value;
            }
        }

        return $additional_fields;
    }

    /**
     *
     * @param string|null $skills
     * @return array
     */
    private function prepareSkills(?string $skills): array
    {
        if ($skills === null || trim($skills) === '') {
            return [];
        }

        return array_values(array_filter(array_map(
            trim(...),
            explode(',', $skills)
        )));
    }

    private function makeHeader(array $data): void
    {
        $this->tcpdf->Cell(0);
    }
}
