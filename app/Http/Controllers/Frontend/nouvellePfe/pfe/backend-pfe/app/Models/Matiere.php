<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;
    protected $table="matieres";
    protected $fillable=[
		"userId",
        "Name",
        "description",
];
	/**
	 * @return mixed
	 */
	function getFillable() {
		return $this->fillable;
	}
	
	/**
	 * @param mixed $fillable 
	 * @return Matiere
	 */
	function setFillable($fillable): self {
		$this->fillable = $fillable;
		return $this;
	}
}
