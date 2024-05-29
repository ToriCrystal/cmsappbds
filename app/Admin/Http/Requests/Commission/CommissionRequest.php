<?php

namespace App\Admin\Http\Requests\Commission;

use App\Admin\Http\Requests\BaseRequest;

class CommissionRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'indirect_commission_default' => ['required', 'integer'],
            'direct_commission_default' => ['required', 'integer'],

        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Commission,id'],
            'indirect_commission_default' => ['required', 'integer'],
            'direct_commission_default' => ['required', 'integer'],
        ];
    }
}
