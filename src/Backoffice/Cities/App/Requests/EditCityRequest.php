<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lightit\Backoffice\Cities\Domain\Dto\EditCityDto;

final class EditCityRequest extends FormRequest
{
    public const NAME = 'name';
    public const COUNTRY = 'country';
    public const CODE = 'code';

    public function rules(): array
    {
        return [
            self::NAME => ['sometimes', 'string', 'max:255'],
            self::COUNTRY => ['sometimes', 'string', 'max:255'],
            self::CODE => ['sometimes', 'string', 'max:10'],
        ];
    }

    public function toDto(): EditCityDto
    {
        return new EditCityDto(
            name: $this->string(self::NAME)->toString(),
            country: $this->string(self::COUNTRY)->toString(),
            code: $this->string(self::CODE)->toString(),
        );
    }

}
