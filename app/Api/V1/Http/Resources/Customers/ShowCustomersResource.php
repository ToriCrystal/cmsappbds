<?php

namespace App\Api\V1\Http\Resources\Customers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Api\V1\Repositories\Customers\CustomersRepositoryInterface;

class ShowCustomersResource extends JsonResource
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
            'broker_id' => $this ->broker_id,
                    'customer_name' => $this ->customer_name,
                    'phone' => $this ->phone,
                    'refferal_code' => $this ->refferal_code,
                    'needs' => $this ->needs,
                    'status' => $this ->status,
                    
        ];
    }
}
