<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificationRequest;
use App\Http\Requests\EducationRequest;
use App\Http\Requests\ProfessionalExperienceRequest;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\SkillRequest;
use App\Models\Certification;
use App\Models\Education;
use App\Models\Establishment;
use App\Models\ProfessionalExperience;
use App\Models\Project;
use App\Models\Resume;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Requests\ResumeRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ResumeController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'verified']);
        $this->title = 'Resume';
        $this->attribs = ['list', 'create', 'update', 'delete'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('resume.list')) {
            return abort(401);
        }
        $title=$this->title;
        $addurl= route('resume.create');
        $Establishments = Establishment::all();
        return view('bo.resume.index', compact('title', 'addurl','Establishments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResumeRequest $request)
    {


        $requestProfessionalExperienceRequest= ProfessionalExperienceRequest::create($request);
        $requestProjectRequest= ProjectRequest::create($request);
        $requestEducationRequest= EducationRequest::create($request);
        $requestCertification = CertificationRequest::create($request);
        $requestSkill = SkillRequest::create($request);


        if (!Auth::user()->can('resume.list')) {
            return abort(401);
        }
       $resume = Resume::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => ($request->phone_number),
            'email' => ($request->email),
            'address' => ($request->address),
            'description' => ($request->description),
            'gender' => ($request->gender),
            'activity_area' => ($request->activity_area),
            'current_position' => ($request->current_position),
            'country' => ($request->country)
        ]);

        $professional_experience = ProfessionalExperienceController::store($request,$resume->id);
        $project = ProjectController::store($requestProjectRequest,$resume->id);
        $education = EducationController::store($requestEducationRequest,$resume->id);
        $Certification = CertificationController::store($requestCertification,$resume->id);
        $skill = SkillsController::store($requestSkill,$resume->id);

        return redirect('/resume');
    }

    public function create()
    {
        if (!Auth::user()->can('resume.list')) {
            return abort(401);
        }
        $title = $this->title;
        $Establishments = Establishment::all();
        return view('bo.resume.create', compact('title','Establishments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }
    public function getResume() {

        $resumes = Resume::query();

        return DataTables::eloquent($resumes)
            ->addColumn('action', function ($row) {
                return '

				<a href="' . route("resume.edit", $row->id) . '" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
				    <span class="svg-icon svg-icon-md">
				        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
				            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				                <rect x="0" y="0" width="24" height="24"/>
				                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
				                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
				            </g>
				        </svg>
				    </span>
				</a>

				<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete" name="delete-' . $row->id . '" onclick="deleteFunction(this)">
				    <span class="svg-icon svg-icon-md">
				        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
				            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				                <rect x="0" y="0" width="24" height="24"/>
				                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
				                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
				            </g>
				        </svg>
				    </span>
				</a>
				';
            })
            ->rawColumns(['action'])
            ->toJson();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResumeRequest $request,$idresume)
    {

        $resume = Resume::find($idresume);
        $resume->first_name = $request->first_name;
        $resume->last_name = $request->last_name;
        $resume->phone_number = $request->phone_number;
        $resume->email = $request->email;
        $resume->address = $request->address;
        $resume->description = $request->description;
        $resume->gender = $request->gender;
        $resume->activity_area = $request->activity_area;
        $resume->current_position = $request->current_position;
        $resume->country = $request->country;
        $resume->update();
///////////////// Professional Experience
        $old_exp_ids = [];
        foreach ($resume->professinoal_experiences as $exp) {
            $old_exp_ids[] = $exp['id'];
        }
        // new id array
        $new_exp_ids = [];

        // update experience
        $experiences = $request->experience;
        if (!empty($experiences)) {
            foreach ($experiences as $index => $exp) {
                $experience = ProfessionalExperience::find($index);
                //  dd($experience);
                if ($experience == null) {
                    $pro = new ProfessionalExperience($exp);
                    $projects = ProfessionalExperienceController::store_in_update($pro, $idresume);
                } else {
                    // Mise a jour de l'exp
                    $experience->company_name = $exp['company_name'];
                    $experience->start_date_job = $exp['start_date_job'];
                    $experience->end_date_job = $exp['end_date_job'];
                    $experience->position = $exp['position'];
                    $experience->job_descrption = $exp['job_descrption'];
                    $experience->grade = $exp['grade'];
                    $experience->skills_acquired = $exp['skills_acquired'];
                    $experience->update();
                }
                if (isset($experience['id']))
                    $new_exp_ids[] = $experience['id'];
            }
        }
        // comparaison des deux tableau
        $differenceArray = array_diff($old_exp_ids, $new_exp_ids);
        foreach ($differenceArray as $diff) {
            $experience = ProfessionalExperience::find($diff);
            $experience->delete();
        }
///////////////////////////////////  education
        // old id array
        $old_edu_ids = [];
        foreach ($resume->educations as $exp) {
            //storing old ids
            $old_edu_ids[] = $exp['id'];
        }
        // new id array
        $new_edu_ids = [];

        $education = $request->education;
        if (!empty($education)) {
            foreach ($education as $index => $edu) {
                $education = Education::find($index);
                if ($education != null) {
                    // Mise a jour de l'exp

                    $education['establishment_name'] = $edu['establishment_name'];
                    $education['start_education_date'] = $edu['start_education_date'];
                    $education['end_education_job'] = $edu['end_education_job'];
                    $education['degree'] = $edu['degree'];
                    $education->update();
                } else {
                    $educa = new Education($edu);
                    $education = EducationController::store_in_update($educa, $idresume);
                }
                if (isset($education['id']))
                    $new_edu_ids[] = $education['id'];

            }
        }
        // comparaison des deux tableau
        $differenceArrayEdu = array_diff($old_edu_ids, $new_edu_ids);
        foreach ($differenceArrayEdu as $diffEdu) {
            $education = Education::find($diffEdu);
            $education->delete();
        }

///////////////////////////////////  Projects
        // old id array
        $old_pro_ids = [];
        foreach ($resume->projects as $exp) {
            //storing old ids
            $old_pro_ids[] = $exp['id'];
        }
        // new id array
        $new_pro_ids = [];

        $projects = $request->project;
        if (!empty($projects)) {
            foreach ($projects as $index => $pro) {
                $projects = Project::find($index);
                if (!is_null($projects)) {
                    // Mise a jour de l'exp

                    $projects['name_project'] = $pro['name_project'];
                    $projects['start_project_date'] = $pro['start_project_date'];
                    $projects['end_project_date'] = $pro['end_project_date'];
                    $projects['project_description'] = $pro['project_description'];
                    $projects->update();
                } else {
                    $project = new Project($pro);
                    $projects = ProjectController::store_in_update($project, $idresume);
                }
                if (isset($projects['id']))
                    $new_pro_ids[] = $projects['id'];
            }
        }
        // comparaison des deux tableau
        $differenceArrayPro = array_diff($old_pro_ids, $new_pro_ids);
        foreach ($differenceArrayPro as $diffPro) {
            $projects = Project::find($diffPro);
            $projects->delete();
        }
//////////////////////////////////////////////// certifications
        // old id array
        $old_cer_ids = [];
        foreach ($resume->certifications as $exp) {
            //storing old ids
            $old_cer_ids[] = $exp['id'];
        }
        // new id array
        $new_cer_ids = [];

        $certification = $request->certification;
        if (!empty($certification)) {
            foreach ($certification as $index => $cer) {
            $certification = Certification::find($index);
            if (!is_null($certification)) {
                // Mise a jour de l'exp

                $certification['name_certification'] = $cer['name_certification'];
                $certification['certification_company_name'] = $cer['certification_company_name'];
                $certification['date_certification'] = $cer['date_certification'];
                $certification['expiration_date'] = $cer['expiration_date'];
                $certification['level'] = $cer['level'];
                $certification->update();
            } else {
                $Certif = new Certification($cer);
                $certification = CertificationController::store_in_update($Certif, $idresume);
            }
                if (isset($certification['id']))
                    $new_cer_ids[] = $certification['id'];
        }
    }
        // comparaison des deux tableau
        $differenceArrayCer = array_diff($old_cer_ids, $new_cer_ids);
        foreach ($differenceArrayCer as $diffCer)
        {
            $certification = Certification::find($diffCer);
            $certification->delete();
        }
///////////////////////////////////  skills
        // old id array
        $old_skill_ids = [];
        foreach($resume->skills as $exp){
            //storing old ids
            $old_skill_ids[] = $exp['id'];
        }
        // new id array
        $new_skill_ids = [];

        $skill = $request->skills;
        if (!empty($skill)) {
            foreach ($skill as $index => $ski) {
                $skill = Skill::find($index);
                if (!is_null($skill)) {
                    // Mise a jour de l'exp

                    $skill['Name_Skill'] = $ski['Name_Skill'];
                    $skill['level_skill'] = $ski['level_skill'];
                    $skill->update();
                } else {
                    $Sk = new Skill($ski);
                    $skills = SkillsController::store_in_update($Sk, $idresume);

                }
                if (isset($skill['id']))
                    $new_skill_ids[] = $skill['id'];
            }
        }
        // comparaison des deux tableau
        $differenceArrayskill = array_diff($old_skill_ids, $new_skill_ids);
        foreach ($differenceArrayskill as $diffskill)
        {
            $education = Skill::find($diffskill);
            $education->delete();
        }


        return redirect('/resume');
    }

    public function edit($id) {
        if (!Auth::user()->can('resume.update')) {
            return abort(401);
        }

        $title = $this->title;
        $resume = Resume::find($id);
        $Establishments = Establishment::all();
        if ($resume) {
            return view('bo.resume.edit', compact('title', 'resume', 'Establishments'));
        } else {
            return redirect('/resume');
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('resume.delete')) {
            return abort(401);
        }

        $resume = Resume::find($id);
        // delete related project
     /*   foreach($resume->educations as $educ){
            $educ->delete();
        }*/

        $resume->delete();
        return response()->json([
            'message' => 'Data deleted successfully!',
        ]);
    }
}
