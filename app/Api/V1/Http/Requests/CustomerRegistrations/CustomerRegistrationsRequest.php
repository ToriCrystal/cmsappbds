<?php

namespace App\Api\V1\Http\Requests\CustomerRegistrations;

use App\Api\V1\Http\Requests\BaseRequest;

class CustomerRegistrationsRequest extends BaseRequest
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
            'customer_id' => ['required', 'int'],
            'article_id' => ['required', 'int'],
            'status' => ['required', 'int'],
            'registration_day' => ['required', 'string'],
            'approval_day' => ['required', 'string'],

        ];
    }
}
