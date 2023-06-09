<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    public function stocks() 
	{
		return $this->hasMany(Stock::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
