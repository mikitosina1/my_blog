<?php

namespace App\Contracts;

use Illuminate\Http\Request;

/**
 * PdfService
 * ---------------------------------------------------------------------------------------------------------------------
 * Interface for pdf documents with their own basics
 */
interface PdfServiceInterface
{
    /**
     * generatePdf
     * -----------------------------------------------------------------------------------------------------------------
     * Main function pdf generator
     *
     * @param Request $request
     * @return string
     */
    public function generatePdf(Request $request): string;
}
