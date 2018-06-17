<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	/**
	 * Show home page.
	 * 
	 * @return Response
	 */
    public function __invoke()
	{
		return view('welcome');
	}
}
