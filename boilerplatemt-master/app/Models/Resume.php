<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'address',
        'description',
        'gender',
        'activity_area',
        'current_position',
        'country'
    ];
    public function professinoal_experiences(){
    return $this->hasMany(ProfessionalExperience::class);
    }

    public function educations(){
        return $this->hasMany(Education::class);
    }
    public function projects(){
        return $this->hasMany(Project::class);
    }
    public function certifications(){
        return $this->hasMany(Certification::class);
    }
    public function skills(){
        return $this->hasMany(Skill::class);
    }
}
