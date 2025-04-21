<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

final class City extends Model
{
    protected $guarded = ['id'];

    /**
     * @return BelongsToMany<Airline, $this>
     */
    public function airlines()
    {
        return $this->belongsToMany(
            Airline::class
        );
    }

    /**
     * @return HasMany<Flight, $this>
     */
    public function arrivingFlights()
    {
        return $this->hasMany(Flight::class, 'arrival_city_id');
    }

    /**
     * @return HasMany<Flight, $this>
     */
    public function departingFlights()
    {
        return $this->hasMany(Flight::class, 'departure_city_id');
    }
}
