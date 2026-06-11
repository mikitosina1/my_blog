<?php

namespace App\Contracts;

use Illuminate\Http\Request;

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
     */
    public function generatePdf(Request $request): string;
}
