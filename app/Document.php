<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
    	'file','type','teacher_id'
    ];

    public function teacher(){
    	return $this->belongsTo(Teacher::class);
    }

    public function Scopefiles($query, $type, $id){
    	if($id && $type){
    		return $query->where('type',$type)
    		->where('teacher_id',$id)->get();
    	}
    }
}
