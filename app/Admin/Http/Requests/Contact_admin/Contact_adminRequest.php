<?php

namespace App\Admin\Http\Requests\Contact_admin;

use App\Admin\Http\Requests\BaseRequest;

class Contact_adminRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'admin_id' => ['required', 'int'],
                    'fullname' => ['required', 'string'],
                    'phone' => ['required', 'string'],
                    'referral_code' => ['required', 'string'],
                    'status' => ['nullable', 'int'],
                    
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Contact_admin,id'],
            'admin_id' => ['required', 'int'],
                    'fullname' => ['required', 'string'],
                    'phone' => ['required', 'string'],
                    'referral_code' => ['required', 'string'],
                    'status' => ['nullable', 'int'],
                    
        ];
    }
}