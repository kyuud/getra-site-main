<?php

    namespace App\Models\Painel\acl;

    use Illuminate\Database\Eloquent\Model;

    class RoleUser extends Model
    {
        protected $fillable = [
            "role_id",
            "user_id",
            "deleted_at"
        ];

        protected $table = 'role_user';

        public function roles()
        {
            return $this->belongsToMany(Role::class, "$this->table", "id", "role_id")
                        ->where("role_user.deleted_at", '=', null);
        }

        public function roleDash()
        {
            return $this->belongsTo(Role::class, "role_id", "id");
        }
    }
