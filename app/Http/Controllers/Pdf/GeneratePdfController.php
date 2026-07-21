<?php

namespace App\Http\Controllers\Pdf;

use App\Actions\Pdf\GeneratePdfAction;
use App\Data\Pdf\GeneratePdfData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pdf\GeneratePdfRequest;
use Symfony\Component\HttpFoundation\Response;

class GeneratePdfController extends Controller
{
    public function __construct(
        private readonly GeneratePdfAction $action,
    ) {}

    /**
     * @param GeneratePdfRequest $request
     * @return Response
     */
    public function __invoke(GeneratePdfRequest $request): Response
    {
        $pdf = $this->action->execute(
            GeneratePdfData::fromRequest($request)
        );

        return response($pdf)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="resume.pdf"');
    }
}
