<?php

namespace App\Http\Requests;

use App\Models\ProfessionalExperience;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class ProfessionalExperienceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->method() == 'POST') {
            return Auth::user()->can('resume.create');
        }
        if ($this->method() == 'PUT') {
            return Auth::user()->can('resume.update');
        }
        return false;
    }

    public function rules() {
        $ProfessionalExperience = ProfessionalExperience::find($this->ProfessionalExperience);
        if($ProfessionalExperience){
            return [

                "company_name.*" => 'required',
                "start_date_job.*" => 'required',
                "end_date_job.*" => 'required',
                "position.*" =>  'required',
                "job_descrption.*" => 'required',
                "grade" => 'required',
                "skills_acquired" => 'required',

            ];
        }
        return [
            "company_name.*" => 'required',
            "start_date_job.*" => 'required',
            "end_date_job.*" => 'required',
            "position.*" =>  'required',
            "job_descrption.*" => 'required',
            "grade" => 'required',
            "skills_acquired" => 'required',

        ];
    }
}


