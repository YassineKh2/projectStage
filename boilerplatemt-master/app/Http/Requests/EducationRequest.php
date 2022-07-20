<?php

namespace App\Http\Requests;

use App\Models\Education;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class EducationRequest extends FormRequest
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

        $Education = Education::find($this->Education);
        if($Education){

            return [

                "resume_id" => 'required',
                "establishment_name" => 'required_if:start_education_date,end_education_job,degree',
                "start_education_date" => 'required_if:establishment_name,end_education_job,degree',
                "end_education_job" =>  'required_if:establishment_name,start_education_date,degree',
                "degree" => 'required_if:establishment_name,start_education_date,end_education_job',

            ];
        }
        return [
            "resume_id" => 'required',
            "establishment_name" => 'required_if:establishment_name,start_education_date,end_education_job,degree',
            "start_education_date" => 'required_if:establishment_name,establishment_name,end_education_job,degree',
            "end_education_job" =>  'required_if:establishment_name,establishment_name,start_education_date,degree',
            "degree" => 'required_if:establishment_name,establishment_name,start_education_date,end_education_job',

        ];
    }

}


