<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable = [
    	'name','level'
    ];

    public function teacher(){
    	return $this->belognsTo(Teacher::class);
    }
}
