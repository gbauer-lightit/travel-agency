<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Lightit\Backoffice\Cities\Domain\Actions\DeleteCityAction;

final class DeleteCityController extends Controller
{
    public function __invoke(int $cityId, DeleteCityAction $action): JsonResponse
    {
        $action->execute($cityId);

        return responder()
            ->success(['message' => 'City deleted successfully'])
            ->respond(200);
    }
}
