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
        return [
            'post_id' => $this->id,
            'post_title' => $this->title,
            'post_content' => $this->content,
            'post_type' => $this->type,
            'author_id' => $this->user_id,
            'category_id' => $this->category_id,
            'post_metadata' => $this->metadata,
            'updated_at' => $this->updated_at,
            'category' => new CategoryResource($this->category),
            'author' => new UserResource($this->user),
            'images' => ImageResource::collection($this->images),
            'tags' => TagResource::collection($this->tags),
            'comments' => CommentResource::collection($this->comments),
        ];
    }
}
