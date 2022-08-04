<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Contact extends Model
{
    protected $hidden = [
        'user_id',"id","created_at","updated_at"
    ];
    protected $fillable=[
        "user_id","name","icon","link"
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
