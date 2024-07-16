<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class MonthYear extends Model
{
    protected $fillable = [
        "year_id",
        "month_id",
        "deleted_at"
    ];

    protected $table = 'year_month';


}
