<?php

namespace App\Http\Controllers\Api\V1;

use App\Services\AppBootstrapService;
use Illuminate\Http\JsonResponse;

readonly class AppBootstrapController
{
    public function __construct(
        private AppBootstrapService $bootstrap,
    ) {}

    public function __invoke(): JsonResponse
    {
        return response()->json(
            $this->bootstrap->get()
        );
    }
}