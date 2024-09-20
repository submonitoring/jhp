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
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Companycode> $companycodes
 * @property-read int|null $companycodes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Plant> $plants
 * @property-read int|null $plants_count
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereKodepos($value)
 */
	class Address extends \Eloquent {}
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
 * @mixin \Eloquent
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
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Companycode> $companycodes
 * @property-read int|null $companycodes_count
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
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialmaster> $materialmasters
 * @property-read int|null $materialmasters_count
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
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialmaster> $materialmasters
 * @property-read int|null $materialmasters_count
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
 * @mixin \Eloquent
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
 * @mixin \Eloquent
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
 * @mixin \Eloquent
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
 * @mixin \Eloquent
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
 * @mixin \Eloquent
 */
	class Loadinggroup extends \Eloquent {}
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
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialmaster> $materialmasters
 * @property-read int|null $materialmasters_count
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
 * @property-read \App\Models\Itemcategorygroup|null $genitemcategorygroup
 * @property-read \App\Models\Industrysector|null $industrysector
 * @property-read \App\Models\Materialgroup|null $materialgroup
 * @property-read \App\Models\Materialtype|null $materialtype
 * @property-read \App\Models\Numberrange|null $numberrange
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster query()
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereBaseUom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereDeletionFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereGrossWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereIndustrysectorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Materialmaster whereIsActive($value)
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
 */
	class Materialmaster extends \Eloquent {}
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
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialmaster> $materialmasters
 * @property-read int|null $materialmasters_count
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
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialmaster> $materialmasters
 * @property-read int|null $materialmasters_count
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
 * @mixin \Eloquent
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
 * @mixin \Eloquent
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
 * @mixin \Eloquent
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
 * @mixin \Eloquent
 */
	class Specialprocurementtype extends \Eloquent {}
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
 * @mixin \Eloquent
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
 */
	class Storagelocation extends \Eloquent {}
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
 * @mixin \Eloquent
 */
	class Temperaturecondition extends \Eloquent {}
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
 * @mixin \Eloquent
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
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialmaster> $materialmasters
 * @property-read int|null $materialmasters_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Materialmaster> $materialmasters2
 * @property-read int|null $materialmasters2_count
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

