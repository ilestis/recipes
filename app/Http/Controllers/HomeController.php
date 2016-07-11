<?php

namespace App\Http\Controllers;

use App\Generators\PlanningGenerator;
use App\Repositories\PlanningRepository;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var PlanningGenerator
     */
    protected $planningGenerator;

    /**
     * @var PlanningRepository
     */
    protected $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PlanningGenerator $generator, PlanningRepository $repository)
    {
        $this->middleware(['auth', 'user.settings', 'recipes']);
        $this->planningGenerator = $generator;
        $this->repository = $repository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $plannings = $this->repository->forUser($request->user());
        return view('home', compact('plannings'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function generate(Request $request)
    {
        $this->planningGenerator->generate($request->user());
        return redirect('home')->with('success', 'home.validation.generated');
    }
}
