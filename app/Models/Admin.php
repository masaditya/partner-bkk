<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{

    use Notifiable;

    protected $table = 'admins';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id', 'name', 'phone', 'password', 'email', 'is_partner', 'company_name', 'company_industry_id', 'company_city', 'is_verified'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    }

    protected $casts = [
        'id' => 'string',
    ];

    
}
