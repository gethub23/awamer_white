<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data                   =     $this->data;
        return [
            'id'                =>    (string)    $this['id'],
            'title'             =>    (string)    $data["title_".lang()]   ,
            'body'              =>    (string)    $data["body_" .lang()]   ,
            'data'              =>    $data['data'] ,
            'type'              =>    (string)    $data['type'],
            'time'              =>    date('d M Y h:s A', strtotime($this->created_at)) 
        ];
    }
}
