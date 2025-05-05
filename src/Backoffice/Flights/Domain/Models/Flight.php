<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

/**
 * @property int                          $id
 * @property int                          $airline_id
 * @property string                       $flight_number
 * @property int                          $departure_city_id
 * @property int                          $arrival_city_id
 * @property string                       $departure_date
 * @property string                       $arrival_date
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read Airline $airline
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereAirlineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereArrivalCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereArrivalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereDepartureCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereDepartureDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereFlightNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
final class Flight extends Model
{
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Airline, $this>
     */
    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }
}
