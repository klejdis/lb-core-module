<?php

namespace Modules\LBCore\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class UserTransformer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'first_name' => $this->resource->first_name,
            'last_name' => $this->resource->last_name,
            'fullname' => $this->resource->present()->fullname,
            'email' => $this->resource->email,
            'created_at' => $this->resource->created_at,
            'roles' => $this->resource->roles->pluck('id'),
            'urls' => [
                'delete_url' => route('api.users.destroy', $this->resource->id),
            ],
        ];
    }
}
