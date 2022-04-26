<?php

namespace Modules\LBCore\Entities;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class User extends EloquentUser
{
    use HasFactory, HasApiTokens;

}
