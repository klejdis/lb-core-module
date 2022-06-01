<?php

namespace Modules\LBCore\Entities;

use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laracasts\Presenter\PresentableTrait;
use Laravel\Sanctum\HasApiTokens;
use Modules\LBCore\Database\Factories\UserFactory;
use Modules\LBCore\Presenters\UserPresenter;

class User extends EloquentUser
{
    use HasFactory, HasApiTokens, PresentableTrait;

    protected $presenter = UserPresenter::class;


    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<static>
     */
    protected static function newFactory()
    {
        return UserFactory::new();
    }

    /**
     * @inheritdoc
     */
    public function isActivated()
    {
        if (is_integer($this->getKey()) && Activation::completed($this)) {
            return true;
        }

        return false;
    }

    public function getRolesPermissions(){
        $permissions = [];

        foreach ($this->getRoles() as $role){

            $permissions = array_merge($permissions, $role->getPermissions() );
        }

        return $permissions;
    }

}
