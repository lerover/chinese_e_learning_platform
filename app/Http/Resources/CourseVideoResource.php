<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CourseVideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'course_id' => $this->course_id,
            'title' => $this->title,
            'description' => $this->description,
            'thumbnail' => $this->thumbnail ? Storage::url($this->thumbnail) : null,
            'video' => $this->video_url ? Storage::url($this->video_url) : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'duration' => $this->duration,
            'type' => $this->type,

            'course' => $this->whenLoaded('course', function () {
                return [
                    'id' => $this->course->id,
                    'title' => $this->course->title,
                ];
            }),
        ];
    }
}
