<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Dto;

final readonly class EditCityDto
{
    public function __construct(
        public string|null $name = null,
        public string|null $country = null,
        public string|null $code = null,
    ) {
    }
}
