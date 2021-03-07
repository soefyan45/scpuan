<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogBalance extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [''];
    public function balanceuser()
    {
        # code...
        return $this->belongsTo(Balance::class,'user_id');
    }
}
