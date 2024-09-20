<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $movement_type
 * @property string|null $movement_type_desc
 * @property int|null $debitcreditindicator_id
 * @property int|null $reasonformovementcontrol_id
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Debitcreditindicator|null $debitcreditindicator
 * @property-read \App\Models\Reasonformovementcontrol|null $reasonformovementcontrol
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype query()
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereDebitcreditindicatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereMovementType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereMovementTypeDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereReasonformovementcontrolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereUpdatedBy($value)
 * @property int|null $is_reversal
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reasonformovement> $reasonformovements
 * @property-read int|null $reasonformovements_count
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereIsReversal($value)
 * @mixin \Eloquent
 */
class Movementtype extends Model
{
    use HasFactory;

    public function debitcreditindicator()
    {
        return $this->belongsTo(Debitcreditindicator::class);
    }

    public function reasonformovementcontrol()
    {
        return $this->belongsTo(Reasonformovementcontrol::class);
    }

    public function reasonformovements()
    {
        return $this->belongsToMany(Reasonformovement::class);
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
