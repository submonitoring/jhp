<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChartofaccountCompanycode extends Model
{
    public function companycode()
    {
        return $this->belongsTo(Companycode::class);
    }

    public function chartofaccount()
    {
        return $this->belongsTo(Chartofaccount::class);
    }
}
