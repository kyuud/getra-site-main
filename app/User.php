<?php

    namespace App;

    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use App\Models\Painel\acl\Permission;
    use App\Models\Painel\acl\Role;
    use App\Notifications\ResetPassword;

    class User extends Authenticatable
    {
        use Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'name', 'email', 'password',
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token',
        ];

        /**
         * The attributes that should be cast to native types.
         *
         * @var array
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
        ];

        public function roles()
        {
            return $this->belongsToMany(Role::class)->where("role_user.deleted_at", '=', null);
            // return $this->belongsToMany(Role::class);
        }


        public function hasPermission(Permission $permission)
        {
           // return $this->hasAnyRoles($permission->where("deleted_at", '=', null)->roles);
        return $this->hasAnyRoles($permission->roles);
        }


        public function hasAnyRoles($roles)
        {
            if (is_array($roles) || is_object($roles)) {

                return !!$roles->intersect($this->roles)->count();

            }

            return $this->roles->contains('name', $roles);

        }

        public function sendPasswordResetNotification($token)
        {
            $this->notify(new ResetPassword($token));
        }
    }
