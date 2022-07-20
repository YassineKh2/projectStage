<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'verified']);
        $this->title = 'Education';
        $this->attribs = ['list', 'create', 'update', 'delete'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationRequest $request,$id_resume)
    {
        if (!Auth::user()->can('resume.list')) {
            return abort(401);
        }


        for ($i = 0; $i < count($request->establishment_name); $i++) {

            //init dates
            $date = null;
            $date2 = null;
            //if date == '' date = null else date take the value of the request date
            if($request->start_education_date[$i] != "")
                $date = $request->start_education_date[$i];
        if($request->end_education_job[$i] != "")
            $date2 = $request->end_education_job[$i];


            $datasave = [

                'resume_id' => $id_resume,
                'establishment_name' => $request->establishment_name[$i],
                'start_education_date' => $date,
                'end_education_job' => $date2,
                'degree' => $request->degree[$i],


            ];
            Education::create($datasave);

        }

    }

    public function store_in_update(Education $request,$id_resume)
    {
        if (!Auth::user()->can('resume.list')) {
            return abort(401);
        }


            //init dates
            $date = null;
            $date2 = null;
            //if date == '' date = null else date take the value of the request date
            if($request['start_education_date'] != "")
                $date = $request['start_education_date'];
            if($request['end_education_job'] != "")
                $date2 = $request['end_education_job'];


            $datasave = [

                'resume_id' => $id_resume,
                'establishment_name' => $request['establishment_name'],
                'start_education_date' => $date,
                'end_education_job' => $date2,
                'degree' => $request['degree'],


            ];
            Education::create($datasave);



    }

    public function create()
    {
        if (!Auth::user()->can('resume.list')) {
            return abort(401);
        }
        $title = $this->title;
        return view('bo.resume.create', compact('title'));
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
