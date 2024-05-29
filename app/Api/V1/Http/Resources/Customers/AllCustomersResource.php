<?php

namespace App\Api\V1\Http\Resources\Customers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AllCustomersResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function($customers){
            
            return [
                'id' => $customers->id,
                'broker_id' => $customers->broker_id,
                    'customer_name' => $customers->customer_name,
                    'phone' => $customers->phone,
                    'refferal_code' => $customers->refferal_code,
                    'needs' => $customers->needs,
                    'status' => $customers->status,
                    
            ];
            
        });
    }

    
}
