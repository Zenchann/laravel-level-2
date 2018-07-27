<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title','author_id','cover','amount'];
    
    public function author()
    {
        return $this->belongsTo('App\Author', 'author_id');
    }
}
