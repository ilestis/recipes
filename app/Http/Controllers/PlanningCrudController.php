<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Planning;

class PlanningCrudController extends Controller
{
    /**
     * @var Planning
     */
    protected $model;

    /**
     * PlanningController constructor.
     * @param Planning $model
     */
    public function __construct(Planning $model)
    {
        $this->middleware('auth');
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function create(Request $request)
    {
        $recipes = $request->user()->recipes()->orderBy('name')->lists('name', 'id');
        return view('plannings.create', compact('recipes'));
    }

    /**
     * @param Request $request
     * @param Recipe $recipe
     * @return mixed
     */
    public function show(Request $request, Planning $planning)
    {
        $this->authorize('view', $planning);
        return view('plannings.view', compact('planning'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'recipe_id' => 'required|exists:recipes,id',
            'day' => 'required',
        ]);

        $planning = $request->user()->plannings()->create($request->all());

        return redirect('home')->with('success', 'plannings.validation.create');
    }

    /**
     * @param Request $request
     * @param Recipe $recipe
     * @return mixed
     */
    public function edit(Request $request, Planning $planning)
    {
        $this->authorize('update', $planning);
        
        $recipes = $request->user()->recipes()->orderBy('name')->lists('name', 'id');
        return view('plannings.edit', compact('planning', 'recipes'));
    }

    /**
     * @param Request $request
     * @param Recipe $recipe
     * @return mixed
     */
    public function update(Request $request, Planning $planning)
    {
        $this->authorize('update', $planning);

        $this->validate($request, [
            'recipe_id' => 'required|exists:recipes,id',
            'day' => 'required',
        ]);

        $planning->fill($request->all())->save();

        return redirect('home')->with('success', 'plannings.validation.update');
    }

    /**
     * @param Request $request
     * @param Recipe $recipe
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Request $request, Planning $planning)
    {
        $this->authorize('destroy', $planning);

        $planning->delete();

        return redirect('home')->with('success', 'plannings.validation.delete');
    }
}
