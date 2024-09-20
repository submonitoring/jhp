<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $reason_for_movement
 * @property string|null $reason_for_movement_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Movementtype> $movementtypes
 * @property-read int|null $movementtypes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement whereReasonForMovement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement whereReasonForMovementDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Reasonformovement extends Model
{
    use HasFactory;

    public function movementtypes()
    {
        return $this->belongsToMany(Movementtype::class);
    }

    public static function boot()
    {
        parent::boot();
        $user = Auth::user();

        if ($user === null) {
            return;
        } else {

            static::creating(function ($model) {
                $user = Auth::user();
                $model->created_by = $user->username;
                $model->updated_by = $user->username;
            });
            static::updating(function ($model) {
                $user = Auth::user();
                $model->updated_by = $user->username;
            });
        }
    }
}
