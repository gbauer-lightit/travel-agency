<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Illuminate\Support\Collection;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

final class ListAirlineAction
{
    /** @return Collection<int, Airline> */
    public function execute(): Collection
    {
        return Airline::query()->get();
    }
}
