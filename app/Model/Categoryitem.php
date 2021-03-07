<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoryitem extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [''];
    public function categoryhasitem()
    {
        # code...
        return $this->hasMany('App\Model\Item','categoryitem_id');
    }
}
