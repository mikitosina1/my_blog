<?php

namespace App\Actions\Pdf;

use App\Data\Pdf\GeneratePdfData;
use App\Services\Pdf\ExperiencePdfService;
use App\Services\Pdf\ResumePdfService;
use InvalidArgumentException;

class GeneratePdfAction
{
    public function execute(GeneratePdfData $data): string
    {
        $serviceClass = match ($data->type) {
            'Resume' => ResumePdfService::class,
            'Experience' => ExperiencePdfService::class,
            default => throw new InvalidArgumentException('Unsupported PDF type.'),
        };

        return app($serviceClass)->generatePdf($data);
    }
}
