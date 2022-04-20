<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Language extends Model
{
    protected $hidden = [
        'user_id' ,'id',"created_at","updated_at"
    ];
    protected $fillable=["name","description","user_id"];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
