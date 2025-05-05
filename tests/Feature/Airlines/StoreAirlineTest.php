<?php

declare(Strict_types=1);

use Tests\RequestFactories\StoreAirlineRequestFactory;
use function Pest\Laravel\assertDatabaseEmpty;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\postJson;

describe('Testing store airline', function (): void {
    it('stores a new airline', function (): void {
        $request = StoreAirlineRequestFactory::new()->create();

        postJson('/api/airlines', $request)->assertCreated()->assertJsonStructure([
            'status',
            'success',
            'data' => [
                'id', 'name', 'description', 'created_at', 'updated_at',
            ],
        ]);

        assertDatabaseHas('airlines', $request);
    });

    it('Bad request storing airline', function (): void {
        $request = ['name' => 123, 'description' => 'Test Test'];

        postJson('/api/airlines', $request)->assertUnprocessable();

        assertDatabaseEmpty('airlines');
    });

    it('Empty request storing airline', function (): void {
        $request = [];

        postJson('/api/airlines', $request)->assertUnprocessable()->assertJsonStructure([
            'error' => [
                'code',
                'message',
                'fields' => [
                    'name', 'description',
                ],
            ],
        ]);

        assertDatabaseEmpty('airlines');
    });
});
