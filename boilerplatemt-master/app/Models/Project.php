<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'resume_id',
        'name_project',
        'start_project_date',
        'end_project_date',
        'project_description'
    ];
    public function resume(){
        return $this->belongsTo(Resume::class);
    }
}
