<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChartItem extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [''];
    public function charthasuser()
    {
        # code...
        return $this->belongsTo('App\User','user_id');
    }
    public function charthasitem()
    {
        # code...
        return $this->belongsTo('App\Model\Item','item_id');
    }
    public function cartpayout(){
        return $this->belongsTo('App\Model\TrxLog','wait_payout');
    }
    public function shopofitem()
    {
        # code...
        return $this->belongsTo(ShopSeller::class,'shop_seller_id');
    }
}
