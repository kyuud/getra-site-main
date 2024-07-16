<?php

    namespace App\Models\Painel\acl;

    use Illuminate\Database\Eloquent\Model;

    class Role extends Model
    {
        protected $fillable = [
            "name",
            "label",
            "deleted_at"
        ];

        public function permissions()
        {
            /*return $this->belongsToMany(Permission::class);*/
            return $this->belongsToMany(Permission::class)
                ->where("permissions.deleted_at", '=', null)
                ->where("role_user.deleted_at", '=', null);
        }

    }
