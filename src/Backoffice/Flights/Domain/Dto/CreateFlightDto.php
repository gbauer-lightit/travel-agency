<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Dto;

use DateTimeImmutable;

final readonly class CreateFlightDto
{
    public function __construct(
        public int $airlineId,
        public string $flightNumber,
        public int $departureCityId,
        public int $arrivalCityId,
        public DateTimeImmutable $departureDate,
        public DateTimeImmutable $arrivalDate,
    ) {
    }
}
