<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class YearAttendance extends Model
{
    protected $fillable = [
        'year',
        'status',
        'deleted_at'
    ];

    public function MonthAttendance()
    {
        return $this->belongsToMany(MonthAttendance::class)
            ->where('monthAttendance.deleted_at', '=', 'null')
            ->where('year_month.deleted_at', '=', 'null');
    }
}
