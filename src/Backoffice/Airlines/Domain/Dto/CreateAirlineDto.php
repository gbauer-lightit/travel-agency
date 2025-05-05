<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Dto;

final class CreateAirlineDto
{
    public function __construct(
        public string $name,
        public string $description,
    ) {
    }
}
