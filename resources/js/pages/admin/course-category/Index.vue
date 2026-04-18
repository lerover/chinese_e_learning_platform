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
                <TableHead>Category Name</TableHead>
                <TableHead class="text-right">Created Date</TableHead>
                </TableRow>
            </TableHeader>
            <TableBody>
                <TableRow v-for="(item, index) in courseCategories.data" :key="index">
                <TableCell class="font-medium">{{ index + 1 }}</TableCell>
                <TableCell>{{ item.name }}</TableCell>
                <TableCell class="text-right text-muted-foreground">{{ 
                moment(item.created_at).format('MMMM Do YYYY, h:mm:ss a')
                }}</TableCell>
                <TableCell class="flex gap-3 text-right text-muted-foreground">
                    <EditDelete :url="CourseCategoryController.edit(item.id).url" :method="CourseCategoryController.destroy(item.id)" />
                </TableCell>
                </TableRow>
            </TableBody>
            </Table>
        </CardContent>
        </Card>

        <Paginator :meta="courseCategories.meta" @changePage="changePage" />

    </div>
</template>

<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import { Search, Plus } from 'lucide-vue-next'
import moment from 'moment';
import { ref, watch } from 'vue';
import CourseCategoryController from '@/actions/App/Http/Controllers/Admin/CourseCategoryController';
import EditDelete from '@/components/EditDelete.vue';
import Paginator from '@/components/Paginator.vue'
import { Button } from '@/components/ui/button'
import { Card, CardContent } from '@/components/ui/card'
import { Input } from '@/components/ui/input'
import type { CourseCategory } from '@/types/course-category';
import type { PaginatorResource } from '@/types/paginator';
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table'

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

defineProps<{
    courseCategories: PaginatorResource<CourseCategory>;
}>();

const create = () => {
    useForm({}).get(CourseCategoryController.create().url);
};

const changePage = (page: number) => {
    console.log('Page changed to:', page);
};

const q = ref(decodeURIComponent(window.location.search.split('q=')[1] || ''));


watch(() => q.value, () => {
    setTimeout(() => {
        useForm({ q: q.value }).get(CourseCategoryController.index().url);
    }, 300);
});
</script>
