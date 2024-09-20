<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string|null $item_category_group
 * @property string|null $item_category_group_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Itemcategorygroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Itemcategorygroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Itemcategorygroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|Itemcategorygroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Itemcategorygroup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Itemcategorygroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Itemcategorygroup whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Itemcategorygroup whereItemCategoryGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Itemcategorygroup whereItemCategoryGroupDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Itemcategorygroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Itemcategorygroup whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Itemcategorygroup extends Model
{
    use HasFactory;

    public function materialmasters()
    {
        return $this->hasMany(Materialmaster::class);
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
