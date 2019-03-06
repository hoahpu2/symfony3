<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{ 
    protected $table = 'Products';

    protected $fillable = ['name','alias','price','intro','content','image','keywords','description','cat_id','use_id'];

    public $timestamps = true;

    public function cates(){
    	return $this->belongTo('App\Cates');
    }

    public function user(){
    	return $this->belongTo('App\User');
    }

    public function product_image(){
        return $this->hasMany('App\Product_image');
    }
}
