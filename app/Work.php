<?php

namespace LaraDex;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = ['name', 'picture'];

    public function student(){
        return $this->belongsTo('LaraDex\Student');
    }
}
