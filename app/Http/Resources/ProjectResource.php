<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,

            // Computed Property: Count related tasks without loading them all
            // (Tip: In your Service, use ->withCount('tasks') for performance)
            'tasks_count' => $this->whenCounted('tasks'),

            // Format date to be human-readable
            'created_at' => $this->created_at->format('d M Y'),

            // You can optionally include the tasks here if needed
            // 'tasks' => TaskResource::collection($this->whenLoaded('tasks')),
        ];
    }
}
