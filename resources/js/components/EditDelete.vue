<template>
     <div class="flex gap-3">
        <Button variant="outline" @click="edit" class="w-full sm:w-auto flex items-center gap-2">
            <Pencil class="h-4 w-4" />
        </Button>
        <Button variant="destructive" @click="destroy" class="w-full sm:w-auto flex items-center gap-2">
            <Trash2 class="h-4 w-4" />
        </Button>
    </div>
</template>

<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { Pencil, Trash2 } from 'lucide-vue-next';
import Button from './ui/button/Button.vue';

    const props = defineProps<{
        method: any;
        url: string;
    }>();
    
    const edit = () => {
        useForm({}).get(props.url);
    };
    
    const destroy = () => {
        useForm({}).delete(props.method);
    };
</script>
