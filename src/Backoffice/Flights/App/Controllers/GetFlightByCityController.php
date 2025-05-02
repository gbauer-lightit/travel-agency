<?php

declare(Strict_types=1);

namespace Lightit\Backoffice\Flights\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Lightit\Backoffice\Flights\Domain\Actions\GetFlightsByCityAction;

final class GetFlightByCityController extends Controller
{
    public function __invoke(int $cityId, GetFlightsByCityAction $action): JsonResponse
    {
        $flights = $action($cityId);

        return responder()
            ->success($flights)
            ->respond(200);
    }
}
