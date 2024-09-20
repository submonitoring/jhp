<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int|null $country_id
 * @property int|null $provinsi_id
 * @property int|null $kabupaten_id
 * @property int|null $kecamatan_id
 * @property int|null $kelurahan_id
 * @property string|null $kodepos
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\Kabupaten|null $kabupaten
 * @property-read \App\Models\Kecamatan|null $kecamatan
 * @property-read \App\Models\Kelurahan|null $kelurahan
 * @property-read \App\Models\Provinsi|null $provinsi
 * @method static \Illuminate\Database\Eloquent\Builder|Kodepos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kodepos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kodepos query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kodepos whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kodepos whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kodepos whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kodepos whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kodepos whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kodepos whereKabupatenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kodepos whereKecamatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kodepos whereKelurahanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kodepos whereKodepos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kodepos whereProvinsiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kodepos whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kodepos whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @mixin \Eloquent
 */
class Kodepos extends Model
{
    use HasFactory;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
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
