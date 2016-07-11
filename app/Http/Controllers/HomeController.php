<?php

namespace App\Http\Controllers;

use App\Generators\PlanningGenerator;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $planningGenerator;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PlanningGenerator $generator)
    {
        $this->middleware(['auth', 'user.settings', 'recipes']);
        $this->planningGenerator = $generator;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->planningGenerator->generate($request->user());

        return view('home');
    }
}
