<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        "street",
        "number",
        "plus",
        "neighborhood",
        "cep",
        "city",
        "state",
        "phone",
        "mobile",
        "email",
        "whatsapp",
        "facebook",
        "twitter",
        "instagram",
        "youtube",
        "status",
        "deleted_at"
    ];
}
