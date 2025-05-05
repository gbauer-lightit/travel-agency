<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Illuminate\Support\Collection;
use Lightit\Backoffice\Cities\Domain\Models\City;

final class ListCitiesAction
{
    /** @return Collection<int, City> */
    public function execute(): Collection
    {
        return City::withCount(['departures', 'arrivals'])->get();
    }
}
