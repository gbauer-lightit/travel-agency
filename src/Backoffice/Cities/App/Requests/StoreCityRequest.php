<?php

declare(Strict_types=1);

namespace Lightit\Backoffice\Cities\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lightit\Backoffice\Cities\Domain\Dto\CreateCityDto;

final class StoreCityRequest extends FormRequest
{
    public const NAME = 'name';
    public const COUNTRY = 'country';
    public const CODE = 'code';

    public function rules(): array
    {
        return [
            self::NAME => 'required|string|max:255',
            self::COUNTRY => 'required|string|max:255',
            self::CODE => 'required|string|max:3|unique:cities,code',
        ];
    }

    public function toDto(): CreateCityDto
    {
        return new CreateCityDto(
            name: $this->string(self::NAME)->toString(),
            country: $this->string(self::COUNTRY)->toString(),
            code: $this->string(self::CODE)->toString(),
        );
    }

}
