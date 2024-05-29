<?php

namespace App\Api\V1\Http\Resources\Articles;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AllArticlesResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($articles) {
            return [
                'id' => $articles->id,
                'user_id' => $articles->user_id,
                'admin_id' => $articles->admin_id,
                'code' => $articles->code,
                'type' => $articles->type,
                'title' => $articles->title,
                'slug' => $articles->slug,
                'description' => $articles->description,
                'area' => $articles->area,
                'price' => $articles->price,
                'price_consent' => $articles->price_consent,
                'quantity' => $articles->quantity,
                'height_floor' => $articles->height_floor,
                'project_size' => $articles->project_size,
                'investor' => $articles->investor,
                'constructor' => $articles->constructor,
                'hand_over' => $articles->hand_over,
                'deployment_time' => $articles->deployment_time,
                'building_density' => $articles->building_density,
                'utilities' => $articles->utilities,
                'image' => $articles->image,
                'name_contact' => $articles->name_contact,
                'phone_contact' => $articles->phone_contact,
                'status' => $articles->status,
                'active_days' => $articles->active_days,
                'time_start' => $articles->time_start,
                'active_status' => $articles->active_status,
                'district_id' => $articles->district_id,
                'operative_management' => $articles->operative_management,
                'ward_id' => $articles->ward_id,
                'province_id' => $articles->province_id,
                'area_id' => $articles->area_id,
                'houseType_id' => $articles->houseType_id,
                'broker_id' => $articles->broker_id,
            ];
        });
    }
}
