<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Lightit\Backoffice\Flights\Domain\Actions\ListFlightsAction;
use Symfony\Component\HttpFoundation\Response;

final class ListFlightsController extends Controller
{
    public function __invoke(Request $request, ListFlightsAction $action): JsonResponse
    {
        $perPage = (int) $request->query('per_page', '10');
        $page = (int) $request->query('page', '1');

        $cities = $action->execute($perPage, $page);

        return responder()
            ->success($cities)
            ->respond(Response::HTTP_OK);
    }
}
