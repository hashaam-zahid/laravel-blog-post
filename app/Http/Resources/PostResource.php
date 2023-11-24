<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
    return [
     'title' => $this->title,
     'content' => $this->content,
     'photo' => $this->photo,
     'user_id' => $this->user_id

    ];

    }
    public function with($request)
    {
        return [
        'version'=>'1.0.0',
        'author_url'=>url('post')
        ];
    }
}
