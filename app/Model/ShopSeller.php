<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
class ShopSeller extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [''];
    public function Account()
    {
        # code...
        return $this->belongsTo('App\User','user_id');
    }
    public function hasitem()
    {
        # code...
        return $this->hasMany(Item::class,'user_id');
    }
    public function hasbalance()
    {
        # code...
        return $this->belongsTo(Balance::class,'user_id');
    }
    public function haslogseller()
    {
        # code...
        return $this->hasMany(LogOrderSeller::class,'shop_seller_id');
    }
    public function haslogbalance()
    {
        # code...
        return $this->hasMany(LogBalance::class,'user_id');
    }

}
