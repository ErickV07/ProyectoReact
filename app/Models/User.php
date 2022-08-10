<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Models\Roles;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','tipo_usuario','imagen', 'email', 'password', 'api_token'
    ];

    
   protected $hidden = [
       'contra', 'remember_token',
   ];


   protected $casts = [
       'email_verificado' => 'datetime',
   ];


   public function getPhotoAttribute()
   {
       return 'https://www.gravatar.com/avatar/' . md5(strtolower($this->email)) . '.jpg?s=200&d=mm';
   }

   public function roles()
   {
       return $this->belongsToMany(Roles::class);
   }


   public function assignRole(Roles $roles)
   {
       return $this->roles()->save($roles);
   }

   public function isSuperAdmin()
   {
       return $this->roles()->where('nombre', 'SuperAdmin')->exists();
   }

   public function isAdmin()
   {
       return $this->roles()->where('nombre', 'Admin')->exists();
   }

   public function isUser()
   {
       return $this->roles()->where('nombre', 'User')->exists();
   }

   public function isEmprendedor()
   {
       return $this->roles()->where('nombre', 'Emprendedor')->exists();
   }

}
