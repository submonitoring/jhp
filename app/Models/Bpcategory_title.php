<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

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
 */
class Bpcategory_title extends Model
{
    use HasFactory;
    use LogsActivity;
    use HasLocks;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }

    protected $table = 'bpcategory_title';
}
