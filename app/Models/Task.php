<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	    'time', 
	    'title', 
	    'status', 
	    'period', 
	    'time_period',
	    'description', 
	    'callback_url',
	    'service_response'
	];
}
