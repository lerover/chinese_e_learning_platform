<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class EnrollmentResource extends JsonResource
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
            'user_id' => $this->user_id,
            'course_id' => $this->course_id,
            'status' => $this->status,
            'payment_reference' => Storage::url($this->payment_reference),
            'approved_at' => $this->approved_at,
            'rejected_at' => $this->rejected_at,

            'user' => $this->whenLoaded('user'),
            'course' => $this->whenLoaded('course'),
            
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
