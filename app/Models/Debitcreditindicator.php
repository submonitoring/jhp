<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $debit_credit_indicator
 * @property string|null $debit_credit_indicator_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Movementtype> $movementtypes
 * @property-read int|null $movementtypes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Debitcreditindicator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Debitcreditindicator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Debitcreditindicator query()
 * @method static \Illuminate\Database\Eloquent\Builder|Debitcreditindicator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debitcreditindicator whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debitcreditindicator whereDebitCreditIndicator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debitcreditindicator whereDebitCreditIndicatorDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debitcreditindicator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debitcreditindicator whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debitcreditindicator whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debitcreditindicator whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Debitcreditindicator extends Model
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
