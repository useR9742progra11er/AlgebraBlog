<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
	/**
	 * Show Dashboard page.
	 * 
	 * @return Response
	 */
    public function __invoke()
	{
		return view('Centaur::dashboard');
	}
}