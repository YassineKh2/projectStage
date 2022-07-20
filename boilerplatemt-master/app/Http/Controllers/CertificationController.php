<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificationRequest;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificationController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CertificationRequest $request,$id_resume)
    {
        if (!Auth::user()->can('resume.list')) {
            return abort(401);
        }
        for ($i = 0; $i < count($request->name_certification); $i++) {
            $date = null;
            $date2 = null;
                if($request->expiration_date[$i] != ""){
                    $date = $request->expiration_date[$i];
                }
            if($request->date_certification[$i] != ""){
                $date2 = $request->date_certification[$i];
            }
                $datasave = [

                    'resume_id' => $id_resume,
                    'name_certification' => $request->name_certification[$i],
                    'certification_company_name' => $request->certification_company_name[$i],
                    'date_certification' => $date2,
                    'expiration_date' => $date,
                    'level' => $request->level[$i]
                ];


            Certification::create($datasave);

        }
    }  public function store_in_update(Certification $request,$id_resume)
    {
        if (!Auth::user()->can('resume.list')) {
            return abort(401);
        }
            $date = null;
            $date2 = null;

                if($request['expiration_date'] != ""){
                    $date = $request['expiration_date'];
                }
            if($request['date_certification'] != ""){
                $date2 = $request['date_certification'];
            }
                $datasave = [

                    'resume_id' => $id_resume,
                    'name_certification' => $request['name_certification'],
                    'certification_company_name' => $request['certification_company_name'],
                    'date_certification' => $date2,
                    'expiration_date' => $date,
                    'level' => $request['level']
                ];


            Certification::create($datasave);


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
