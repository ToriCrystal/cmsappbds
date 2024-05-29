<?php

namespace App\Admin\Http\Requests\Articles;

use App\Admin\Http\Requests\BaseRequest;

class ArticlesRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'articles.admin_id' => ['nullable', 'integer'],
            'articles.code' => ['nullable', 'string'],
            'articles.type' => ['required', 'integer'],
            'articles.title' => ['required', 'string'],
            'articles.slug' => ['nullable', 'string'],
            'articles.description' => ['nullable', 'string'],
            'articles.area' => ['required', 'string'],
            'articles.price' => ['required', 'integer'],
            'articles.price_consent' => ['required', 'integer'],
            'articles.quantity' => ['required', 'integer'],
            'articles.height_floor' => ['nullable', 'integer'],
            'articles.project_size' => ['required', 'integer'],
            'articles.investor' => ['nullable', 'string'],
            'articles.constructor' => ['nullable', 'string'],
            'articles.hand_over' => ['nullable', 'string'],
            'articles.deployment_time' => ['nullable', 'string'],
            'articles.operative_management' => ['nullable', 'string'],
            'articles.building_density' => ['nullable', 'integer'],
            'articles.utilities' => ['nullable', 'string'],
            'articles.image' => ['required'],
            'articles.name_contact' => ['nullable', 'string'],
            'articles.phone_contact' => ['required', 'string'],
            'articles.status' => ['required', 'integer'],
            'articles.active_days' => ['nullable', 'integer'],
            'articles.time_start' => ['nullable', 'string'],
            'articles.district_id' => ['required', 'integer'],
            'articles.ward_id' => ['required', 'integer'],
            'articles.province_id' => ['required', 'integer'],
            'articles.commission_id' => ['required', 'integer'],
            'articles.area_id' => ['nullable', 'integer'],
            'articles.houseType_id' => ['nullable', 'array'],
            'articles.houseType_id.*' => ['integer'],
            'articles.broker_id' => ['nullable', 'array'],
            'articles.broker_id.*' => ['integer'],
            'articles.active_status' => ['required', 'integer'],
        ];
    }

    protected function methodPut()
    {
        return [
            'articles.id' => ['required', 'exists:App\Models\Articles,id'],
            'articles.user_id' => ['nullable', 'integer'],
            'articles.admin_id' => ['nullable', 'integer'],
            'articles.code' => ['nullable', 'string'],
            'articles.type' => ['required', 'integer'],
            'articles.title' => ['required', 'string'],
            'articles.slug' => ['nullable', 'string'],
            'articles.description' => ['nullable', 'string'],
            'articles.area' => ['required', 'string'],
            'articles.price' => ['required', 'integer'],
            'articles.price_consent' => ['required', 'integer'],
            'articles.quantity' => ['required', 'integer'],
            'articles.height_floor' => ['nullable', 'integer'],
            'articles.project_size' => ['required', 'integer'],
            'articles.investor' => ['nullable', 'string'],
            'articles.constructor' => ['nullable', 'string'],
            'articles.hand_over' => ['nullable', 'string'],
            'articles.operative_management' => ['nullable', 'string'],
            'articles.deployment_time' => ['nullable', 'string'],
            'articles.building_density' => ['nullable', 'integer'],
            'articles.utilities' => ['nullable', 'string'],
            'articles.image' => ['required'],
            'articles.name_contact' => ['nullable', 'string'],
            'articles.phone_contact' => ['required', 'string'],
            'articles.status' => ['required', 'integer'],
            'articles.active_days' => ['nullable', 'integer'],
            'articles.time_start' => ['nullable', 'string'],
            'articles.district_id' => ['required', 'integer'],
            'articles.ward_id' => ['required', 'integer'],
            'articles.province_id' => ['required', 'integer'],
            'articles.commission_id' => ['nullable', 'integer'],
            'articles.area_id' => ['required', 'integer'],
            'articles.houseType_id' => ['nullable', 'array'],
            'articles.houseType_id.*' => ['integer'],            
            'articles.active_status' => ['required', 'integer'],
            'articles.article_status' => ['required', 'integer'],
        ];
    }
}
