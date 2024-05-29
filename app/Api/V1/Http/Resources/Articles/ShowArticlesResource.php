<?php

namespace App\Api\V1\Http\Resources\Articles;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Api\V1\Repositories\Articles\ArticlesRepositoryInterface;

class ShowArticlesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'admin_id' => $this->admin_id,
            'code' => $this->code,
            'type' => $this->type,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'area' => $this->area,
            'price' => $this->price,
            'price_consent' => $this->price_consent,
            'quantity' => $this->quantity,
            'height_floor' => $this->height_floor,
            'project_size' => $this->project_size,
            'investor' => $this->investor,
            'constructor' => $this->constructor,
            'operative_management' => $this->operative_management,
            'hand_over' => $this->hand_over,
            'deployment_time' => $this->deployment_time,
            'building_density' => $this->building_density,
            'active_status' => $this->active_status,
            'utilities' => $this->utilities,
            'image' => $this->image,
            'name_contact' => $this->name_contact,
            'phone_contact' => $this->phone_contact,
            'status' => $this->status,
            'active_days' => $this->active_days,
            'time_start' => $this->time_start,
            'district_id' => $this->district_id,
            'ward_id' => $this->ward_id,
            'province_id' => $this->province_id,
            'area_id' => $this->area_id,
            'houseType_id' => $this->houseType_id,
            'broker_id' => $this->broker_id,
        ];
    }
}
