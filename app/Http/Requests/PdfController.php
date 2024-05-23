<?php

namespace App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePdf(Request $request): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $serviceType = $request->input('type');
        $pdfService = app()->make('App\\Services\\' . $serviceType . 'PdfService');
        $pdfContent = $pdfService->generatePdf($request);

        return response($pdfContent)
            ->header('Content-Type', 'application/pdf');
    }
}

