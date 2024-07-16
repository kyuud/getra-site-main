<?php

    namespace App\Models\Painel;

    use App\Models\Painel\acl\RoleUser;
    use Illuminate\Database\Eloquent\Model;

    class Log extends Model
    {
        protected $fillable = [
            "user_id",
            "ip",
            "status",
            "deleted_at"
        ];

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function roleUser()
        {
            return $this->belongsTo(RoleUser::class, 'user_id', 'user_id');
        }

    }
