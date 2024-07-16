<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class YearMonth extends Model
{
    protected $fillable = [
        "year",
        "month",
        "deleted_at"
    ];
    protected $table = 'year_month';
    public function listattendance(){
        return $this->belongsToMany(ListAttendance::class);
    }

}
