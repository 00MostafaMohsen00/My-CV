<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Personal extends Model
{
    protected $hidden = [
        'user_id','id',"created_at","updated_at"
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
