<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\PointScope;
class Point extends Model
{
    protected static function boot()				
    {
    	parent::boot();
    	static::addGlobalScope(PointScope())
    }
}
