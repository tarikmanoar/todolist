<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
