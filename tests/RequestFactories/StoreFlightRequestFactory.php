<?php

declare(strict_types=1);

namespace Tests\RequestFactories;

use Worksome\RequestFactories\RequestFactory;

class StoreFlightRequestFactory extends RequestFactory
{
    public function definition(): array
    {
        return [
//            'airline_id' => ??,
            'flight_number' => fake()->unique()->numberBetween(100, 999),
//            'departure_city_id' => ??
//            'arrival_city_id' => ??
            'departure_date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d H:i:s'),
            'arrival_date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d H:i:s'),
        ];
    }
}
