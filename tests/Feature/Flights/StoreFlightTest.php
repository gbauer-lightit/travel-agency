<?php

declare(Strict_types=1);

use Tests\RequestFactories\StoreFlightRequestFactory;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\postJson;

describe('Testing flight creation', function (): void {
//    it('Should store a new flight', function (): void {
//        $request = StoreFlightRequestFactory::new()->create();
//
//        postJson('/api/flights', $request)
//            ->assertCreated()
//            ->assertJsonStructure([
//                'status',
//                'success',
//                'data',
//            ]);
//
//        assertDatabaseHas('flights', [
//            'flight_number' => $request['flight_number'],
//            'airline_id' => $request['airline_id'],
//            'departure_city_id' => $request['departure_city_id'],
//            'arrival_city_id' => $request['arrival_city_id'],
//        ]);
//    });
});
