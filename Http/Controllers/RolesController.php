<?php

namespace Modules\LBCore\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\LBCore\Entities\Role;
use Modules\LBCore\Entities\User;
use Modules\LBCore\Repositories\PermissionRepository;
use Modules\LBCore\Repositories\RoleRepository;
use Modules\LBCore\Repositories\UserRepository;
use Modules\LBCore\Transformers\RoleTransformer;
use Modules\LBCore\Transformers\UserTransformer;

class RolesController extends Controller
{
    /**
     * @var RoleRepository
     */
    private $role;

    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        return RoleTransformer::collection($this->role->all());

    }

    public function roles(Request $request)
    {
        return RoleTransformer::collection($this->role->serverPaginationFilteringFor($request));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, PermissionRepository $permissionRepository)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:roles,slug',
        ]);

        $data = $request->all();

        $this->role->create($data);

        return response()->json([
            'errors' => false,
            'message' => trans('user::messages.role created'),
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Role $role)
    {
        return  (new RoleTransformer($role));
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Role $role)
    {
        $data = $request->all();

        $this->role->update($role->id, $data);

        return response()->json([
            'errors' => false,
            'message' => trans('user::messages.role updated'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Role $role)
    {
        $this->role->delete($role->id);

        return response()->json([
            'errors' => false,
            'message' => trans('user::messages.role deleted'),
        ]);
    }
}
