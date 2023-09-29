<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="categories";
    protected $fillable=[
        "name",
        "slug",
        "description",
        "status",
        "popular",
        "image",
        "meta_title",
        "meta_keywords" ,
        "meta_descrip",
];
	/**
	 * @return mixed
	 */
	function getFillable() {
		return $this->fillable;
	}
	
	/**
	 * @param mixed $fillable 
	 * @return Category
	 */
	function setFillable($fillable): self {
		$this->fillable = $fillable;
		return $this;
	}
}
