<script setup lang="ts">
import { router, useForm } from '@inertiajs/vue3'
import { ImageIcon, VideoIcon, UploadCloud, Trash2, ArrowLeft } from 'lucide-vue-next'
import { onMounted, ref } from 'vue'
import { Button } from '@/components/ui/button'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import { Input } from '@/components/ui/input'   
import { Label } from '@/components/ui/label'
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue
} from '@/components/ui/select'
import type { CourseVideo } from '@/types/course-video'
import CourseVideoController from '@/actions/App/Http/Controllers/Admin/CourseVideoController'
import { Textarea } from '@/components/ui/textarea'


const imagePreview = ref<string | null>(null)
const videoPreview = ref<string | null>(null)

const props = defineProps<{
  courseId: number,
  courseVideo?: CourseVideo
}>()
// Handle Image Preview
const handleImageChange = (event: Event) => {
  const file = (event.target as HTMLInputElement).files?.[0]
  
  if (file) {
    imagePreview.value = URL.createObjectURL(file)
    form.thumbnail = file
  }
}

// Handle Video Preview
const handleVideoChange = (event: Event) => {
  const file = (event.target as HTMLInputElement).files?.[0]
  
  if (file) {
    videoPreview.value = URL.createObjectURL(file)
    form.video = file
  }
}


// Remove Image
const removeImage = () => {
  imagePreview.value = null
}

// Remove Video
const removeVideo = () => {
  videoPreview.value = null
}

const goBack = () => {
  window.history.back()
}

const form = useForm({
  title: props.courseVideo?.title || '',
  description: props.courseVideo?.description || '',
  duration: props.courseVideo?.duration || '',
  thumbnail: null as File | null,
  video: null as File | null,
  type: props.courseVideo?.type || '',
})

const submit = () => {
  if (props.courseVideo) {
    router.put(CourseVideoController.update({ course: props.courseId.toString(), video: props.courseVideo.id }).url, form.data())
  } else {
    form.post(CourseVideoController.store(props.courseId.toString()).url)
  }
}


onMounted(() => {
  if (props.courseVideo) {
    imagePreview.value = `/storage/${props.courseVideo.thumbnail}`
    videoPreview.value = `/storage/${props.courseVideo.video_url}`
  }
})
</script>

<template>
  <div class=" max-w-2xl px-4 py-10">
    <Button variant="ghost" class="mb-4" @click="goBack">
      <ArrowLeft class="mr-2 h-4 w-4" /> Back
    </Button>

    <Card>
      <CardHeader>
        <CardTitle>Create New Video</CardTitle>
      </CardHeader>
      <CardContent class="space-y-6">
        <div class="space-y-2">
          <Label for="course_category_id">Course video type</Label>
          <Select v-model="form.type" class="w-full">
            <SelectTrigger class="w-full">
              <SelectValue placeholder="Select a category" />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value="free">Free</SelectItem>
              <SelectItem value="premium">Premium</SelectItem>
            </SelectContent>
          </Select>
        </div>

        <!-- Title & Description -->
        <div class="space-y-2">
          <Label for="title">Title</Label>
          <Input id="title" v-model="form.title" placeholder="Enter video title" />
        </div>

        <div class="space-y-2">
          <Label for="desc">Description</Label>
          <Textarea id="desc" v-model="form.description" placeholder="What is this video about?" />
        </div>

        <!-- Thumbnail Upload with Preview -->
        <div class="space-y-2">
          <Label>Video Thumbnail</Label>
          <div class="h-64 group border-2 border-dashed rounded-lg p-4 text-center cursor-pointer hover:bg-muted/50 transition relative">
            <input type="file" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" @change="handleImageChange" />

            <div v-if="!imagePreview" class="flex flex-col items-center gap-2 py-4">
              <ImageIcon class="w-8 h-8 text-muted-foreground" />
              <p class="text-sm text-muted-foreground">Enter your video thumbnail</p>
            </div>
            <img v-else :src="imagePreview" class="w-full h-full object-cover rounded-md" />
            <button v-if="imagePreview" class="absolute top-5 right-5 cursor-pointer p-2 opacity-0 group-hover:opacity-100 transition-opacity bg-destructive/80 rounded-full" @click="removeImage">
              <Trash2 class="text-white h-4 w-4" />
            </button>
          </div>
        </div>

        <!-- Duration & Video Upload with Preview -->
        <div class="grid grid-cols-1 gap-4">
          <div class="space-y-2">
            <Label for="duration">Duration</Label>
            <Input id="duration" v-model="form.duration" placeholder="e.g. 10:30" />
          </div>
          
          <div class="space-y-2">
            <Label>Video File</Label>
            <div class="group border-2 border-dashed rounded-lg  text-center relative h-[360px] flex items-center justify-center">
              <input v-if="!videoPreview" type="file" accept="video/*" class="absolute inset-0 opacity-0 cursor-pointer" @change="handleVideoChange" />
              <div v-if="!videoPreview" class="flex flex-col items-center gap-1">
                <VideoIcon class="w-6 h-6 text-muted-foreground" />
                <p class="text-xs text-muted-foreground">Select video</p>
              </div>
              <!-- <video v-else :src="videoPreview" class="h-full w-full object-cover rounded" controls /> -->
              
              <video-player v-if="videoPreview" class="h-[360px]">
                <video-minimal-skin >
                  <video :src="videoPreview" playsinline class="h-[360px]"></video>
                </video-minimal-skin>
              </video-player>
              <button v-if="videoPreview" class="absolute top-5 right-5 cursor-pointer opacity-0 group-hover:opacity-100 transition-opacity bg-destructive/80 rounded-full p-2" @click="removeVideo">
                <Trash2 class="text-white h-4 w-4" />
              </button>
            </div>
          </div>
        </div>

        <Button @click="submit()" class="w-full bg-primary text-primary-foreground">
          <UploadCloud class="mr-2 w-4 h-4" /> Publish Video
        </Button>
      </CardContent>
    </Card>
  </div>
</template>

