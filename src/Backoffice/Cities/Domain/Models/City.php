<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string $country
 * @property string $code
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Airline> $airlines
 * @property-read int|null $airlines_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Flight> $arrivingFlights
 * @property-read int|null $arriving_flights_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Flight> $departingFlights
 * @property-read int|null $departing_flights_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
