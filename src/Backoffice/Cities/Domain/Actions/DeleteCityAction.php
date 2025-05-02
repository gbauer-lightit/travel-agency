<?php

declare(Strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Exception;
use Lightit\Backoffice\Cities\Domain\Models\City;

final class DeleteCityAction
{
    public function execute(int $cityId): void
    {
        $city = City::find($cityId);

        if ($city) {
            $city->delete();
        } else {
            throw new Exception("City with ID {$cityId} not found.");
        }
    }
}
