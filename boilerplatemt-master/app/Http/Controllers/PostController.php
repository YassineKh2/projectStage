<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller {

	private $title;
	private $attribs;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
		$this->title = 'Post';
		$this->attribs = ['list', 'create', 'update', 'delete'];
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		if (!Auth::user()->can('post.list')) {
			return abort(401);
		}

		$posts = Post::all();
		$title = $this->title;
		$addurl = route('posts.create');
		return view('bo.posts.index', compact('title', 'posts', 'addurl'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		if (!Auth::user()->can('post.create')) {
			return abort(401);
		}

		$title = $this->title;
		return view('bo.posts.create', compact('title'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\PostRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(PostRequest $request) {
		$post = Post::create([
			'name' => $request->name,
			'description' => $request->description,
		]);

		return redirect('/posts');
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
		if (!Auth::user()->can('post.update')) {
			return abort(401);
		}

		$title = $this->title;
		$post = Post::find($id);
		if ($post) {
			return view('bo.posts.edit', compact('title', 'post'));
		} else {
			return redirect('/posts');
		}

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(PostRequest $request, $id) {
		$post = Post::find($id);

		$post->name = $request->name;
		$post->description = $request->description;
		$post->update();
		return redirect('/posts');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		if (!Auth::user()->can('post.delete')) {
			return abort(401);
		}

		$post = Post::find($id);
		$post->delete();
		return redirect('/posts');
	}
}
