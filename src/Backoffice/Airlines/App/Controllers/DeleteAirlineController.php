<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Lightit\Backoffice\Airlines\Domain\Actions\DeleteAirlineAction;
use Symfony\Component\HttpFoundation\Response;

final class DeleteAirlineController extends Controller
{
    public function __invoke(int $airlineId, DeleteAirlineAction $action): JsonResponse
    {
        $action->execute($airlineId);

        return responder()
            ->success()
            ->respond(Response::HTTP_OK);
    }
}
