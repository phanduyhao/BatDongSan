<?php

namespace App\Models;

use App\Models\Baidang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';
    protected $table="users";
    protected $fillable = ['name', 'email', 'password', 'phone', 'avatar', 'role'];

    public function baidangs()
    {
        return $this->hasMany(Baidang::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
