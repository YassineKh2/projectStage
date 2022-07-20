<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillsController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'verified']);
        $this->title = 'Skills';
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
    public function store(SkillRequest $request,$id_resume)
    {

        if (!Auth::user()->can('resume.list')) {
            return abort(401);
        }
        for ($i = 0; $i < count($request->Name_Skill); $i++) {


            $datasave = [

                'resume_id' => $id_resume,
                'Name_Skill' => $request->Name_Skill[$i],
                'level' => $request->level[$i]

            ];
            Skill::create($datasave);

        }

    }

    public function store_in_update(Skill $request,$id_resume)
    {

        if (!Auth::user()->can('resume.list')) {
            return abort(401);
        }



            $datasave = [

                'resume_id' => $id_resume,
                'Name_Skill' => $request['Name_Skill'],
                'level' => $request['level']

            ];
            Skill::create($datasave);

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
