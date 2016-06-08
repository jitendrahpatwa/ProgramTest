<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\User;
use App\post;
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
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = \Auth::user();
		$post = post::select('*')->where('email','=',$user->email)->get();
		return view('home',['post'=>$post]);
	}

}
