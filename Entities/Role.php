<?php

namespace Modules\LBCore\Entities;

use Cartalyst\Sentinel\Roles\EloquentRole;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laracasts\Presenter\PresentableTrait;
use Laravel\Sanctum\HasApiTokens;
use Modules\LBCore\Database\Factories\UserFactory;
use Modules\LBCore\Presenters\UserPresenter;

class Role extends EloquentRole
{

}
