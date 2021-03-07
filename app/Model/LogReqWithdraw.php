<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogReqWithdraw extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [''];
    public function users()
    {
        # code...
        return $this->belongsTo(User::class,'user_id');
    }
    public function hasbalances()
    {
        # code...
        return $this->belongsTo(Balance::class,'user_id');
    }
    public function hasshop()
    {
        # code...
        return $this->belongsTo(ShopSeller::class,'user_id');
    }
}
