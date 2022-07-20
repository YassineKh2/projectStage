<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = [
        'resume_id',
        'establishment_name',
        'start_education_date',
        'end_education_job',
        'degree'
    ];
    public function resume(){
        return $this->belongsTo(Resume::class);
    }
}
