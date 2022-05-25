<?php

namespace Modules\LBCore\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\LBCore\Repositories\PermissionRepository;

class RoleTransformer extends JsonResource
{


    public function toArray($request)
    {
        $permissionRepository = app(PermissionRepository::class);

        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'slug' => $this->resource->slug,
            'created_at' => $this->resource->created_at,
            'permissions' => $permissionRepository->getRolePermissionsGroupped($this->resource),
        ];
    }
}
