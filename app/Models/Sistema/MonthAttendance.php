<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MonthAttendance extends Model
{
    protected $fillable = [
        'month',
        'year_id',
        'status',
        'deleted_at'
    ];

    public function YearAttendance(): BelongsToMany
    {
        return $this->belongsToMany(YearAttendance::class)
            ->where('YearAttendances.deleted_at', '=', null)
            ->where('month_day.deleted_at', '=', null);
    }

}
