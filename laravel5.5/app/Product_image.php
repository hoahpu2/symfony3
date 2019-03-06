<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
	protected $table = 'Product_images';

    protected $fillable = ['image','product_id'];

    public $timestamps = true;

    public function product(){
    	return $this->belongTo('App\Product');
    }

}
