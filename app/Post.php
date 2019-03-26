<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	use Searchable;

	// public function searchableAs()
	// {
	// 	return 'posts_index';
	// }

	// public function toSearchableArray()
	// {
	// 	return [
	// 		'title', 'content'
	// 	];
	// }

    protected $fillable = [
      'title', 'content', 'published'
  	];

  	public function user()
  	{
  		return $this->belongsTo('App\User');
  	}
}
