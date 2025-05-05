<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Lightit\Backoffice\Flights\Domain\Actions\GetFlightsByCityAction;
use Symfony\Component\HttpFoundation\Response;

final class GetFlightByCityController extends Controller
{
    public function __invoke(int $cityId, GetFlightsByCityAction $action): JsonResponse
    {
        $flights = $action->execute($cityId);

        return responder()
            ->success($flights)
            ->respond(Response::HTTP_OK);
    }
}
