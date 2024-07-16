<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class PatrimonyType extends Model
{
    protected $fillable = [
        "product",
        "status",
        "deleted_at"
    ];

    public function Patrimony() {
        $this->belongsTo(Patrimony::class);
    }
}
