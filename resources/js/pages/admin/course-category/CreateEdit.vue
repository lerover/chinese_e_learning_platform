<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { ArrowLeft } from 'lucide-vue-next'
import CourseCategoryController from '@/actions/App/Http/Controllers/Admin/CourseCategoryController'
import { Button } from '@/components/ui/button'
import { Card, CardHeader, CardTitle, CardDescription, CardContent, CardFooter } from '@/components/ui/card'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import type { CourseCategory } from '@/types/course-category'


defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Course Categories',
                href: CourseCategoryController.index().url,
            },
        ],
    },
});

const props = defineProps<{
    courseCategory?: CourseCategory;
}>();

// Local state for the input
const form = useForm({
    name: props.courseCategory?.name || '',
})
const handleSubmit = () => {
    if (props.courseCategory) {
        form.put(CourseCategoryController.update(props.courseCategory.id).url)
    } else {
        form.post(CourseCategoryController.store().url)
    }
  // Logic to send data to your Laravel backend goes here
}

const goBack = () => {
  // Use router.back() or window.history.back()
  console.log('Navigating back')
  useForm().get(CourseCategoryController.index().url)
}
</script>

<template>
  <div class="px-4 py-10 max-w-2xl">
    
    <!-- Top-level Back Button -->
    <Button variant="ghost" class="mb-6 -ml-2" @click="goBack">
      <ArrowLeft class="mr-2 h-4 w-4" />
      Back
    </Button>

    <Card>
      <CardHeader>
        <CardTitle>Item Details</CardTitle>
        <CardDescription>Fill in the information below to update or create your record.</CardDescription>
      </CardHeader>
      
      <form @submit.prevent="handleSubmit">
        <CardContent class="max-w-xl space-y-4">
          <div class="grid w-full items-center gap-1.5">
            <Label for="item-name">Name</Label>
            <Input 
              id="item-name" 
              v-model="form.name" 
              type="text" 
              placeholder="Enter name here..." 
              required 
            />
          </div>
        </CardContent>
        
        <CardFooter class="flex justify-end gap-3 border-t pt-6">
          <Button type="button" variant="outline" @click="goBack">Cancel</Button>
          <Button type="submit" :disabled="form.processing">
            <span v-if="form.processing">Submitting...</span>
            <span v-else>{{ props.courseCategory ? 'Update' : 'Create' }}</span>
          </Button>
        </CardFooter>
      </form>
    </Card>
  </div>
</template>
