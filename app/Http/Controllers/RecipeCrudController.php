<?php

namespace App\Http\Controllers;

use App\Repositories\RecipeRepository;
use App\Repositories\SeasonRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Recipe;

class RecipeCrudController extends Controller
{
    /**
     * @var RecipeRepository
     */
    protected $recipes;

    /**
     * @var SeasonRepository
     */
    protected $seasons;

    /**
     * RecipesController constructor.
     * @param RecipeRepository $recipes
     */
    public function __construct(RecipeRepository $recipes, SeasonRepository $seasons)
    {
        $this->middleware('auth');

        $this->recipes = $recipes;
        $this->seasons = $seasons;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $recipes = $this->recipes->forUser($request->user());

        return view('recipes.index', compact('recipes'));
    }

    /**
     * @return mixed
     */
    public function create()
    {
        $seasons = $this->seasons->all();
        return view('recipes.create', compact('seasons'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'seasons' => 'required',
        ]);

        $recipe = $request->user()->recipes()->create($request->all());
        $recipe->seasons()->sync($request['seasons']);

        return redirect('recipe')->with('success', 'recipes.validation.create');
    }

    /**
     * @param Request $request
     * @param Recipe $recipe
     * @return mixed
     */
    public function edit(Request $request, Recipe $recipe)
    {
        $this->authorize('update', $recipe);
        $seasons = $this->seasons->all();
        return view('recipes.edit', compact('recipe', 'seasons'));
    }

    /**
     * @param Request $request
     * @param Recipe $recipe
     * @return mixed
     */
    public function update(Request $request, Recipe $recipe)
    {
        $this->authorize('update', $recipe);

        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'seasons' => 'required',
        ]);

        $recipe->fill($request->all())->save();
        $recipe->seasons()->sync($request['seasons']);

        return redirect('recipe')->with('success', 'recipes.validation.update');
    }

    /**
     * @param Request $request
     * @param Recipe $recipe
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Request $request, Recipe $recipe)
    {
        $this->authorize('destroy', $recipe);

        if (count($recipe->plannings) > 0) {
            return redirect('recipe')->with('error', 'recipes.errors.delete');
        }
        $recipe->delete();

        return redirect('recipe')->with('success', 'recipes.validation.delete');
    }
}
