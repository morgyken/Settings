<?php

namespace Ignite\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Ignite\Settings\Entities\Rooms
 *
 * @property int $id
 * @property int $facility_id
 * @property string $name
 * @property int|null $category_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Rooms whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Rooms whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Rooms whereFacilityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Rooms whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Rooms whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Ignite\Settings\Entities\Rooms whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Rooms extends Model
{
    protected $fillable = [];
    protected $table = 'settings_rooms';

    public function facility()
    {
        return $this->belongsTo(Clinics::class, 'facility_id');
    }
}
