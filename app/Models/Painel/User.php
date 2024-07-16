<?php

    namespace App\Models\Painel;

    use App\Models\Painel\acl\Permission;
    use App\Models\Painel\acl\Role;
    use Illuminate\Database\Eloquent\Model;

    class User extends Model
    {
        protected $fillable = [
            "image",
            "name",
            "email",
            "password",
            "status",
            "deleted_at"
        ];

        public function roles()
        {
            return $this->belongsToMany(Role::class);
        }


        public function hasPermission(Permission $permission)
        {
            return $this->hasAnyRoles($permission->roles);
        }


        public function hasAnyRoles($roles)
        {
            if (is_array($roles) || is_object($roles)) {

                return !!$roles->intersect($this->roles)->count();

            }

            return $this->roles->contains('name', $roles);

        }
    }
