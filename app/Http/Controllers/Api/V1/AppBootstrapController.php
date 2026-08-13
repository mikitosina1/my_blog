<?php

namespace App\Http\Controllers\Api\V1;

use App\Services\AppBootstrapService;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\JsonResponse;
use JsonException;

readonly class AppBootstrapController
{
    public function __construct(
        private AppBootstrapService $bootstrap,
    ) {}

    /**
     * @throws FileNotFoundException
     * @throws JsonException
     */
    public function __invoke(): JsonResponse
    {
        return response()->json(
            $this->bootstrap->get()
        );
    }
}