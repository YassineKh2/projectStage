<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\App;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class AppController extends Controller {

	private $title;
	private $attribs;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
		$this->title = 'Application';
		$this->attribs = ['list', 'create', 'update', 'delete'];
	}

	// formatted datatable
	public function getApps() {

		$apps = App::query();

		return DataTables::eloquent($apps)
			->addColumn('action', function ($row) {
				return '

				<a href="' . route("apps.edit", $row->id) . '" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
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
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		if (!Auth::user()->can('app.list')) {
			return abort(401);
		}
		$title = $this->title;
		$addurl = route('apps.create');
		return view('bo.apps.index', compact('title', 'addurl'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		if (!Auth::user()->can('app.create')) {
			return abort(401);
		}

		$title = $this->title;
		return view('bo.apps.create', compact('title'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\ApplicationRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ApplicationRequest $request) {
		$app = App::create(['name' => $request->name]);
		foreach ($this->attribs as $attrib) {
			Permission::create(['name' => $request->name . '.' . $attrib]);
		}
		return redirect('/apps');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		if (!Auth::user()->can('app.update')) {
			return abort(401);
		}

		$title = $this->title;
		$app = App::find($id);
		if ($app) {
			return view('bo.apps.edit', compact('title', 'app'));
		} else {
			return redirect('/apps');
		}

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(ApplicationRequest $request, $id) {
		$app = App::find($id);

		$permissions = Permission::where('name', 'like', '%' . $app->name . '%')->get();

		$i = 0;
		foreach ($permissions as $perm) {
			$perm->name = $request->name . '.' . $this->attribs[$i];
			$perm->save();
			$i++;
		}

		$app->name = $request->name;
		$app->update();
		return redirect('/apps');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		if (!Auth::user()->can('app.delete')) {
			return abort(401);
		}

		$app = App::find($id);
		$permissions = Permission::where('name', 'like', '%' . $app->name . '%')->get();

		foreach ($permissions as $perm) {
			$perm->delete();
		}

		$app->delete();
		return response()->json([
			'message' => 'Data deleted successfully!',
		]);
	}
}
