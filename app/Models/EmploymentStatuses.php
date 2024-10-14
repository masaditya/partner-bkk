<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentStatuses extends Model
{
    protected $table = 'employment_statuses';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id', 'name'
    ];

    
    public function user()
    {
        return $this->hasMany(User::class, 'status_id', 'id');
    }
}
