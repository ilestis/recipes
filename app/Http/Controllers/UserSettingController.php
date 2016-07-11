<?php

namespace App\Http\Controllers;

use App\Repositories\UserSettingRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserSetting;

class UserSettingController extends Controller
{
    /**
     * @var SeasonRepository
     */
    protected $userSettings;

    protected $days;

    /**
     * RecipesController constructor.
     * @param SeasonRepository $recipes
     */
    public function __construct(UserSettingRepository $userSettings)
    {
        $this->middleware('auth');

        $this->userSettings = $userSettings;

        $this->days = [
            'monday_lunch',
            'monday_evening',
            'tuesday_lunch',
            'tuesday_evening',
            'wednesday_lunch',
            'wednesday_evening',
            'thursday_lunch',
            'thursday_evening',
            'friday_lunch',
            'friday_evening',
            'saturday_lunch',
            'saturday_evening',
            'sunday_lunch',
            'sunday_evening',
        ];
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $this->userSettings->init($request->user());
        
        $setting = $request->user()->settings;
        $days = $this->days;
        return view('settings.index', compact('setting', 'days'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        $setting = $request->user()->settings;

        $this->validate($request, [
        ]);

        foreach ($this->days as $day) {
            $setting->setAttribute($day, $request->has($day));
        }
        $setting->save();

        return redirect('settings')->with('success', 'settings.validation.update');
    }
}
