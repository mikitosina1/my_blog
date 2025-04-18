<?php

namespace App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Services\ExperiencePdfService;
use App\Services\ResumePdfService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
	 * @return Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
	 * @throws BindingResolutionException
	 * @see ExperiencePdfService
	 * @see ResumePdfService
	 */
	public function generatePdf(Request $request): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
	{
		$pdfService = app()->make('App\\Services\\' . $request->input('type') . 'PdfService');
		$pdfContent = $pdfService->generatePdf($request);

		return response($pdfContent)
			->header('Content-Type', 'application/pdf');
	}
}

