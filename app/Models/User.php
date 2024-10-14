<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'NIS',
        'graduation_year',
        'major_id',
        'status_id',
        'company',
        'company_industry_id',
        'position',
        'address',
        'phone',
        'latest_degree',
        'university',
        'faculty',
        'photo',
        'document',
        'gender',
        'is_alumni',
    ];

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

    public function applicant()
    {
        return $this->hasMany(Applicant::class);
    }

    
    public function employmentStatus()
    {
        return $this->belongsTo(EmploymentStatuses::class, 'status_id');
    }

    
    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }

    public function companyIndustry()
    {
        return $this->belongsTo(CompanyIndustry::class, 'company_industry_id');
    }
    
}
