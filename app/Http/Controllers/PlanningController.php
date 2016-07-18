<?php

namespace App\Http\Controllers;

use App\Repositories\PlanningRepository;
use App\Generators\PlanningGenerator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Exception;

class PlanningController extends Controller
{
    /**
     * @var PlanningRepository
     */
    protected $repository;
    
    /**
     * @var PlanningGenerator
     */
    protected $generator;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PlanningRepository $repository, PlanningGenerator $generator)
    {
        $this->middleware(['auth', 'user.settings', 'recipes']);
        $this->repository = $repository;;
        $this->generator = $generator;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $plannings = $this->repository->forUser($request->user());
        return view('plannings.index', compact('plannings'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function generate(Request $request)
    {
        try {
            $this->generator->generate($request->user());
            return redirect('home')->with('success', 'plannings.validations.generated');
        }
        catch(Exception $e) {
            return redirect('home')->with('error', 'plannings.errors.' . $e->getMessage());
        }
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function history(Request $request)
    {
        $plannings = $this->repository->passedForUser($request->user());
        $history = true;
        return view('plannings.history', compact('plannings', 'history'));
    }
}
