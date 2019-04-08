<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const ROLES = [
        'user' => '用户',
        'admin' => '管理员',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'avatar', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRoleAttribute($value)
    {
        return self::ROLES[$value] ?? '未知';
    }

    public function getAvatarAttribute($value)
    {

        return $value ?? 'default.png';
    }

    public function isAdmin()
    {
        return $this->role === '管理员';
    }

    public function freshToken()
    {
        $this->update(['api_token' => \Str::random(config('token.length')) . time()]);
        return $this->api_token;
    }
}
