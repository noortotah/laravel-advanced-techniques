<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    public $appends = ['users_count'];

    public function getUsersCountAttribute() //before Retrieving
    {
    	return \DB::table('users')
    					->where('users.team_id', $this->id)
    					->sum('users.id');
    }

    public function setTitleAttribute($value) //Before entering database
    {
    	$this->attributes['title'] = ucwords($value);
    }
}
