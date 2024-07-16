<?php

    namespace App\Models\Painel\acl;

    use Illuminate\Database\Eloquent\Model;

    class Permission extends Model
    {

        protected $fillable = [
            "name",
            "label",
            "deleted_at"
        ];


        public function roles()
        {
            return $this->belongsToMany(Role::class)
                ->where("roles.deleted_at", '=', null)
                ->where("permission_role.deleted_at", '=', null);
        }
    }
