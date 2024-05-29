<?php

namespace App\Admin\Http\Requests\Customers;

use App\Admin\Http\Requests\BaseRequest;

class CustomersRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'broker_id' => ['required', 'integer'],
            'customer_name' => ['required', 'string'],
            'phone' => ['nullable', 'string'],
            'refferal_code' => ['nullable', 'string'],
            'needs' => ['nullable', 'string'],
            'status' => ['nullable', 'int'],

        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Customers,id'],
            'broker_id' => ['required', 'integer'],
            'customer_name' => ['required', 'string'],
            'phone' => ['nullable', 'string'],
            'refferal_code' => ['nullable', 'string'],
            'needs' => ['nullable', 'string'],
            'status' => ['nullable', 'integer'],

        ];
    }
}
