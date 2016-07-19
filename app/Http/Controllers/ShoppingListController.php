<?php

namespace App\Http\Controllers;

use App\Repositories\PlanningRepository;
use App\Generators\PlanningGenerator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Exception;

class ShoppingListController extends Controller
{
    /**
     * @var PlanningRepository
     */
    protected $repository;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PlanningRepository $repository)
    {
        $this->middleware(['auth', 'user.settings', 'recipes']);
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
        return view('shopping_list', compact('plannings'));
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
