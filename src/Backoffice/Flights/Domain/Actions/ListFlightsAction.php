<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

final class ListFlightsAction
{
    /** @return LengthAwarePaginator<int, Flight> */
    public function execute(int $perPage, int $page): LengthAwarePaginator
    {
        return Flight::query()->paginate($perPage, ['*'], 'page', $page);
    }

}
