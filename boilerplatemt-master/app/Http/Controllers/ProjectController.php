<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'verified']);
        $this->title = 'Projects';
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
    public function store(ProjectRequest $request,$id_resume)
    {

        if (!Auth::user()->can('resume.list')) {
            return abort(401);
        }
        for ($i = 0; $i < count($request->name_project); $i++) {

            //init dates
            $date = null;
            $date2 = null;
            //if date == '' date = null else date take the value of the request date
            if($request->start_project_date[$i] != "")
                $date = $request->start_project_date[$i];
            ///////
            if($request->end_project_date[$i] != "")
                $date2 = $request->end_project_date[$i];


            $datasave = [

                'resume_id' => $id_resume,
                'name_project' => $request->name_project[$i],
                'start_project_date' => $date,
                'end_project_date' => $date2,
                'project_description' => $request->project_description[$i],


            ];
            Project::create($datasave);

        }

    }public function store_in_update(Project $request,$id_resume)
    {

        if (!Auth::user()->can('resume.list')) {
            return abort(401);
        }


            //init dates
            $date = null;
            $date2 = null;
            //if date == '' date = null else date take the value of the request date
            if($request['start_project_date'] != "")
                $date = $request['start_project_date'];
            ///////
            if($request['end_project_date'] != "")
                $date2 = $request['end_project_date'];


            $datasave = [

                'resume_id' => $id_resume,
                'name_project' => $request['name_project'],
                'start_project_date' => $date,
                'end_project_date' => $date2,
                'project_description' => $request['project_description'],


            ];
            Project::create($datasave);



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
