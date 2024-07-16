<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        "image",
        "title",
        "highlights",
        "abstract",
        "description",
        "status",
        "deleted_at"
    ];
}
