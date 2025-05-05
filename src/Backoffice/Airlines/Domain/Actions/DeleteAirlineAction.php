<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Exception;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

final class DeleteAirlineAction
{
    public function execute(int $airlineId): void
    {
        $airline = Airline::find($airlineId);

        if ($airline) {
            $airline->delete();
        } else {
            throw new Exception("Airline with ID {$airlineId} not found.");
        }
    }
}
