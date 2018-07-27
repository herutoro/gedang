<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//class ModelProduct extends Model
class ModelProduct extends Model
{
    //
    protected $table = 'product';


	public function categories()
	{
    	return $this->belongsTo(ModelCategories::class);
	}
}