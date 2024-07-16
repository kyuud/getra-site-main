<?php

    namespace App\Models\Painel;

    use Illuminate\Database\Eloquent\Model;

    class Profile extends Model
    {
        protected $fillable = [
            "image",
            "password",
            "deleted_at"
        ];

        protected $table = "users";

    }
