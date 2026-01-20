<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserCDAG extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users_cdag';

    protected $fillable = [
        'name',
        'username',
        'role',
        'active',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'active' => 'boolean',
        ];
    }

    public function posts(): HasMany
    {
        return $this->hasMany(PostCDAG::class, 'user_id');
    }
}