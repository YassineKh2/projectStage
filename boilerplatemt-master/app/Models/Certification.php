<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;
    protected $fillable = [
        'resume_id',
        'name_certification',
        'certification_company_name',
        'date_certification',
        'expiration_date',
        'level'
    ];

    public function resumes(){
        return $this->belongsTo(Resume::class);
    }
}
