<?php
declare(Strict_types=1);

use Tests\RequestFactories\StoreAirlineRequestFactory;
use function Pest\Laravel\assertDatabaseEmpty;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\postJson;

describe('Testing store airline', function () {
    it('stores a new airline', function () {
        $request = StoreAirlineRequestFactory::new()->create();

        postJson('/api/airlines', $request)->assertCreated()->assertJsonStructure([
            'status',
            'success',
            'data' => [
                'id', 'name', 'description', 'created_at', 'updated_at'
            ]
        ]);

        assertDatabaseHas('airlines', $request);
    });

    it('Bad request storing airline', function () {
        $request = ['name' => 123, 'description' => 'Test Test'];

        postJson('/api/airlines', $request)->assertUnprocessable();

        assertDatabaseEmpty('airlines');
    });

    it('Empty request storing airline', function () {
        $request = [];

        postJson('/api/airlines', $request)->assertUnprocessable()->assertJsonStructure([
            'error' => [
                'code',
                'message',
                'fields' => [
                    'name', 'description'
                ]
            ]
        ]);

        assertDatabaseEmpty('airlines');
    });
});
