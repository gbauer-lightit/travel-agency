<?php

declare(Strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Actions;

use Illuminate\Support\Collection;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

final class GetFlightsByCityAction
{
    /** @return Collection<int, Flight> */
    public function __invoke(int $cityId): Collection
    {
        return Flight::query()
            ->where('departure_city_id', $cityId)
            ->orWhere('arrival_city_id', $cityId)
            ->get();
    }
}


