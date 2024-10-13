<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{

    use Notifiable;
    protected $guard = 'admin';
    protected $table = 'admins';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id', 'name', 'phone', 'password', 'email', 'is_partner', 'company_name', 'company_industry_id', 'company_city', 'is_verified', 'is_show', 'logo'
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

    public function companyIndustry(): BelongsTo
    {
        return $this->belongsTo(CompanyIndustry::class, 'company_industry_id');
    }

    
    public function occupations(): HasMany
    {
        return $this->hasMany(Occupations::class, 'publisher_id', 'id');
    }
    
    
}
