<?php

namespace App\Api\V1\Http\Requests\Customers;

use App\Api\V1\Http\Requests\BaseRequest;

class CustomersRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodGet()
    {
        return [
            'page' => ['nullable', 'integer', 'min:1'],
            'limit' => ['nullable', 'integer', 'min:1']
        ];
    }
	
	/**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'broker_id' => ['required', 'int'],
                    'customer_name' => ['required', 'string'],
                    'phone' => ['nullable', 'string'],
                    'refferal_code' => ['nullable', 'string'],
                    'needs' => ['nullable', 'string'],
                    'status' => ['nullable', 'int'],
                    
        ];
    }
}