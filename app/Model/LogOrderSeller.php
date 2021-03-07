<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogOrderSeller extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [''];
    public function logorderhasitem()
    {
        # code...
        //return $this->hasMany(Item::class,'id','item_id');
        return $this->belongsTo('App\Model\Item','item_id');
    }
    public function trx()
    {
        # code...
        return $this->belongsTo('App\Model\TrxLog','trx_log_id');
    }
    public function orderby()
    {
        # code...
        return $this->belongsTo('App\User','user_id');
    }
}
