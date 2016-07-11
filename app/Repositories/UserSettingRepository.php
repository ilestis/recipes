<?php

namespace App\Repositories;

use App\UserSetting;
use App\User;

class UserSettingRepository
{
    /**
     * @var UserSetting
     */
    protected $model;

    /**
     * UserSettingRepository constructor.
     * @param UserSetting $userSetting
     */
    public function __construct(UserSetting $userSetting)
    {
        $this->model = $userSetting;
    }

    /**
     * Init the settings table for a user who doesn't have any.
     * @param User $user
     */
    public function init(User $user)
    {
        if ($user->settings === null) {
            $settings = $this->model->create([
                'user_id' => $user->id
            ]);
        }
    }
}