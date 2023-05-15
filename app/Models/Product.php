<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function variations()
	{
		return $this->hasMany(Variation::class);
	}

	public function image()
	{
		return $this->hasMany(ProductImage::class);
	}

	public function categories()
	{
		return $this->belongsToMany(Category::class);
	}
}
