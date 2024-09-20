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
 * @property string|null $address_number
 * @property int|null $country_id
 * @property int|null $provinsi_id
 * @property int|null $kabupaten_id
 * @property int|null $kecamatan_id
 * @property int|null $kelurahan_id
 * @property int|null $kodepos_id
 * @property string|null $alamat
 * @property string|null $rt
 * @property string|null $rw
 * @property string|null $name_1
 * @property string|null $name_2
 * @property string|null $name_3
 * @property string|null $name_4
 * @property string|null $city
 * @property string|null $district
 * @property \App\Models\Country|null $country
 * @property string|null $postal_code
 * @property string|null $region
 * @property string|null $po_box
 * @property string|null $street
 * @property string|null $street_2
 * @property string|null $street_3
 * @property string|null $street_4
 * @property string|null $street_5
 * @property string|null $building_number
 * @property string|null $floor
 * @property string|null $room
 * @property string|null $telephone_number_1
 * @property string|null $telephone_number_1_ext
 * @property string|null $telephone_number_2
 * @property string|null $telephone_number_2_ext
 * @property string|null $fax_number_1
 * @property string|null $fax_number_1_ext
 * @property string|null $fax_number_2
 * @property string|null $fax_number_2_ext
 * @property string|null $handphone_number_1
 * @property string|null $handphone_number_2
 * @property string|null $email
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kabupaten|null $kabupaten
 * @property-read \App\Models\Kecamatan|null $kecamatan
 * @property-read \App\Models\Kelurahan|null $kelurahan
 * @property-read \App\Models\Kodepos|null $kodepos
 * @property-read \App\Models\Numberrange|null $numberrange
 * @property-read \App\Models\Provinsi|null $provinsi
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddressNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereBuildingNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereFaxNumber1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereFaxNumber1Ext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereFaxNumber2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereFaxNumber2Ext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereFloor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereHandphoneNumber1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereHandphoneNumber2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereKabupatenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereKecamatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereKelurahanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereKodeposId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereName1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereName2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereName3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereName4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereNumberrangeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePoBox($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereProvinsiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereRoom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereRt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereRw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreet2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreet3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreet4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreet5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereTelephoneNumber1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereTelephoneNumber1Ext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereTelephoneNumber2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereTelephoneNumber2Ext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
    use HasFactory;

    public function numberrange()
    {
        return $this->belongsTo(Numberrange::class);
    }

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

    public function kodepos()
    {
        return $this->belongsTo(Kodepos::class);
    }

    public function companycodes()
    {
        return $this->morphedByMany(Companycode::class, 'addressable');
    }

    public function plants()
    {
        return $this->morphedByMany(Plant::class, 'addressable');
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
