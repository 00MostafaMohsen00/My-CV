<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Skill extends Model
{
    protected $hidden = [
        'id', 'user_id',"created_at","updated_at"
    ];

    protected $fillable=["name","user_id"];
    public function user(){
        return $this->belongsTo(User::class);
    }
}

