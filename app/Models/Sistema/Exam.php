<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
      "name",
      "status",
      "deleted_at"
    ];

    public function ListAttendance(){
        $this->belongsTo(ListAttendance::class);
    }
}
