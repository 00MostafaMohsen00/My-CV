<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Skill;
use App\Models\Personal;
use App\Models\Language;
use App\Models\Contact;
use App\Models\Summary;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','id',"email_verified_at","created_at","updated_at"
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImageAttribute($value){
        return $value=asset("images\\").$value;
    }
    public function skills(){
        return $this->hasMany(Skill::class);
    }

    public function personals(){
        return $this->hasOne(Personal::class);
    }

    public function languages(){
        return $this->hasMany(Language::class);
    }

    public function contacts(){
        return $this->hasMany(Contact::class);
    }

    public function summary(){
        return $this->hasOne(Summary::class);
    }
}
