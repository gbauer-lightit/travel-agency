<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

final class ListAirlineAction
{
    /** @return LengthAwarePaginator<int, Airline> */
    public function execute(int $perPage, int $page): LengthAwarePaginator
    {
        return Airline::query()->paginate($perPage, ['*'], 'page', $page);
    }
}
