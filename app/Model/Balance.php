<?php

namespace App\Model;

use App\User;
use App\Model\ShopSeller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Balance extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [''];
    public function userhasbalance()
    {
        # code...
        return $this->belongsTo(User::class, 'user_id');
    }
    public function shop()
    {
        # code...
        return $this->belongsTo('App\Model\ShopSeller', 'user_id');
    }
}
