<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string title
 * @property string description
 */
class Idea extends Model
{
    protected $fillable= ['title','description'];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
