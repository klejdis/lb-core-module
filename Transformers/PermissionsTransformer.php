<?php

namespace Modules\LBCore\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionsTransformer extends JsonResource
{
    public function toArray($request)
    {
        return $this->resource;
    }
}
