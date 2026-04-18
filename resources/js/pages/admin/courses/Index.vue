<template>
    <Head title="Course Categories" />

    <div class="w-full mx-auto py-10 px-4 space-y-8">
    
        <!-- Top Section: Search and Create -->
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

        <!-- Bottom Section: Data Table -->
        <Card>
        <CardContent class="p-0">
            <Table>
            <TableHeader>
                <TableRow>
                    <TableHead class="w-[100px]">ID</TableHead>
                    <TableHead>Course Category</TableHead>
                    <TableHead>Title</TableHead>
                    <TableHead>Description</TableHead>
                    <TableHead>Price Per Month</TableHead>
                    <TableHead>Thumbnail</TableHead>
                    <TableHead>Course Data</TableHead>
                </TableRow>
            </TableHeader>
            <TableBody>
                <TableRow v-for="(item, index) in courses.data" :key="index">
                <TableCell class="font-medium">{{ index + 1 }}</TableCell>
                <TableCell>{{ item.course_category.name }}</TableCell>
                <TableCell>{{ item.title }}</TableCell>
                <TableCell>{{ item.description }}</TableCell>
                <TableCell>{{ item.price_per_month }}</TableCell>
                <TableCell>
                    <img :src="item?.thumbnail" alt="Thumbnail" class="w-16 h-16 object-cover" />
                </TableCell>
                <TableCell>
                    <ul>
                        <li v-for="course in item.course_data" :key="course.id" class="flex gap-2 items-center">
                           <BookMarkedIcon class="w-4 h-4" /> {{ course.data }}
                        </li>
                    </ul>
                </TableCell>
                <TableCell class="flex gap-3 text-right text-muted-foreground">
                    <EditDelete :url="CourseController.edit(item.id).url" :method="CourseController.destroy(item.id)" />
                    <Button @click="goToCourseVideo(item.id)">
                        <Video class="w-4 h-4" />
                    </Button>
                </TableCell>
                </TableRow>
            </TableBody>
            </Table>
        </CardContent>
        </Card>

        <Paginator :meta="courses.meta" @changePage="changePage" />

    </div>
</template>

<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import { Search, Plus, BookMarkedIcon, Video } from 'lucide-vue-next'
import { ref, watch } from 'vue';
import EditDelete from '@/components/EditDelete.vue';
import Paginator from '@/components/Paginator.vue'
import { Button } from '@/components/ui/button'
import { Card, CardContent } from '@/components/ui/card'
import { Input } from '@/components/ui/input'
import type { Course } from '@/types/course';
import type { PaginatorResource } from '@/types/paginator';
import CourseController from '@/actions/App/Http/Controllers/Admin/CourseController';
import CourseVideoController from '@/actions/App/Http/Controllers/Admin/CourseVideoController';
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table'

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Courses',
                href: CourseController.index().url,
            },
        ],
    },
});

defineProps<{
    courses: PaginatorResource<Course>;
}>();

const create = () => {
    useForm({}).get(CourseController.create().url);
};

const changePage = (page: number) => {
    console.log('Page changed to:', page);
};

const q = ref(decodeURIComponent(window.location.search.split('q=')[1] || ''));


watch(() => q.value, () => {
    setTimeout(() => {
        useForm({ q: q.value }).get(CourseController.index().url);
    }, 300);
});

const goToCourseVideo = (courseId: number) => {
    // window.location.href = CourseController.show(courseId).url;
    console.log(CourseVideoController.index(courseId).url);
    useForm({}).get(CourseVideoController.index(courseId).url);
};
</script>
