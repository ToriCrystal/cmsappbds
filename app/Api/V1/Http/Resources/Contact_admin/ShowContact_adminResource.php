<?php

namespace App\Api\V1\Http\Resources\Contact_admin;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Api\V1\Repositories\Contact_admin\Contact_adminRepositoryInterface;

class ShowContact_adminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'admin_id' => $this ->admin_id,
                    'fullname' => $this ->fullname,
                    'phone' => $this ->phone,
                    'referral_code' => $this ->referral_code,
                    'status' => $this ->status,
                    
        ];
    }
}
