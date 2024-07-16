<?php

    namespace App\Models\Painel\acl;

    use Illuminate\Database\Eloquent\Model;

    class PermissionRole extends Model
    {
        protected $fillable = [
            "permission_id",
            "role_id",
            "deleted_at"
        ];

        protected $table = 'permission_role';

    }
