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
        </div>

        <!-- Bottom Section: Data Table -->
        <Card>
        <CardContent class="p-0">
            <Table>
            <TableHeader>
                <TableRow>
                    <TableHead class="w-[100px]">ID</TableHead>
                    <TableHead>User</TableHead>
                    <TableHead>Course</TableHead>
                    <TableHead>Status</TableHead>
                    <TableHead>Payment Reference</TableHead>
                </TableRow>
            </TableHeader>
            <TableBody>
                <TableRow v-for="(item, index) in enrollments.data" :key="index">
                    <TableCell class="font-medium">{{ index + 1 }}</TableCell>
                    <TableCell>{{ item.user.name }}</TableCell>
                    <TableCell>{{ item.course.title }}</TableCell>
                    <TableCell>
                        <span :class="{
                            'text-green-600': item.status === 'approved',
                            'text-red-600': item.status === 'rejected',
                            'text-yellow-600': item.status === 'pending'
                        }" class="px-2 py-1 rounded">
                            {{ item.status }}
                        </span>
                    </TableCell>
                    <TableCell>
                        <img :src="item.payment_reference" alt="Payment Reference" class="w-16 h-16 object-cover" />
                    </TableCell>
                    <TableCell class="flex gap-5">
                        <Button v-if="item.status === 'pending'" @click="updateStatus(item.id, 'approved')" size="sm" variant="default" class="bg-green-600 hover:bg-green-700 text-xs">Approve</Button>
                        <Button v-if="item.status === 'pending'" @click="updateStatus(item.id, 'rejected')" size="sm" variant="destructive" class="bg-red-600 hover:bg-red-700 text-xs">Reject</Button>
                    </TableCell>
                </TableRow>
            </TableBody>
            </Table>
        </CardContent>
        </Card>

        <Paginator :meta="enrollments.meta"/>

    </div>
</template>

<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import { Search } from 'lucide-vue-next'
import { ref, watch } from 'vue';
import CourseController from '@/actions/App/Http/Controllers/Admin/CourseController';
import EnrollmentController from '@/actions/App/Http/Controllers/EnrollmentController';
import Paginator from '@/components/Paginator.vue'
import { Button } from '@/components/ui/button'
import { Card, CardContent } from '@/components/ui/card'
import { Input } from '@/components/ui/input'
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table'
import type { PaginatorResource } from '@/types/paginator';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Enrollments',
                href: EnrollmentController.index().url,
            },
        ],
    },
});

defineProps<{
    enrollments: PaginatorResource<any>;
}>();


const q = ref(decodeURIComponent(window.location.search.split('q=')[1] || ''));


watch(() => q.value, () => {
    setTimeout(() => {
        useForm({ q: q.value }).get(CourseController.index().url);
    }, 300);
});

function updateStatus(id: number, status: string) {
    useForm({ 'status': status }).post(EnrollmentController.updateStatus(id).url);
}
</script>
