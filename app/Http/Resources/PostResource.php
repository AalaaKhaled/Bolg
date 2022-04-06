<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            //i can change the key to match mobile app 
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            // 'user' => [
            //     'id'=>$this->user ? $this->user->id : 'user not found',
            //     'name'=>$this->user ? $this->user->name : 'user not found',
            // ]
            'user' => new UserResource($this->user) ,
        ];
    }
}
