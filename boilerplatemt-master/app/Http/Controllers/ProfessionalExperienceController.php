<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessionalExperienceRequest;
use App\Http\Requests\ResumeRequest;
use App\Models\ProfessionalExperience;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class ProfessionalExperienceController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'verified']);
        $this->title = 'Professional Experience';
        $this->attribs = ['list', 'create', 'update', 'delete'];
    }
    public function store(ResumeRequest $request,$id_resume)
    {

        if (!Auth::user()->can('resume.list')) {
            return abort(401);
        }
        for ($i = 0; $i < count($request->name_project); $i++) {

            //init dates
            $date = null;
            $date2 = null;
            //if date == '' date = null else date take the value of the request date
            if ($request->start_date_job[$i] != "") {
                $date = $request->start_date_job[$i];
            }
            //////////
            if ($request->end_date_job[$i] != "") {
                $date2 = $request->end_date_job[$i];
            }

            $datasave = [

                'resume_id' => $id_resume,
                'company_name' => $request->company_name[$i],
                'start_date_job' => $date,
                'end_date_job' => $date2,
                'position' => $request->position[$i],
                'job_descrption' => $request->job_descrption[$i],
                'grade' => $request->grade[$i],
                'skills_acquired' => $request->skills_acquired[$i]


            ];
            ProfessionalExperience::create($datasave);



    }

    }

    public function store_in_update(ProfessionalExperience $req,$id_resume)
    {

        if (!Auth::user()->can('resume.list')) {
            return abort(401);
        }


            //init dates
            $date = null;
            $date2 = null;
            //if date == '' date = null else date take the value of the request date
            if ($req['start_date_job'] != "") {
                $date = $req['start_date_job'];
            }
            //////////
            if ($req['end_date_job'] != "") {
                $date2 = $req['end_date_job'];
            }

            $datasave = [

                'resume_id' => $id_resume,
                'company_name' => $req['company_name'],
                'start_date_job' => $date,
                'end_date_job' => $date2,
                'position' => $req['position'],
                'job_descrption' => $req['job_descrption']


            ];
            ProfessionalExperience::create($datasave);




    }
    public function create()
    {
        if (!Auth::user()->can('resume.list')) {
            return abort(401);
        }
        $title = $this->title;
        return view('bo.resume.create', compact('title'));
    }
    public function show($id) {
        //
    }

    /**S
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessionalExperienceRequest $request, $id)
    {
        for ($i = 0; $i < count($request->company_name); $i++) {
            $ProfessionalExperience = ProfessionalExperience::find($id[$i]);
            $ProfessionalExperience->first_name = $request->company_name[$i];
            $ProfessionalExperience->last_name = $request->start_date_job[$i];
            $ProfessionalExperience->phone_number = $request->end_date_job[$i];
            $ProfessionalExperience->email = $request->position[$i];
            $ProfessionalExperience->address = $request->job_descrption[$i];

            $ProfessionalExperience->update();
        }
        return redirect('/resume');
    }

    public function edit($id) {
        if (!Auth::user()->can('resume.update')) {
            return abort(401);
        }

        $title = $this->title;
        $ProfessionalExperience = ProfessionalExperience::find($id);
        $roles = Role::all();
        if ($ProfessionalExperience) {
            return view('bo.resume.edit', compact('title', 'ProfessionalExperience', 'roles'));
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

        $ProfessionalExperience = ProfessionalExperience::find($id);
        $ProfessionalExperience->delete();
        return response()->json([
            'message' => 'Data deleted successfully!',
        ]);
    }
}


