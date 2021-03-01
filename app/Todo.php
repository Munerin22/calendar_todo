<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    //

	protected $fillable = ['title', 'main', 'delivery', 'share', 'user_id', 'section_id'];

	public function user() {
			return $this->belongsTo('App\User');
	}

	public function section() {
			return $this->belongsTo('App\Section', 'section_id');
	}

	use SoftDeletes;
	protected $dates = ['deleted_at'];

}
