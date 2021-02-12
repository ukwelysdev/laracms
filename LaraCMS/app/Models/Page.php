<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','url','content'
    ];

    public function user()
        {
            //one to one relationship
            return $this->belongsTo('App\Models\User');
        }


}
