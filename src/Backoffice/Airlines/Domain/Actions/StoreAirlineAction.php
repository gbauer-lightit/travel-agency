<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Lightit\Backoffice\Airlines\Domain\Dto\CreateAirlineDto;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

final class StoreAirlineAction
{
    public function execute(CreateAirlineDto $createAirlineDto): Airline
    {
        return Airline::create([
            'name' => $createAirlineDto->name,
            'description' => $createAirlineDto->description,
        ]);
    }
}
