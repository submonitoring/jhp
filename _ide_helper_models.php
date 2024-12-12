<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Businesspartner> $businesspartners
 * @property-read int|null $businesspartners_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Companycode> $companycodes
 * @property-read int|null $companycodes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Plant> $plants
 * @property-read int|null $plants_count
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereKodepos($value)
 * @mixin \Eloquent
 * @property int|null $bpcategory_id
 * @property int|null $title_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Bpcategory|null $bpcategory
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 * @property-read \App\Models\Title|null $title
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereBpcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereTitleId($value)
 */
	class Address extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $batchsource_id
 * @property int|null $numberrange_id
 * @property string|null $batch_number
 * @property int|null $businesspartner_id
 * @property string|null $production_date
 * @property string|null $expiration_date
 * @property int|null $is_external
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Batchsource|null $batchsource
 * @property-read \App\Models\Businesspartner|null $businesspartner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialdocumentitem> $materialdocumentitems
 * @property-read int|null $materialdocumentitems_count
 * @property-read \App\Models\Numberrange|null $numberrange
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Batchmaster newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Batchmaster newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Batchmaster query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Batchmaster whereBatchNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Batchmaster whereBatchsourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Batchmaster whereBusinesspartnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Batchmaster whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Batchmaster whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Batchmaster whereExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Batchmaster whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Batchmaster whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Batchmaster whereIsExternal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Batchmaster whereNumberrangeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Batchmaster whereProductionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Batchmaster whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Batchmaster whereUpdatedBy($value)
 */
	class Batchmaster extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $batch_source
 * @property string|null $batch_source_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource query()
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource whereBatchSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource whereBatchSourceDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Batchsource whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property int|null $numberrange_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Batchmaster> $batchmasters
 * @property-read int|null $batchmasters_count
 * @property-read \App\Models\Numberrange|null $numberrange
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Batchsource whereNumberrangeId($value)
 */
	class Batchsource extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $bpcategory
 * @property string|null $bpcategory_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Businesspartner> $businesspartners
 * @property-read int|null $businesspartners_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Title> $titles
 * @property-read int|null $titles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory whereBpcategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory whereBpcategoryDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Bpcategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $bpcategory_id
 * @property int|null $title_id
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory_title newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory_title newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory_title query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory_title whereBpcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory_title whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bpcategory_title whereTitleId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Bpcategory_title extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $bprole
 * @property string|null $bprole_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Businesspartner> $businesspartners
 * @property-read int|null $businesspartners_count
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole whereBprole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole whereBproleDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bprole whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Bprole extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Batchmaster> $batchmasters
 * @property-read int|null $batchmasters_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialdocumentheader> $materialdocumentheaders
 * @property-read int|null $materialdocumentheaders_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Businesspartner extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Companycode extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $country_name
 * @property string|null $alpha_2
 * @property string|null $alpha_3
 * @property string|null $country_code
 * @property string|null $region
 * @property string|null $sub_region
 * @property string|null $intermediate_region
 * @property string|null $region_code
 * @property string|null $sub_region_code
 * @property string|null $intermediate_region_code
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kodepos> $allKodepos
 * @property-read int|null $all_kodepos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Provinsi> $provinsis
 * @property-read int|null $provinsis_count
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereAlpha2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereAlpha3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIntermediateRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIntermediateRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereSubRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereSubRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Businesspartner> $businesspartners
 * @property-read int|null $businesspartners_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Country extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $currency
 * @property string|null $symbol
 * @property string|null $currency_code
 * @property string|null $numeric
 * @property string|null $decimal
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCurrencyCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereDecimal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereNumeric($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Companycode> $companycodes
 * @property-read int|null $companycodes_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Currency extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $cycle_counting
 * @property string|null $cycle_counting_desc
 * @property string|null $number_per_year
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialplant> $materialplants
 * @property-read int|null $materialplants_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Plant> $plants
 * @property-read int|null $plants_count
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting whereCycleCounting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting whereCycleCountingDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting whereNumberPerYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cyclecounting whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Cyclecounting extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialdocumentitem> $materialdocumentitems
 * @property-read int|null $materialdocumentitems_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Debitcreditindicator extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialdocumentheader> $materialdocumentheaders
 * @property-read int|null $materialdocumentheaders_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Documenttype extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $industry_sector
 * @property string|null $industry_sector_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector query()
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector whereIndustrySector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector whereIndustrySectorDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Industrysector whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialmaster> $materialmasters
 * @property-read int|null $materialmasters_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Industrysector extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialmaster> $materialmasters
 * @property-read int|null $materialmasters_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Itemcategorygroup extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $kabupaten_code
 * @property string|null $kabupaten
 * @property int|null $provinsi_id
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kodepos> $allKodepos
 * @property-read int|null $all_kodepos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kecamatan> $kecamatans
 * @property-read int|null $kecamatans_count
 * @property-read \App\Models\Provinsi|null $provinsi
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten whereKabupaten($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten whereKabupatenCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten whereProvinsiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kabupaten whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Businesspartner> $businesspartners
 * @property-read int|null $businesspartners_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Kabupaten extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $kecamatan_code
 * @property string|null $kecamatan
 * @property int|null $kabupaten_id
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kodepos> $allKodepos
 * @property-read int|null $all_kodepos_count
 * @property-read \App\Models\Kabupaten|null $kabupaten
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kelurahan> $kelurahans
 * @property-read int|null $kelurahans_count
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereKabupatenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereKecamatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereKecamatanCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Businesspartner> $businesspartners
 * @property-read int|null $businesspartners_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Kecamatan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $kelurahan_code
 * @property string|null $kelurahan
 * @property int|null $kecamatan_id
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kodepos> $allKodepos
 * @property-read int|null $all_kodepos_count
 * @property-read \App\Models\Kecamatan|null $kecamatan
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereKecamatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereKelurahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereKelurahanCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Businesspartner> $businesspartners
 * @property-read int|null $businesspartners_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Kelurahan extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Businesspartner> $businesspartners
 * @property-read int|null $businesspartners_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Kodepos extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $loading_group
 * @property string|null $loading_group_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup whereLoadingGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup whereLoadingGroupDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Loadinggroup whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialplant> $materialplants
 * @property-read int|null $materialplants_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Loadinggroup extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $numberrange_id
 * @property string|null $document_number
 * @property string|null $material_document_year
 * @property int|null $status_id
 * @property int|null $transactiontype_id
 * @property int|null $documenttype_id
 * @property int|null $businesspartner_id
 * @property string|null $document_date
 * @property string|null $posting_date
 * @property int|null $transactionreference_id
 * @property string|null $reference_document_number
 * @property \App\Models\Status|null $status
 * @property string|null $matdoc_header_text
 * @property int|null $is_external
 * @property \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialdocumentitem> $materialdocumentitems
 * @property int|null $is_active
 * @property int|null $executed
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Businesspartner|null $businesspartner
 * @property-read \App\Models\Documenttype|null $documenttype
 * @property-read int|null $materialdocumentitems_count
 * @property-read \App\Models\Numberrange|null $numberrange
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 * @property-read \App\Models\Transactionreference|null $transactionreference
 * @property-read \App\Models\Transactiontype|null $transactiontype
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereBusinesspartnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereDocumentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereDocumentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereDocumenttypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereExecuted($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereIsExternal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereMatdocHeaderText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereMaterialDocumentYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereMaterialdocumentitems($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereNumberrangeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader wherePostingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereReferenceDocumentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereTransactionreferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereTransactiontypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentheader whereUpdatedBy($value)
 */
	class Materialdocumentheader extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $sort
 * @property int|null $materialdocumentheader_id
 * @property int|null $movementtype_id
 * @property int|null $materialmaster_id
 * @property int|null $plant_id
 * @property int|null $storagelocation_id
 * @property int|null $stocktype_id
 * @property int|null $debitcreditindicator_id
 * @property int|null $batchmaster_id
 * @property int|null $quantity
 * @property int|null $uom_id
 * @property int|null $reasonformovement_id
 * @property string|null $matdoc_item_text
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Batchmaster|null $batchmaster
 * @property-read \App\Models\Debitcreditindicator|null $debitcreditindicator
 * @property-read \App\Models\Materialdocumentheader|null $materialdocumentheader
 * @property-read \App\Models\Materialmaster|null $materialmaster
 * @property-read \App\Models\Movementtype|null $movementtype
 * @property-read \App\Models\Plant|null $plant
 * @property-read \App\Models\Reasonformovement|null $reasonformovement
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 * @property-read \App\Models\Stocktype|null $stocktype
 * @property-read \App\Models\Storagelocation|null $storagelocation
 * @property-read \App\Models\Uom|null $uom
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem whereBatchmasterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem whereDebitcreditindicatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem whereMatdocItemText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem whereMaterialdocumentheaderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem whereMaterialmasterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem whereMovementtypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem wherePlantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem whereReasonformovementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem whereStocktypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem whereStoragelocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem whereUomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Materialdocumentitem whereUpdatedBy($value)
 */
	class Materialdocumentitem extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $material_group
 * @property string|null $material_group_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup whereMaterialGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup whereMaterialGroupDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialgroup whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialmaster> $materialmasters
 * @property-read int|null $materialmasters_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Materialgroup extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $numberrange_id
 * @property string|null $material_number
 * @property string|null $material_desc
 * @property string|null $old_material_number
 * @property int|null $materialtype_id
 * @property array|null $class
 * @property int|null $industrysector_id
 * @property int|null $materialgroup_id
 * @property int|null $itemcategorygroup_id
 * @property \App\Models\Uom|null $base_uom
 * @property \App\Models\Uom|null $weight_unit
 * @property string|null $gross_weight
 * @property string|null $net_weight
 * @property int|null $deletion_flag
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $is_external
 * @property-read \App\Models\Itemcategorygroup|null $genitemcategorygroup
 * @property-read \App\Models\Industrysector|null $industrysector
 * @property-read \App\Models\Materialgroup|null $materialgroup
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialplant> $materialplant
 * @property-read int|null $materialplant_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialplant> $materialplants
 * @property-read int|null $materialplants_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialstoragelocation> $materialstoragelocation
 * @property-read int|null $materialstoragelocation_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialstoragelocation> $materialstoragelocations
 * @property-read int|null $materialstoragelocations_count
 * @property-read \App\Models\Materialtype|null $materialtype
 * @property-read \App\Models\Numberrange|null $numberrange
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster query()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereBaseUom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereDeletionFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereGrossWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereIndustrysectorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereIsExternal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereItemcategorygroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereMaterialDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereMaterialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereMaterialgroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereMaterialtypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereNetWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereNumberrangeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereOldMaterialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereWeightUnit($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialdocumentitem> $materialdocumentitems
 * @property-read int|null $materialdocumentitems_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Materialmaster extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $materialmaster_id
 * @property int|null $plant_id
 * @property int|null $loadinggroup_id
 * @property int|null $transportationgroup_id
 * @property int|null $periodindicator_id
 * @property int|null $procurementtype_id
 * @property int|null $specialprocurementtype_id
 * @property string|null $safety_stock
 * @property string|null $minimal_safety_stock
 * @property string|null $slug
 * @property int|null $is_batch
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cyclecounting|null $cyclecounting
 * @property-read \App\Models\Loadinggroup|null $loadinggroup
 * @property-read \App\Models\Materialmaster|null $materialmaster
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialmaster> $materialmasters
 * @property-read int|null $materialmasters_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialstoragelocation> $materialstoragelocations
 * @property-read int|null $materialstoragelocations_count
 * @property-read \App\Models\Periodindicator|null $periodindicator
 * @property-read \App\Models\Plant|null $plant
 * @property-read \App\Models\Procurementtype|null $procurementtype
 * @property-read \App\Models\Specialprocurementtype|null $specialprocurementtype
 * @property-read \App\Models\Transportationgroup|null $transportationgroup
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereIsBatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereLoadinggroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereMaterialmasterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereMinimalSafetyStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant wherePeriodindicatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant wherePlantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereProcurementtypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereSafetyStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereSpecialprocurementtypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereTransportationgroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialplant whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Materialplant extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $materialmaster_id
 * @property int|null $plant_id
 * @property int|null $storagelocation_id
 * @property int|null $storagecondition_id
 * @property int|null $temperaturecondition_id
 * @property string|null $slug
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Materialmaster|null $materialmaster
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialplant> $materialplants
 * @property-read int|null $materialplants_count
 * @property-read \App\Models\Plant|null $plant
 * @property-read \App\Models\Storagecondition|null $storagecondition
 * @property-read \App\Models\Storagelocation|null $storagelocation
 * @property-read \App\Models\Temperaturecondition|null $temperaturecondition
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereMaterialmasterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation wherePlantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereStorageconditionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereStoragelocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereTemperatureconditionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialstoragelocation whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Materialstoragelocation extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $material_type
 * @property string|null $material_type_desc
 * @property int|null $numberrange_id
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Numberrange|null $numberrange
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype query()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype whereMaterialType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype whereMaterialTypeDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype whereNumberrangeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialtype whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialmaster> $materialmasters
 * @property-read int|null $materialmasters_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Materialtype extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $team_id
 * @property int $user_id
 * @property string|null $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership query()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUserId($value)
 * @mixin \Eloquent
 */
	class Membership extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $movement_type
 * @property string|null $movement_type_desc
 * @property int|null $debitcreditindicator_id
 * @property int|null $reasonformovementcontrol_id
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Debitcreditindicator|null $debitcreditindicator
 * @property-read \App\Models\Reasonformovementcontrol|null $reasonformovementcontrol
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype query()
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereDebitcreditindicatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereMovementType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereMovementTypeDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereReasonformovementcontrolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereUpdatedBy($value)
 * @property int|null $is_reversal
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reasonformovement> $reasonformovements
 * @property-read int|null $reasonformovements_count
 * @method static \Illuminate\Database\Eloquent\Builder|Movementtype whereIsReversal($value)
 * @mixin \Eloquent
 * @property int|null $stocktype_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialdocumentitem> $materialdocumentitems
 * @property-read int|null $materialdocumentitems_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 * @property-read \App\Models\Stocktype|null $stocktype
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Movementtype whereStocktypeId($value)
 */
	class Movementtype extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $nrobject
 * @property string|null $nrobject_name
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Numberrange> $numberranges
 * @property-read int|null $numberranges_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject query()
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject whereNrobject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject whereNrobjectName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nrobject whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Nrobject extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $nrobject_id
 * @property string|null $nr_interval
 * @property string|null $con
 * @property string|null $year
 * @property string|null $number
 * @property string|null $current_number
 * @property int|null $is_external
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Nrobject|null $nrobject
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange query()
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereCon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereCurrentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereIsExternal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereNrInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereNrobjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Numberrange whereYear($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialtype> $materialtypes
 * @property-read int|null $materialtypes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Documenttype> $documenttypes
 * @property-read int|null $documenttypes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Businesspartner> $businesspartners
 * @property-read int|null $businesspartners_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialmaster> $materialmasters
 * @property-read int|null $materialmasters_count
 * @mixin \Eloquent
 * @property string|null $nr_name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Batchmaster> $batchmasters
 * @property-read int|null $batchmasters_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Batchsource> $batchsources
 * @property-read int|null $batchsources_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialdocumentheader> $materialdocumentheaders
 * @property-read int|null $materialdocumentheaders_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Numberrange whereNrName($value)
 */
	class Numberrange extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $period_indicator
 * @property string|null $period_indicator_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator query()
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator wherePeriodIndicator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator wherePeriodIndicatorDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodindicator whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialplant> $materialplants
 * @property-read int|null $materialplants_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Periodindicator extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $plant
 * @property string|null $plant_name
 * @property int|null $companycode_id
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \App\Models\Companycode|null $companycode
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cyclecounting> $cyclecountings
 * @property-read int|null $cyclecountings_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialplant> $materialplants
 * @property-read int|null $materialplants_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialstoragelocation> $materialstoragelocations
 * @property-read int|null $materialstoragelocations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Storagelocation> $storagelocations
 * @property-read int|null $storagelocations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Plant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereCompanycodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant wherePlant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant wherePlantName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plant whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialdocumentitem> $materialdocumentitems
 * @property-read int|null $materialdocumentitems_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Plant extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $procurement_type
 * @property string|null $procurement_type_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype query()
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype whereProcurementType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype whereProcurementTypeDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Procurementtype whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialplant> $materialplants
 * @property-read int|null $materialplants_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Procurementtype extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $provinsi_code
 * @property string|null $provinsi
 * @property int|null $country_id
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kodepos> $allKodepos
 * @property-read int|null $all_kodepos_count
 * @property-read \App\Models\Country|null $country
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kabupaten> $kabupatens
 * @property-read int|null $kabupatens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi whereProvinsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi whereProvinsiCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Businesspartner> $businesspartners
 * @property-read int|null $businesspartners_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Provinsi extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $reason_for_movement
 * @property string|null $reason_for_movement_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Movementtype> $movementtypes
 * @property-read int|null $movementtypes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement whereReasonForMovement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement whereReasonForMovementDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovement whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialdocumentitem> $materialdocumentitems
 * @property-read int|null $materialdocumentitems_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Reasonformovement extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $reason_for_movement_control
 * @property string|null $reason_for_movement_control_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Movementtype> $movementtypes
 * @property-read int|null $movementtypes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol whereReasonForMovementControl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol whereReasonForMovementControlDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reasonformovementcontrol whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Reasonformovementcontrol extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $special_procurement_type
 * @property string|null $special_procurement_type_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype query()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype whereSpecialProcurementType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype whereSpecialProcurementTypeDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialprocurementtype whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialplant> $materialplants
 * @property-read int|null $materialplants_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Specialprocurementtype extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $status
 * @property string|null $status_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialdocumentheader> $materialdocumentheaders
 * @property-read int|null $materialdocumentheaders_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status whereStatusDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status whereUpdatedBy($value)
 */
	class Status extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialdocumentitem> $materialdocumentitems
 * @property-read int|null $materialdocumentitems_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Movementtype> $movementtypes
 * @property-read int|null $movementtypes_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Stocktype extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $storage_condition
 * @property string|null $storage_condition_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition query()
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition whereStorageCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition whereStorageConditionDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagecondition whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialstoragelocation> $materialstoragelocations
 * @property-read int|null $materialstoragelocations_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Storagecondition extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $storage_location
 * @property string|null $storage_location_name
 * @property int|null $plant_id
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialstoragelocation> $materialstoragelocations
 * @property-read int|null $materialstoragelocations_count
 * @property-read \App\Models\Plant|null $plant
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation wherePlantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation whereStorageLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation whereStorageLocationName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Storagelocation whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialdocumentitem> $materialdocumentitems
 * @property-read int|null $materialdocumentitems_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Storagelocation extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $1
 * @property string|null $2
 * @property string|null $3
 * @property string|null $4
 * @property string|null $5
 * @property string|null $6
 * @property string|null $7
 * @property string|null $8
 * @property string|null $9
 * @property string|null $link
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject where1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject where2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject where3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject where4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject where5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject where6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject where7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject where8($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject where9($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysobject whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Sysobject extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property bool $personal_team
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TeamInvitation> $teamInvitations
 * @property-read int|null $team_invitations_count
 * @property-read \App\Models\Membership $membership
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\TeamFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team wherePersonalTeam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUserId($value)
 * @mixin \Eloquent
 */
	class Team extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $team_id
 * @property string $email
 * @property string|null $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Team $team
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation query()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class TeamInvitation extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $temperature_condition
 * @property string|null $temperature_condition_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition query()
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition whereTemperatureCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition whereTemperatureConditionDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temperaturecondition whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialstoragelocation> $materialstoragelocations
 * @property-read int|null $materialstoragelocations_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Temperaturecondition extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $title_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Bpcategory> $bpcategories
 * @property-read int|null $bpcategories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Businesspartner> $businesspartners
 * @property-read int|null $businesspartners_count
 * @method static \Illuminate\Database\Eloquent\Builder|Title newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Title newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Title query()
 * @method static \Illuminate\Database\Eloquent\Builder|Title whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Title whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Title whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Title whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Title whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Title whereTitleDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Title whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Title whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Title extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialdocumentheader> $materialdocumentheaders
 * @property-read int|null $materialdocumentheaders_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Transactionreference extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialdocumentheader> $materialdocumentheaders
 * @property-read int|null $materialdocumentheaders_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Transactiontype extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $transportation_group
 * @property string|null $transportation_group_desc
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Transportationgroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transportationgroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transportationgroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transportationgroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transportationgroup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transportationgroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transportationgroup whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transportationgroup whereTransportationGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transportationgroup whereTransportationGroupDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transportationgroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transportationgroup whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialplant> $materialplants
 * @property-read int|null $materialplants_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Transportationgroup extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $uom
 * @property string|null $uom_name
 * @property string|null $iso_uom
 * @property int|null $is_active
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Uom newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Uom newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Uom query()
 * @method static \Illuminate\Database\Eloquent\Builder|Uom whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uom whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uom whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uom whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uom whereIsoUom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uom whereUom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uom whereUomName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uom whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uom whereUpdatedBy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialmaster> $materialmasters
 * @property-read int|null $materialmasters_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialmaster> $materialmasters2
 * @property-read int|null $materialmasters2_count
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialdocumentitem> $materialdocumentitems
 * @property-read int|null $materialdocumentitems_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 */
	class Uom extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $panel
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Team|null $currentTeam
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Team> $ownedTeams
 * @property-read int|null $owned_teams_count
 * @property-read string $profile_photo_url
 * @property-read \App\Models\Membership $membership
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Team> $teams
 * @property-read int|null $teams_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePanel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property int|null $is_active
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \Kenepa\ResourceLock\Models\ResourceLock|null $resourceLock
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent implements \Filament\Models\Contracts\FilamentUser {}
}

