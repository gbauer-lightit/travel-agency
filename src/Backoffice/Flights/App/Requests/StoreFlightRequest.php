<?php

declare(Strict_types=1);

namespace Lightit\Backoffice\Flights\App\Requests;

use DateTimeImmutable;
use Illuminate\Foundation\Http\FormRequest;
use Lightit\Backoffice\Flights\Domain\Dto\CreateFlightDto;

final class StoreFlightRequest extends FormRequest
{
    public const AIRLINE_ID = 'airline_id';

    public const FLIGHT_NUMBER = 'flight_number';

    public const DEPARTURE_CITY_ID = 'departure_city_id';

    public const ARRIVAL_CITY_ID = 'arrival_city_id';

    public const DEPARTURE_DATE = 'departure_date';

    public const ARRIVAL_DATE = 'arrival_date';

    public function rules(): array
    {
        return [
            self::AIRLINE_ID => ['required', 'integer', 'exists:airlines,id'], //TO-DO: change all rules to this format
            self::FLIGHT_NUMBER => 'required|string|max:255',
            self::DEPARTURE_CITY_ID => 'required|integer|exists:cities,id',
            self::ARRIVAL_CITY_ID => 'required|integer|exists:cities,id',
            self::DEPARTURE_DATE => 'required|date_format:Y-m-d H:i:s',
            self::ARRIVAL_DATE => 'required|date_format:Y-m-d H:i:s',
        ];
    }

    public function toDto(): CreateFlightDto
    {
        return new CreateFlightDto(
            airlineId: $this->integer(self::AIRLINE_ID),
            flightNumber: $this->string(self::FLIGHT_NUMBER)->toString(),
            departureCityId: $this->integer(self::DEPARTURE_CITY_ID),
            arrivalCityId: $this->integer(self::ARRIVAL_CITY_ID),
            departureDate: new DateTimeImmutable($this->string(self::DEPARTURE_DATE)->toString()),
            arrivalDate: new DateTimeImmutable($this->string(self::ARRIVAL_DATE)->toString()),
        );
    }
}
