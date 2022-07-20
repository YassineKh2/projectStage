<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalExperience extends Model
{
    use HasFactory;
    protected $fillable = [
        'resume_id',
        'company_name',
        'start_date_job',
        'end_date_job',
        'position',
        'job_descrption'
    ];

    public function resumes(){
        return $this->belongsTo(Resume::class);
    }
}
