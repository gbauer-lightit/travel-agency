<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Lightit\Backoffice\Cities\App\Requests\StoreCityRequest;
use Lightit\Backoffice\Cities\Domain\Actions\StoreCityAction;
use Symfony\Component\HttpFoundation\Response;

final class StoreCityController extends Controller
{
    public function __invoke(StoreCityRequest $request, StoreCityAction $action): JsonResponse
    {
        $city = $action->execute($request->toDto());

        return responder()
            ->success($city)
            ->respond(Response::HTTP_CREATED);
    }
}
