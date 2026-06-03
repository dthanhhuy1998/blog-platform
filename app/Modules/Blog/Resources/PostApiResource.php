<?php

namespace App\Modules\Blog\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use Storage;

class PostApiResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'summary' => $this->summary,
            'content' => $this->content,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keyword' => $this->meta_keyword,
            'image' => !empty($this->image) ? Storage::disk('public')->url($this->image) : null,
            'created_by' => $this->createdBy?->lastname .' '. $this->createdBy?->firstname,
            'updated_by' => $this->updatedBy?->lastname .' '. $this->updatedBy?->firstname,
            'created_at' => $this->created_at->format('d/m/Y H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y H:i:s'),
        ];
    }
}