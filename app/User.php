<?php

namespace App;

use App\Model\Profile;
use App\Model\ShippingList;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

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
    public function userProfile()
    {
        return $this->hasOne(Profile::class);
    }
    public function usershop()
    {
        return $this->belongsTo('App\Model\ShopSeller','user_id');
    }
    public function usergetshop()
    {
        return $this->hasOne('App\Model\ShopSeller','user_id');
    }
    public function userhasprofile()
    {
        # code...
        return $this->hasOne(Profile::class);
    }
    public function userhasshipping()
    {
        # code...
        return $this->hasMany(ShippingList::class, 'user_id');
    }
}
