<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Itemhasimage;
use App\User;
use App\Model\ShopSeller;
use App\Model\Categoryitem;
use App\Model\itemtype;

class Item extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [''];
    public function itemcategories()
    {
        # code...
        return $this->belongsTo('App\Model\Categoryitem', 'categoryitem_id');
    }
    public function itemtypes()
    {
        # code...
        return $this->belongsTo('App\Model\Itemtype', 'itemtype_id');
    }
    public function itemhascolor()
    {
        # code...
        return $this->hasMany('App\Model\Itemhascolor');
    }

    public function itemColor()
    {
        # code...
        return $this->hasMany(Itemcolor::class);
    }
    public function itemhasimages()
    {
        # code...
        return $this->hasMany(Itemhasimage::class);
    }
    public function itemuser()
    {
        # code...
        //return $this->belongsTo(User::class, 'user_id');
        return $this->belongsTo('App\User', 'user_id');
    }
    public function shopofitem()
    {
        # code...
        // return $this->belongsTo(ShopSeller::class, 'user_id');
        //return $this->belongsTo('App\Model\Categoryitem', 'categoryitem_id');
        // return $this->belongsTo('App\Model\ShopSeller','user_id');
        return $this->belongsTo('App\Model\ShopSeller','shop_seller_id');
        //return "user_id";
    }
    
}
