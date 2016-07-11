<?php

namespace App\Http\Controllers;

use App\Repositories\SeasonRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Season;

class SeasonController extends Controller
{
    /**
     * @var SeasonRepository
     */
    protected $seasons;

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
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        Season::create($request->all());

        return redirect('season');
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
