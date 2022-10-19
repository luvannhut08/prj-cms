<?php

namespace App\Models\Api\Manager;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
class Manager extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable, HasApiTokens;

    protected $table = 'managers';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'gender',
        'address',
    ];

    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
