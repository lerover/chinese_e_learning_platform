<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CourseResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'thumbnail' => $this->thumbnail ? Storage::url($this->thumbnail) : null,
            'price_per_month' => $this->price_per_month,
            'course_data' => $this->course_data,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'course_category' => $this->whenLoaded('courseCategory', function () {
                return [
                    'id' => $this->courseCategory->id,
                    'name' => $this->courseCategory->name,
                ];
            }),
            'enrollments' => $this->whenLoaded('enrollments')
        ];
    }
}
