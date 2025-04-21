<?php

declare(Strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Lightit\Backoffice\Cities\Domain\Dto\CreateCityDto;
use Lightit\Backoffice\Cities\Domain\Models\City;

final readonly class StoreCityAction
{
    public function execute(CreateCityDto $createCityDto): City
    {
        return City::create([
            'name' => $createCityDto->name,
            'country' => $createCityDto->country,
            'code' => $createCityDto->code,
        ]);
    }
}
