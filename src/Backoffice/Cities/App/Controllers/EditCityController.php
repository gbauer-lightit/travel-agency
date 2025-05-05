<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Lightit\Backoffice\Cities\App\Requests\EditCityRequest;
use Lightit\Backoffice\Cities\Domain\Actions\EditCityAction;

final class EditCityController extends Controller
{
    public function __invoke(EditCityRequest $request, EditCityAction $action, int $cityId): JsonResponse
    {
        $city = $action->execute($request->toDto(), $cityId);

        return responder()
            ->success($city)
            ->respond(201);
    }
}
