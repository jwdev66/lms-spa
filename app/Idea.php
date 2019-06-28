<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
<<<<<<< Updated upstream
    //
=======
    protected $fillable= ['title','description','user_id'];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
>>>>>>> Stashed changes
}
