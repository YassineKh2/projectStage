<?php

namespace App\Http\Requests;


use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class ProjectRequest extends FormRequest
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
        $Project = Project::find($this->Project);
        if($Project){
            return [

                "resume_id" => 'required',
                "name_project" => 'required',
                "start_project_date" => 'required',
                "end_project_date" =>  'required',
                "project_description" => 'required',

            ];
        }
        return [
            "resume_id" => 'required',
            "name_project" => 'required',
            "start_project_date" => 'required',
            "end_project_date" =>  'required',
            "project_description" => 'required',

        ];
    }
}


