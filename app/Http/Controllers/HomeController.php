<?php namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth', ['except' => 'index']);
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::check())
		{
			$posts = Auth::user()->posts()->get();
			foreach(Auth::user()->followings as $following) {
				$posts = $posts->merge($following->posts()->get());
			}
			// dd($posts->comments);
			return view('home.home', compact('posts'));
		}
		else
		{
			return view('auth.register');
		}
	}

}
