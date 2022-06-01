<?php

namespace Modules\LBCore\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\LBCore\Entities\Role;
use Modules\LBCore\Entities\User;
use Modules\LBCore\Repositories\PermissionRepository;
use Modules\LBCore\Repositories\RoleRepository;
use Modules\LBCore\Repositories\UserRepository;
use Modules\LBCore\Transformers\PermissionsTransformer;
use Modules\LBCore\Transformers\RoleTransformer;
use Modules\LBCore\Transformers\UserTransformer;

class PermissionsController extends Controller
{
    /**
     * @var RoleRepository
     */
    private $repository;

    public function __construct(PermissionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        return (
            new PermissionsTransformer(  $this->repository->getPermissionsGroupped() )
        );

    }

    public function userPermissions(Request $request)
    {
        return (
            new PermissionsTransformer( Auth::user()->getRolesPermissions() )
        );

    }

}
