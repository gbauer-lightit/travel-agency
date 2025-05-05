<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Lightit\Backoffice\Cities\Domain\Actions\ListCitiesAction;
use Symfony\Component\HttpFoundation\Response;

final class ListCitiesController extends Controller
{
    public function __invoke(Request $request, ListCitiesAction $action): JsonResponse
    {
        $perPage = (int) $request->query('per_page', '10');
        $page = (int) $request->query('page', '1');

        $cities = $action->execute($perPage, $page);

        return responder()
            ->success($cities)
            ->respond(Response::HTTP_OK);
    }
}
