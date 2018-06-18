<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Show the home page.
     *
     * @return Response
     */
    public function __invoke()
    {
		$posts = Post::all();
        return view('home', ['posts' => $posts]);
    }
}
