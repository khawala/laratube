<?php

namespace Laratube;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
public $incrementing = false;
protected static function boot()
{
    parent::boot();
    static::creating(function ($model){
$model->{$model->getKeyName()} = (string) Str::uuid();//this will search for the primary key of table and change it to be more secure with anothe uniq long key key
    });
}
public function channel(){
    return $this->hasOne(Channel::class);
}
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
}
