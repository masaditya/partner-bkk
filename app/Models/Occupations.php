<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupations extends Model
{
    protected $table = 'occupations';
    // atau tabel job
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id', 'title', 'description', 'deadline', 'location', 'company', 'publisher_id', 'thumbnail'
    ];

    
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'publisher_id');
    }

    
    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
    
}
