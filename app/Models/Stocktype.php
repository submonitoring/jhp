<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $stock_type
 * @property string|null $stock_type_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Stocktype newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stocktype newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stocktype query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stocktype whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stocktype whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stocktype whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stocktype whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stocktype whereStockType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stocktype whereStockTypeDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stocktype whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stocktype whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Stocktype extends Model
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
