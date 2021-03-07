<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrxLog extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [''];
    public function itempayout(){
        return $this->hasMany('App\Model\ChartItem','wait_payout');
    }
    public function shippingid()
    {
        # code...
        return $this->belongsTo('App\Model\ShippingList','shipping_list_id');
    }
    public function paymentmethod()
    {
        # code...
        return $this->belongsTo('App\Model\BankMarket','bank_market_id');
    }
    public function trxuser()
    {
        # code...
        return $this->belongsTo('App\User','user_id');
    }
    public function trxorder()
    {
        # code...
        return $this->hasMany(LogOrderSeller::class,'trx_log_id');
    }
}
