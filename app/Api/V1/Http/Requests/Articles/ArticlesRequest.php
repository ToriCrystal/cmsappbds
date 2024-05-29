<?php

namespace App\Api\V1\Http\Requests\Articles;

use App\Api\V1\Http\Requests\BaseRequest;

class ArticlesRequest extends BaseRequest
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
            'user_id' => ['required', 'integer'],
            'admin_id' => ['nullable', 'integer'],
            'code' => ['nullable', 'string'],
            'type' => ['required', 'integer'],
            'title' => ['required', 'string'],
            'slug' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'area' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'price_consent' => ['nullable', 'integer'],
            'active_status' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
            'height_floor' => ['required', 'integer'],
            'project_size' => ['required', 'integer'],
            'investor' => ['required', 'string'],
            'constructor' => ['required', 'string'],
            'hand_over' => ['nullable', 'string'],
            'deployment_time' => ['required', 'string'],
            'building_density' => ['required', 'integer'],
            'utilities' => ['required', 'string'],
            'image' => ['required', 'string'],
            'name_contact' => ['required', 'string'],
            'commission_id' => ['required', 'integer'],
            'phone_contact' => ['required', 'string'],
            'status' => ['nullable', 'integer'],
            'active_days' => ['nullable', 'integer'],
            'time_start' => ['nullable', 'string'],
            'district_id' => ['required', 'integer'],
            'ward_id' => ['required', 'integer'],
            'province_id' => ['required', 'integer'],
            'area_id' => ['required', 'integer'],
            'houseType_id' => ['required', 'integer'],
            'houseType_id' => ['nullable', 'integer'],
            'operative_management' => ['nullable', 'string'],
            'broker_id' => ['nullable', 'array'],
            'broker_id.*' => ['integer'],
            'article_status' => ['nullable', 'integer'],
        ];
    }
}
