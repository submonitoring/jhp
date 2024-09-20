<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $reason_for_movement_control
 * @property string|null $reason_for_movement_control_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Movementtype> $movementtypes
 * @property-read int|null $movementtypes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol whereReasonForMovementControl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol whereReasonForMovementControlDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Reasonformovementcontrol extends Model
{
    use HasFactory;

    public function movementtypes()
    {
        return $this->hasMany(Movementtype::class);
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
