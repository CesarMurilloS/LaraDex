<?php

namespace LaraDex;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'avatar'];
    /**
     * Get the route for the model
     *
     * @return string
     */
    public function getRouteKeyName(){
        return 'slug';
    }

    public function works(){
        return $this->hasMany('LaraDex\Work');
    }

}
