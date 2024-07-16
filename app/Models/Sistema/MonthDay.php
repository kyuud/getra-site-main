<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class MonthDay extends Model
{
    protected $fillable = [
        "month",
        "day",
        "deleted_at"
    ];

    protected $table = 'month_day';

    public function monthyear(){
        return $this->belongsTo(YearMonth::class);
    }

}
