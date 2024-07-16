<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        "title",
        "image",
        "link",
        "description",
        "status",
        "deleted_at"
    ];
}
