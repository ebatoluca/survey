<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{


	public function __construct()
	{
	
		// $this->middleware('auth:sanctum');
	
	}
    
	public function app()
	{

    	// Retornar la vista de index
        $response = response()->view('welcome');
        
        // Retornar la vista
        return $response;

	}

}
