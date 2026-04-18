<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use App\Models\CourseVideo;

class ProcessVideoUpload implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    // ... app/Jobs/ProcessVideoUpload.php
    public function __construct(
        protected string $courseId,
        protected string $title,
        protected string $description,
        protected string $duration,
        protected string $tempPath,
        protected string $thumbnailPath,
        protected string $type
    ) {}

    public function handle(): void
    {
        // Move from temporary storage to permanent destination
        Storage::disk('public')->move(
            $this->tempPath, 
            'course-videos/' . basename($this->tempPath)
        );
        
        // TODO: Create course video record in database
        CourseVideo::create([
            'course_id' => $this->courseId,
            'title' => $this->title,
            'description' => $this->description,
            'duration' => $this->duration,
            'video_url' => $this->tempPath,
            'thumbnail' => $this->thumbnailPath,
            'type' => $this->type,
        ]);
    }

}
