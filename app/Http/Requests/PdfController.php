<?php

namespace App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;

/**
 * PdfController
 * ---------------------------------------------------------------------------------------------------------------------
 * Controls basics to call correct Service and send correct data
 */
class PdfController extends Controller
{
    /**
     * generatePdf
     * -----------------------------------------------------------------------------------------------------------------
     * Main function, address request to correct class, which return correct pdf class from app/Services
     *
     * @param Request $request
     * @throws BindingResolutionException
     */
    public function generatePdf(Request $request): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $serviceType = $request->input('type');
        $pdfService = app()->make('App\\Services\\' . $serviceType . 'PdfService');
        $pdfContent = $pdfService->generatePdf($request);

        return response($pdfContent)
            ->header('Content-Type', 'application/pdf');
    }
}

