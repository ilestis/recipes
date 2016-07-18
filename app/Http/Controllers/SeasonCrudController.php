<?php

namespace App\Http\Controllers;

use App\Repositories\SeasonRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Season;

class SeasonCrudController extends Controller
{
    /**
     * @var SeasonRepository
     */
    protected $seasons;
    
    protected $validationRules = [
        'name' => 'required|max:255'
    ];

    /**
     * RecipesController constructor.
     * @param SeasonRepository $recipes
     */
    public function __construct(SeasonRepository $seasons)
    {
        $this->middleware('auth');

        $this->seasons = $seasons;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $seasons = $this->seasons->all();
        return view('seasons.index', compact('seasons'));
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('seasons.create');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->validationRules);

        Season::create($request->all());

        return redirect('season')->with('success', 'seasons.validations.create');
    }
    /**
     * @param Request $request
     * @param Recipe $recipe
     * @return mixed
     */
    public function edit(Request $request, Season $season)
    {
        $this->authorize('update', $season);
        return view('seasons.edit', compact('season'));
    }

    /**
     * @param Request $request
     * @param Recipe $recipe
     * @return mixed
     */
    public function update(Request $request, Season $season)
    {
        $this->authorize('update', $season);
        $this->validate($request, $this->validationRules);
        $season->fill($request->all())->save();

        return redirect('season')->with('success', 'seasons.validations.update');
    }

    /**
     * @param Request $request
     * @param Season $season
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Request $request, Season $season)
    {
        $this->authorize('destroy', $season);

        $season->delete();

        return redirect('season');
    }
}
