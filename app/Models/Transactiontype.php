<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $transaction_type
 * @property string|null $transaction_type_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Transactiontype newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transactiontype newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transactiontype query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transactiontype whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transactiontype whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transactiontype whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transactiontype whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transactiontype whereTransactionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transactiontype whereTransactionTypeDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transactiontype whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transactiontype whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Transactiontype extends Model
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
