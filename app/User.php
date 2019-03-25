<?php

namespace App;

use App\Observers\UserObserver;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    protected static function boot()        
    {
       parent::boot();
       // static::creating(function($model)
       // {
       //     $model->team_id = \DB::table('teams')->inRandomOrder()->first()->id;
       // });
       User::observe(UserObserver::class);
    }

    public function accounts()
    {
        return $this->hasMany('App\SocialAccount');
    }
}
