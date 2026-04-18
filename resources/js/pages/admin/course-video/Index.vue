<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3'
import { Crown, Plus, Search } from 'lucide-vue-next'
import { ref, watch } from 'vue'
import { Button } from '@/components/ui/button'
import { Card, CardContent, CardDescription, CardFooter } from '@/components/ui/card'
import {
  Dialog,
  DialogContent,
  DialogTrigger,
  DialogHeader,
  DialogTitle,
} from '@/components/ui/dialog'
import Input from '@/components/ui/input/Input.vue'
import type { CourseVideo } from '@/types/course-video'
import type { PaginatorResource } from '@/types/paginator'
import CourseVideoController from '@/actions/App/Http/Controllers/Admin/CourseVideoController'


const props =defineProps<{
    courseId: number;
    courseVideos: PaginatorResource<CourseVideo>;
}>()


const q = ref(decodeURIComponent(window.location.search.split('q=')[1] || ''));


watch(() => q.value, () => {
    setTimeout(() => {
        useForm({ q: q.value }).get(CourseVideoController.index(props.courseId).url);
    }, 300);
});


const create = () => {
    useForm({}).get(CourseVideoController.create(props.courseId).url);
};

const edit = (id: number) => {
    useForm({}).get(CourseVideoController.edit({course: props.courseId, video: id}).url);
};

const destroy = (id: number) => {
    useForm({}).delete(CourseVideoController.destroy({course: 1, video: id}).url);
};
</script>

<template>
  <Head title="Course Videos" />

  <div class="px-4 py-10">
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
      <div class="relative w-full max-w-sm">
          <Search class="absolute left-2.5 top-2.5 h-4 w-4 text-muted-foreground" />
          <Input
          v-model="q"
          type="search" 
          placeholder="Search items..." 
          class="pl-9 w-full bg-background" 
          />
      </div>
      
      <Button @click="create()" class="w-full sm:w-auto flex items-center gap-2">
          <Plus class="h-4 w-4" />
          Create Item
      </Button>
  </div>
  
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 my-4">
    
    <Card v-for="video in courseVideos.data" :key="video.id" class="relative my-4">
      <img :src="video.thumbnail" class="rounded-t-lg w-full h-48 object-cover" />
      <Crown v-if="video.type === 'premium'" class="absolute -top-4 right-2 h-6 w-6 text-yellow-500" />
      <CardContent class="p-4">
        <h3 class="font-semibold">{{ video.title }}</h3>
        <p class="text-sm text-muted-foreground line-clamp-2">{{ video.description }}</p>
        <CardDescription>Duration: {{ video.duration }}</CardDescription>
      </CardContent>
      <CardFooter class="grid grid-cols-1 gap-2">
        <!-- Modal Logic -->
        <Dialog class="bg-transparent">
          <DialogTrigger as-child>
            <Button class="w-full">Watch Now</Button>
          </DialogTrigger>
          <DialogContent class="sm:max-w-[800px] p-0">
            <DialogHeader class="px-4 pt-3">
              <DialogTitle>Video Player</DialogTitle>
            </DialogHeader>
            <!-- <AspectRatio :ratio="16 / 9">
               {{ video }}
              <video-player v-if="video.video" class="h-[360px]">
                <video-minimal-skin >
                  <video :src="video.video" playsinline class="h-[360px]"></video>
                </video-minimal-skin>
              </video-player>
            </AspectRatio> -->
            <video-player v-if="video.video" class="h-[360px]">
                <video-minimal-skin >
                  <video :src="video.video" playsinline class="h-[360px]"></video>
                </video-minimal-skin>
              </video-player>
          </DialogContent>
        </Dialog>

        <div class="grid grid-cols-2 gap-2">
          <Button @click="edit(video.id)" class="w-full" variant="outline">Edit</Button>
          <Button @click="destroy(video.id)" class="w-full" variant="destructive">Delete</Button>
        </div>

      </CardFooter>
    </Card>
  </div>
  </div>
</template>
