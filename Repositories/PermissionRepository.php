<?php

namespace Modules\LBCore\Repositories;


use Modules\LBCore\Entities\Permission;

class PermissionRepository extends BaseRepository {

    public function model()
    {
        return Permission::class;
    }

    /**
     * GET PERMISSION GROUPED BY MODULE
     * @return array
     */
    public function getPermissionsGroupped(){
        $permissions = [];

        $this->all()->map(function($permission) use (&$permissions){
            if (!isset($permissions[$permission->module])){
                $permissions[$permission->module] = [
                    'module' => $permission->module,
                    'permissions' => [],
                ];
            }

            $permissions[$permission->module]["permissions"][] = [
                'value' => $permission->slug,
                'label' => $permission->name
            ];
        });
        return array_values($permissions);
    }

    /**
     * GET PERMISSIONS ARRAY FOR SENTINEL TO BE STORED ON DB
     * @return array
     */

    public function getPermissionsFromGroup($permissions){
        $p = [];
        collect($permissions)->each(function ($module) use (&$p){
            foreach ($module as $permission){
                $p[$permission] = true;
            }
        });
        return $p;
    }
}
