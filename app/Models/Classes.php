<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    public function college(){
        return $this->belongsTo('App\Models\College','college_id','id');
    }

    public function level(){
        return $this->hasMany('App\Models\Levels','class_id','id');
    }
}
