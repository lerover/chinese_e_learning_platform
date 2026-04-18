<script setup lang="ts">
import { router, useForm } from '@inertiajs/vue3'
import { ImageIcon, ArrowLeft, BookMarkedIcon, Trash2 } from 'lucide-vue-next'
import { onMounted, ref } from 'vue'
import { Button } from '@/components/ui/button'
import { Card, CardHeader, CardTitle, CardContent, CardFooter } from '@/components/ui/card'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue
} from '@/components/ui/select'
import type { Course } from '@/types/course'
import type { CourseCategory } from '@/types/course-category'
import CourseController from '@/actions/App/Http/Controllers/Admin/CourseController'
import { Textarea } from '@/components/ui/textarea'

const props = defineProps<{
  course?: Course;
  courseCategories: CourseCategory[]
}>()

const form = useForm({
  title: props.course?.title ?? '',
  description: props.course?.description ?? '',
  course_category_id: props.course?.course_category_id?.toString() ?? '',
  price_per_month: props.course?.price_per_month ?? '',
  courseData: props.course?.course_data ?? [] as { id: number; data: string }[],
  thumbnail: props.course?.thumbnail ?? (null as File | null)
})

onMounted(() => {
  if(props.course){
    previewUrl.value = props.course.thumbnail ? `/storage/${props.course.thumbnail}` : null
  }
})

const previewUrl = ref<string | null>(null)

// Handle Image Selection and Preview
const handleImageChange = (event: Event) => {
  const target = event.target as HTMLInputElement
  const file = target.files?.[0]
  
  if (file) {
    form.thumbnail = file
    previewUrl.value = URL.createObjectURL(file)
  }
}

const submitting = ref(false)

const submitForm = () => {
  console.log('Form Data:', form.data())

  if(props.course){
    // Update existing course
    router.put(CourseController.update(props.course.id).url, form.data(), {
      onStart: () => {
        submitting.value = true
      },
      onFinish: () => {
        submitting.value = false
      }
    })
  }else{
    // Create new course
    form.post(CourseController.store().url, {
      onSuccess: () => {
        console.log('Course created successfully')
      },
      onError: (errors : any) => {
        console.log('Error creating course', errors)
      }
    })
  }
}

const goBack = () => {
  useForm().get(CourseController.index().url);
}

const courseData = ref('');

const createCourseDate = () => {
  form.courseData.push({ id: Date.now(), data: courseData.value });
  courseData.value = '';
}

const removeCourseData = (id: number) => {
  form.courseData = form.courseData.filter(item => item.id !== id);
}

const removeImage = () => {
  form.thumbnail = null
  previewUrl.value = null
}
</script>

<template>
  <div class="px-4 py-10 max-w-2xl">
    <Button variant="ghost" class="mb-4" @click="goBack">
      <ArrowLeft class="mr-2 h-4 w-4" /> Back
    </Button>

    <Card>
      <CardHeader>
        <CardTitle>Create New Course</CardTitle>
      </CardHeader>
      
      <CardContent class="space-y-6">
        <div class="space-y-2">
          <Label for="course_category_id">Course Category</Label>
          <Select v-model="form.course_category_id" class="w-full">
            <SelectTrigger class="w-full">
              <SelectValue placeholder="Select a category" />
            </SelectTrigger>
            <SelectContent>
              <SelectItem v-for="category in props.courseCategories" :key="category.id" :value="category.id.toString()" >
                {{ category.name }}
              </SelectItem>
            </SelectContent>
          </Select>
        </div>
        <!-- Title -->
        <div class="space-y-2">
          <Label for="title">Course Title</Label>
          <Input id="title" v-model="form.title" placeholder="e.g. Master Vue 3" />
        </div>

        <!-- Description -->
        <div class="space-y-2">
          <Label for="description">Description</Label>
          <Textarea id="description" v-model="form.description" placeholder="Describe your course content..." rows="4" />
        </div>

        <div class="space-y-2">
          <Label for="title">Price Per Month</Label>
          <Input id="title" v-model="form.price_per_month" placeholder="e.g. Master Vue 3" />
        </div>

        <!-- Thumbnail Image Box -->
        <div class="space-y-2">
          <Label>Course Thumbnail</Label>
          <div class="group relative flex flex-col items-center justify-center w-full h-48 border-2 border-dashed rounded-lg bg-muted/50 hover:bg-muted/80 transition-colors">
            
            <!-- Hidden Input -->
            <input 
              type="file" 
              accept="image/*" 
              class="absolute inset-0 opacity-0 cursor-pointer" 
              @change="handleImageChange"
            />

            <!-- Preview Image -->
            <img v-if="previewUrl" :src="previewUrl" class="absolute inset-0 w-full h-full object-cover rounded-lg" />

            <button v-if="previewUrl" class="absolute top-50% right-50% cursor-pointer p-1 opacity-0 group-hover:opacity-100 transition-opacity bg-destructive/80 rounded-full p-3" @click="removeImage">
              <Trash2 class="text-white h-8 w-8" />
            </button>

            <!-- Placeholder UI (Shown when no image) -->
            <div v-else class="flex flex-col items-center text-muted-foreground pointer-events-none">
              <ImageIcon class="h-10 w-10 mb-2" />
              <p class="text-sm font-medium">Input your course thumbnail</p>
              <p class="text-xs">PNG, JPG up to 5MB</p>
            </div>
          </div>
        </div>

        <!-- Course Data -->
        <div class="space-y-2">
          <Label for="data">Course Data (e.g. JSON or URL)</Label>
          <Input @keyup.enter="createCourseDate" v-model="courseData" id="data" placeholder="Enter after you fill data" />
          <p class="text-xs text-muted-foreground">Press Enter to create course data</p>
          <ul class="text-xs ">
            <li v-for="example in form.courseData" :key="example.id" class="flex items-center max-w-xs mt-5">
              <BookMarkedIcon class="h-4 w-4 inline mr-1" /> 
              <span class="flex-1">{{ example.data }}</span>
              <button @click="removeCourseData(example.id)" class="ml-2 text-destructive hover:text-destructive/80">
                <Trash2 class="h-4 w-4" />
              </button>
            </li>
          </ul>
        </div>
      </CardContent>

      <CardFooter class="flex justify-end gap-2 border-t pt-6">
        <Button :disabled="form.processing || submitting" @click="submitForm">
          <p v-if="form.processing || submitting">Submitting...</p>
          <p v-else>{{ props.course ? 'Update' : 'Create' }}</p>
        </Button>
      </CardFooter>
    </Card>
  </div>
</template>
