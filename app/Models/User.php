<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function hasRole(string $roleName){
        $roles = $this->roles;
        foreach ($roles as $role){
            if (strcasecmp($role->name, $roleName) === 0) return true;
        }
        return false;
    }

    public function isAdmin(){
        $roles = $this->roles;
        foreach ($roles as $role){
            if (strcasecmp($role->name, 'admin') === 0) return true;
        }
        return false;
    }


    public function baskets()
    {
        return $this->hasMany(Basket::class);
    }

}
