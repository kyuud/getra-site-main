<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class DayAttendance extends Model
{
    protected $fillable = [
        'day',
        'status',
        'deleted_at'
    ];

    protected $table = 'day_attendances';

    public function monthAttendances(){
        return $this->belongsToMany(MonthAttendance::class);
    }

    public function hasYears(YearAttendance $yearAttendance){
        return $this->hasAnyMonths($yearAttendance->monthAttendances);
    }

    public function year(){
        return $this->belongsTo(YearAttendance::class, 'year_id') ->where('year_attendances.deleted_at', null);
    }


}
