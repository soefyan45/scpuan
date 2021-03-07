<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Itemhascolor extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [''];
    public function getitemcolor()
    {
        # code...
        return $this->belongsTo('App\Model\Itemcolor','itemcolor_id');
    }
}
