<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class);
    }
}
