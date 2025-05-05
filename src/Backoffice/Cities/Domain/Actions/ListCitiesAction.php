<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Cities\Domain\Models\City;

final class ListCitiesAction
{
    /** @return LengthAwarePaginator<int, City> */
    public function execute(int $perPage, int $page): LengthAwarePaginator
    {
        return City::withCount(['departures', 'arrivals'])->paginate($perPage, ['*'], 'page', $page);
    }
}
