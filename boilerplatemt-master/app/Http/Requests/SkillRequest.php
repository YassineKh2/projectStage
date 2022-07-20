<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SkillRequest extends FormRequest{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        if($this->method() == 'POST'){
            return Auth::user()->can('resume.create');
        }
        if($this->method() == 'PUT'){
            return Auth::user()->can('resume.update');
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'Name_Skill' => 'required',
            'level_skill' => 'required'
        ];
    }
}
