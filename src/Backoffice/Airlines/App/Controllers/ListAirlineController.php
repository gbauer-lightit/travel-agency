<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Lightit\Backoffice\Airlines\Domain\Actions\ListAirlineAction;
use Symfony\Component\HttpFoundation\Response;

final class ListAirlineController extends Controller
{
    public function __invoke(Request $request, ListAirlineAction $action): JsonResponse
    {
        $perPage = (int) $request->query('per_page', '10');
        $page = (int) $request->query('page', '1');

        $airlines = $action->execute($perPage, $page);

        return responder()
            ->success($airlines)
            ->respond(Response::HTTP_OK);
    }
}
