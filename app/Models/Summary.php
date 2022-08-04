<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Summary extends Model
{
    protected $hidden=["user_id","id","created_at","updated_at"];
    use HasFactory;
    public function User()
    {
        return $this->belongsT0(User::class);
    }
}
