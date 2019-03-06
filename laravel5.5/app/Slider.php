<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';

    protected $fillable = ['id','fullname','image','use_id','lever','statut'];

    public $timestamps = true;

    public function user(){
    	return $this->belongTo('App\User');
    }
}
