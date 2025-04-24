<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Dto;

final readonly class CreateCityDto
{
    public function __construct(
        public string $name,
        public string $country,
        public string $code,
    )
    {
    }
}
