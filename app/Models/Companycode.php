<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 *
 *
 * @property int $id
 * @property string|null $company_code
 * @property string|null $company_code_name
 * @property string|null $vat_number
 * @property int|null $currency_id
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \App\Models\Currency|null $currency
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Plant> $plants
 * @property-read int|null $plants_count
 * @method static \Illuminate\Database\Eloquent\Builder|Companycode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Companycode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Companycode query()
 * @method static \Illuminate\Database\Eloquent\Builder|Companycode whereCompanyCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Companycode whereCompanyCodeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Companycode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Companycode whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Companycode whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Companycode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Companycode whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Companycode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Companycode whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Companycode whereVatNumber($value)
 * @mixin \Eloquent
 */
class Companycode extends Model
{
    use HasFactory;
    use LogsActivity;
    use HasLocks;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function plants()
    {
        return $this->hasMany(Plant::class);
    }

    public function salesorganizations()
    {
        return $this->hasMany(Salesorganization::class);
    }

    public function addresses()
    {
        return $this->morphToMany(Address::class, 'addressable');
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
