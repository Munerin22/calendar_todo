<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    //

	protected $fillable = ['title', 'main', 'delivery', 'share', 'user_id'];

	public function todo() {
			return $this->hasOne('App\User');
	}

}
