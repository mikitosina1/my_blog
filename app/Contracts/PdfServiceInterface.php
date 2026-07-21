<?php

namespace App\Contracts;

use App\Data\Pdf\GeneratePdfData;

/**
 * PdfService
 * ---------------------------------------------------------------------------------------------------------------------
 * Interface for PDF documents with their own basics
 */
interface PdfServiceInterface
{
    /**
     * generatePdf
     * -----------------------------------------------------------------------------------------------------------------
     * Main function PDF generator
     *
     * @param GeneratePdfData $data
     * @return string
     */
    public function generatePdf(GeneratePdfData $data): string;
}
