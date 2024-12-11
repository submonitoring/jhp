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
 * @property string|null $bp_number
 * @property int|null $bpcategory_id
 * @property array|null $bprole_id
 * @property string|null $vat_number
 * @property int|null $title_id
 * @property string|null $name_1
 * @property string|null $name_2
 * @property string|null $name_3
 * @property string|null $name_4
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
 * @property int|null $country_id
 * @property int|null $provinsi_id
 * @property int|null $kabupaten_id
 * @property int|null $kecamatan_id
 * @property int|null $kelurahan_id
 * @property int|null $kodepos_id
 * @property \App\Models\Kodepos|null $kodepos
 * @property string|null $alamat
 * @property string|null $rt
 * @property string|null $rw
 * @property string|null $city
 * @property string|null $district
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
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \App\Models\Bpcategory|null $bpcategory
 * @property-read \App\Models\Bprole|null $bprole
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\Kabupaten|null $kabupaten
 * @property-read \App\Models\Kecamatan|null $kecamatan
 * @property-read \App\Models\Kelurahan|null $kelurahan
 * @property-read \App\Models\Numberrange|null $numberrange
 * @property-read \App\Models\Provinsi|null $provinsi
 * @property-read \App\Models\Title|null $title
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereBpNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereBpcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereBproleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereBuildingNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereFaxNumber1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereFaxNumber1Ext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereFaxNumber2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereFaxNumber2Ext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereFloor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereHandphoneNumber1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereHandphoneNumber2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereKabupatenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereKecamatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereKelurahanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereKodepos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereKodeposId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereName1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereName2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereName3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereName4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereNumberrangeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner wherePoBox($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereProvinsiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereRoom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereRt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereRw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereStreet2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereStreet3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereStreet4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereStreet5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereTelephoneNumber1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereTelephoneNumber1Ext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereTelephoneNumber2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereTelephoneNumber2Ext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereTitleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Businesspartner whereVatNumber($value)
 * @mixin \Eloquent
 */
class Businesspartner extends Model
{
    use HasFactory;

    protected $casts = [
        'bprole_id' => 'array',
    ];

    public function numberrange()
    {
        return $this->belongsTo(Numberrange::class);
    }

    public function bpcategory()
    {
        return $this->belongsTo(Bpcategory::class);
    }

    public function bprole()
    {
        return $this->belongsTo(Bprole::class);
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

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function batchmasters()
    {
        return $this->hasMany(Batchmaster::class);
    }

    public function materialdocumentheaders()
    {
        return $this->hasMany(Materialdocumentheader::class);
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
