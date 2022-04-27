<?php

namespace Modules\LBCore\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\LBCore\Entities\User;
use Modules\LBCore\Repositories\UserRepository;
use Modules\LBCore\Transformers\UserTransformer;

class UsersController extends Controller
{

    /**
     * @var UserRepository
     */
    private $user;
    /**
     * @var PermissionManager
     */
    private $permissions;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        return UserTransformer::collection($this->user->serverPaginationFilteringFor($request));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:3|confirmed',
        ]);

        $data = $request->all();

        $this->user->createWithRoles(
            $data,
            $request->get('roles',[]),
            $request->get('is_activated',false)
        );

        return response()->json([
            'errors' => false,
            'message' => trans('user::messages.user created'),
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(User $user)
    {
        return $user;
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();

        $this->user->updateAndSyncRoles($user->id, $data, $request->get('roles'));

        return response()->json([
            'errors' => false,
            'message' => trans('user::messages.user updated'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(User $user)
    {
        $this->user->delete($user->id);

        return response()->json([
            'errors' => false,
            'message' => trans('user::messages.user deleted'),
        ]);
    }
}
