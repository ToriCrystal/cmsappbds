<?php

namespace App\Admin\Http\Requests\CustomerRegistrations;

use App\Admin\Http\Requests\BaseRequest;

class CustomerRegistrationsRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'customer_id' => ['required', 'int'],
            'article_id' => ['required', 'int'],
            'status' => ['required', 'int'],
            'registration_day' => ['required', 'string'],
            'approval_day' => ['required', 'string'],

        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\CustomerRegistrations,id'],
            'customer_id' => ['required', 'int'],
            'article_id' => ['required', 'int'],
            'status' => ['required', 'int'],
            'registration_day' => ['required', 'string'],
            'approval_day' => ['required', 'string'],

        ];
    }
}
