<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfilRequest;
use App\Models\User;
use Auth;

class ProfilController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware(['auth', 'verified']);
		$this->title = __('profil');
		$this->attribs = ['list', 'create', 'update', 'delete'];
	}

	public function updatepassword(PasswordRequest $request) {

		Auth::user()->password = bcrypt($request->password);
		Auth::user()->update();

		$title = $this->title;
		$user = Auth::user();
		$avatar = "https://www.gravatar.com/avatar/" . md5(strtolower(trim(Auth::user()->email)));
		$password = true;
		return view('bo.users.profile', compact('title', 'user', 'avatar', 'password'));

	}

	public function updateProfil(ProfilRequest $request) {
		Auth::user()->name = $request->name;
		Auth::user()->save();


		$title = $this->title;
		$user = Auth::user();
		$avatar = "https://www.gravatar.com/avatar/" . md5(strtolower(trim(Auth::user()->email)));
		$profil = true;
		return view('bo.users.profile', compact('title', 'user', 'avatar', 'profil'));
	}
}