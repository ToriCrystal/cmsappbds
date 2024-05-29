<?php

namespace App\Admin\Http\Requests\Notification;

use App\Admin\Http\Requests\BaseRequest;

class NotificationRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'user_id' => ['required'],
                    'title' => ['required','string'],
                    'content' => ['required','string'],
                    'admin_id' => ['required'],
                    'status' => ['required', 'int'],

        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Notification,id'],
            'user_id' => ['required'],
                    'title' => ['required','string' ],
                    'content' => ['required','string'],
                    'admin_id' => ['required'],
                    'status' => ['required', 'int'],

        ];
    }
    public function prepareForValidation()
    {
        if ($this->isMethod('POST')) {
            $this->merge([
                'admin_id' => auth()->guard('admin')->user()->id
            ]);
        }
    }
}
