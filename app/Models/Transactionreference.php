<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $transaction_reference
 * @property string|null $transaction_reference_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Transactionreference newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transactionreference newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transactionreference query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transactionreference whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transactionreference whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transactionreference whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transactionreference whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transactionreference whereTransactionReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transactionreference whereTransactionReferenceDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transactionreference whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transactionreference whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Transactionreference extends Model
{
    use HasFactory;

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
