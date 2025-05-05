<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Actions;

use Lightit\Backoffice\Flights\Domain\Dto\CreateFlightDto;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

final class StoreFlightAction
{
    public function execute(CreateFlightDto $createFlightDto): Flight
    {
        return Flight::create([
            'airline_id' => $createFlightDto->airlineId,
            'flight_number' => $createFlightDto->flightNumber,
            'departure_city_id' => $createFlightDto->departureCityId,
            'arrival_city_id' => $createFlightDto->arrivalCityId,
            'departure_date' => $createFlightDto->departureDate,
            'arrival_date' => $createFlightDto->arrivalDate,
        ]);
    }
}
