<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\post;
session_start();
date_default_timezone_set("Asia/Kolkata");

class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		if(empty($request->input('title')) && empty($request->input('desc')) ){
			return redirect()->back()->with('errmsg','Fields are empty');
		}else{
			$user = \Auth::user();
			$post = new post;
			$post->name = $user->name;
			$post->email = $user->email;
			$post->title = $request->input('title');
			$post->desc = $request->input('desc');
			$post->datetime =date('Y-m-d');
			$post->time = date('h:ia');
			$post->created_at = date('Y-m-d h:i:s');
			$post->updated_at = date('Y-m-d h:i:s');
			$post->save();
			return redirect()->back()->with('success','New Post is been added.');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = \Auth::user();
		$post = \App\post::where('id','=',$id)->get();
		return view('editpost',['id'=>$id,'user'=>$user->email,'post'=>$post]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		if(empty($request->input('title')) && empty($request->input('desc')) ){
			return redirect()->back()->with('errmsg','Fields are empty');
		}else{
			$post = \App\post::where('id','=',$id)->get();
			$t = $d = "";
			foreach ($post as $k) {
				$t = $k->title;
				$d = $k->desc;
			}
			if($request->input('title')==$t && $request->input('desc')==$d)	{
				return redirect()->back()->with('errmsg','Your entered value are same.');
			}else{
				$user = \Auth::user();
				$pp = \App\post::where('id', '=',$id)
		          ->where('email', '=',$user->email)
		          ->update(['title' => $request->input('title'),'desc'=>$request->input('desc'),'updated_at'=>date('Y-m-d h:i:s')]);
		        if($pp){
					return redirect()->back()->with('success','Post is updated.');
				}else{
					return redirect()->back()->with('errmsg','Values not updated due to server error.');
				}
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id,Request $request)
	{
		$del = \App\post::where('id','=',$id)->delete();

		if($del){
			return redirect()->back()->with('success','Post is deleted.');
		}else{
			return redirect()->back()->with('errmsg','Post is not deleted due to server error.');
		}

	}

}
