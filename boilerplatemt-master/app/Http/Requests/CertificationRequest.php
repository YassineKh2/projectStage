<?php

namespace App\Http\Requests;

use App\Models\Certification;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class CertificationRequest extends FormRequest
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
        $Certification = Certification::find($this->Certification);
        if($Certification){
            return [

                "name_certification" => 'required',
                "certification_company_name" => '',
                "date_certification" => 'required',
                "expiration_date" =>  '',
                "level" => 'required',

            ];
        }
        return [
            "name_certification" => 'required',
            "certification_company_name" => '',
            "date_certification" => 'required',
            "expiration_date" =>  '',
            "level" => 'required',

        ];
    }
}


