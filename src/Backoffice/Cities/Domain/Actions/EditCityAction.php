<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Lightit\Backoffice\Cities\Domain\Dto\EditCityDto;
use Lightit\Backoffice\Cities\Domain\Models\City;

final class EditCityAction
{
    public function execute(EditCityDto $dto, int $cityId): City
    {
        $city = City::findOrFail($cityId);

        $city->update(array_filter([
            'name' => $dto->name,
            'country' => $dto->country,
            'code' => $dto->code,
        ]));

        return $city;
    }
}
