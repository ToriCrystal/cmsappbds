<?php

namespace App\Api\V1\Http\Resources\CustomerRegistrations;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AllCustomerRegistrationsResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function($customerRegistrations){
            
            return [
                'id' => $customerRegistrations->id,
                'customer_id' => $customerRegistrations->customer_id,
                    'article_id' => $customerRegistrations->article_id,
                    'status' => $customerRegistrations->status,
                    'registration_day' => $customerRegistrations->registration_day,
                    'approval_day' => $customerRegistrations->approval_day,
                    
            ];
            
        });
    }

    
}
