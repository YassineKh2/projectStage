<?php

namespace App\Http\Requests;

use App\Models\Resume;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class ResumeRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        if ($this->method() == 'POST') {
            return Auth::user()->can('resume.create');
        }
        if ($this->method() == 'PUT') {
            return Auth::user()->can('resume.update');
        }
        return false;
    }


	public function rules() {
        $resume = Resume::find($this->resume);
        if($resume){
		return [

            "first_name" => ['required','string'],
            "last_name" => ['required','string'],
            "phone_number" => ['required','integer'],
            "email" => ['required','email'],
            "address" =>  'required',
            "description" => 'required',
            "gender" => 'required',
            "activity_area" => 'required',
            "current_position" => 'required',
            "country" => 'required',
            "resume_type" => '',

            "company_name.*" => 'required_with:job_descrption.*,start_date_job.*,end_date_job.*,position.*,grade.*,skills_acquired.*',
            "job_descrption.*" => 'required_with:company_name.*,start_date_job.*,end_date_job.*,position.*,grade.*,skills_acquired.*',
            "start_date_job.*" => 'required_with:job_descrption.*,company_name.*,end_date_job.*,position.*,grade.*,skills_acquired.*',
            "end_date_job.*" => 'required_with:job_descrption.*,company_name.*,start_date_job.*,position.*,grade.*,skills_acquired.*',
            "position.*" =>  'required_with:job_descrption.*,company_name.*,start_date_job.*,end_date_job.*,position.*,skills_acquired.*',
            "grade.*" =>  'required_with:job_descrption.*,company_name.*,start_date_job.*,end_date_job.*,grade.*,skills_acquired.*',
            "skills_acquired.*" =>  'required_with:job_descrption.*,company_name.*,start_date_job.*,end_date_job.*,grade.*,position.*',

            'Name_Skill.*' => 'required_with:level_skill.*',
            'level_skill.*' => 'required_with:Name_Skill.*',

            "name_project.*" => 'required_with:start_project_date.*,end_project_date.*,project_description.*',
            "start_project_date.*" => 'required_with:name_project.*,end_project_date.*,project_description.*',
            "end_project_date.*" =>  'required_with:name_project.*,start_project_date.*,project_description.*',
            "project_description.*" => 'required_with:name_project.*,start_project_date.*,end_project_date.*',

            "establishment_name.*" => 'required_with::establishment_name,start_education_date,end_education_job,degree',
            "start_education_date.*" => 'required_with::establishment_name,establishment_name,end_education_job,degree',
            "end_education_job.*" =>  'required_with::establishment_name,establishment_name,start_education_date,degree',
            "degree.*" => 'required_with::establishment_name,establishment_name,start_education_date,end_education_job',

            "name_certification.*" => 'required_with:certification_company_name.*,date_certification.*,expiration_date.*,level.*',
            "certification_company_name.*" => '',
            "date_certification.*" => 'required_with:certification_company_name.*,expiration_date.*,level.*,name_certification.*',
            "expiration_date.*" =>  '',
            "level.*" => 'required_with:certification_company_name.*,expiration_date.*,date_certification.*,name_certification.*'

		];
            }
        return [
            "first_name" => ['required','string'],
            "last_name" => ['required','string'],
            "phone_number" => ['required','integer'],
            "email" => ['required','email'],
            "address" =>  'required',
            "description" => 'required',
            "gender" => 'required',
            "activity_area" => 'required',
            "current_position" => 'required',
            "country" => 'required',
            "resume_type" => '',


            "company_name.*" => 'required_with:job_descrption.*,start_date_job.*,end_date_job.*,position.*,grade.*,skills_acquired.*',
            "job_descrption.*" => 'required_with:company_name.*,start_date_job.*,end_date_job.*,position.*,grade.*,skills_acquired.*',
            "start_date_job.*" => 'required_with:job_descrption.*,company_name.*,end_date_job.*,position.*,grade.*,skills_acquired.*',
            "end_date_job.*" => 'required_with:job_descrption.*,company_name.*,start_date_job.*,position.*,grade.*,skills_acquired.*',
            "position.*" =>  'required_with:job_descrption.*,company_name.*,start_date_job.*,end_date_job.*,position.*,skills_acquired.*',
            "grade.*" =>  'required_with:job_descrption.*,company_name.*,start_date_job.*,end_date_job.*,grade.*,skills_acquired.*',
            "skills_acquired.*" =>  'required_with:job_descrption.*,company_name.*,start_date_job.*,end_date_job.*,grade.*,position.*',

            'Name_Skill.*' => 'required_with:level_skill.*',
            'level_skill.*' => 'required_with:Name_Skill.*',

            "name_project.*" => 'required_with:start_project_date.*,end_project_date.*,project_description.*',
            "start_project_date.*" => 'required_with:name_project.*,end_project_date.*,project_description.*',
            "end_project_date.*" =>  'required_with:name_project.*,start_project_date.*,project_description.*',
            "project_description.*" => 'required_with:name_project.*,start_project_date.*,end_project_date.*',

            "establishment_name.*" => 'required_with::establishment_name,start_education_date,end_education_job,degree',
            "start_education_date.*" => 'required_with::establishment_name,establishment_name,end_education_job,degree',
            "end_education_job.*" =>  'required_with::establishment_name,establishment_name,start_education_date,degree',
            "degree.*" => 'required_with::establishment_name,establishment_name,start_education_date,end_education_job',

            "name_certification.*" => 'required_with:certification_company_name.*,date_certification.*,expiration_date.*,level.*',
            "certification_company_name.*" => '',
            "date_certification.*" => 'required_with:certification_company_name.*,expiration_date.*,level.*,name_certification.*',
            "expiration_date.*" =>  '',
            "level.*" => 'required_with:certification_company_name.*,expiration_date.*,date_certification.*,name_certification.*',
        ];
	}
    public function messages()
    {
        return [
            'company_name.*.required_with' => 'The Company name field is required',
            'job_descrption.*.required_with' => 'The Job Description field is required',
            'start_date_job.*.required_with' => 'The Stating date field is required',
            'end_date_job.*.required_with' => 'The Ending Date field is required',
            'position.*.required_with' => 'The Position field is required',
            'grade.*.required_with' => 'The Grade field is required',
            'skills_acquired.*.required_with' => 'The Skills Acquired field is required',

            'Name_Skill.*.required_with' => 'The Skills Name field is required',
            'level_skill.*.required_with' => 'The Skill level field is required',


            'name_project.*.required_with' => 'The Project name field is required',
            'start_project_date.*.required_with' => 'The Stating date field is required',
            'end_project_date.*.required_with' => 'The Ending Date field is required',
            'project_description.*.required_with' => 'The Project Description field is required',



            'establishment_name.*.required_with' => 'The Establishment name field is required',
            'start_education_date.*.required_with' => 'The Stating date field is required',
            'end_education_job.*.required_with' => 'The Ending Date field is required',
            'degree.*.required_with' => 'The Degree field is required',

            'name_certification.*.required_with' => 'The Certification name field is required',
            'date_certification.*.required_with' => 'The  Stating date field is required',
            'level.*.required_with' => 'The level field is required',


        ];
    }
}
