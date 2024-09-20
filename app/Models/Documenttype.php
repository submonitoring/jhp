<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int|null $numberrange_id
 * @property int|null $documenttype_id
 * @property string|null $document_type
 * @property string|null $document_type_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Documenttype|null $documenttype
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Documenttype> $documenttypes
 * @property-read int|null $documenttypes_count
 * @property-read \App\Models\Numberrange|null $numberrange
 * @method static \Illuminate\Database\Eloquent\Builder|Documenttype newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Documenttype newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Documenttype query()
 * @method static \Illuminate\Database\Eloquent\Builder|Documenttype whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documenttype whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documenttype whereDocumentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documenttype whereDocumentTypeDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documenttype whereDocumenttypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documenttype whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documenttype whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documenttype whereNumberrangeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documenttype whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documenttype whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Documenttype extends Model
{
    use HasFactory;

    public function numberrange()
    {
        return $this->belongsTo(Numberrange::class);
    }

    public function documenttype()
    {
        return $this->belongsTo(Documenttype::class);
    }

    public function documenttypes()
    {
        return $this->hasMany(Documenttype::class);
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
