<?php

namespace App\Http\Controllers;

use Sentinel;
use Exception;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public function __construct()
    {
        // Middleware
        $this->middleware('sentinel.auth');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
			'title' => 'required|max:255',
			'content' => 'required'
		]);
		
		$user_id = Sentinel::getUser()->id;
		
		$data = array(
			'title' => trim($request->get('title')),
			'content' => trim($request->get('content')),
			'user_id' => $user_id
		);
		
		$post = new Post();
		
		try{
			$post_id = $post->savePost($data)->id;
		} catch (Exception $e) {
			session()->flash('error', $e->getMessage());
			return redirect()->back();
		}
		
		session()->flash('success', 'You have successfully added a new post!');
		return redirect()->route('posts.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
