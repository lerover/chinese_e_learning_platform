<template>
  <Navbar :canRegister="canRegister"/>
     <!-- Header -->
  <header class="pt-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <h1 class="text-4xl font-bold text-gray-900">Language Courses</h1>
      <p class="text-gray-600 mt-2 text-lg">Master Chinese with our comprehensive courses</p>
    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Basic Courses Section -->
    <section class="mb-16" :key="'basic-courses-' + category.id" v-for="category in courseCategories">
      <h2 class="text-3xl font-bold text-gray-900 mb-8">{{ category.name }}</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Course Card 1 -->
        <div v-for="course in category.courses" :key="course.id" class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
          <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-32 flex items-center justify-center">
            <img :src="`/storage/${course.thumbnail}`" alt="Course Image" class="w-full h-full object-cover">
          </div>
          <div class="p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ course.title }}</h3>
            <p class="text-gray-600 text-sm mb-4">{{ course.description }}</p>
            <div class="flex items-baseline mb-6">
              <span class="text-4xl font-bold">{{ course.price_per_month }}</span>
              <span class="text-gray-500 ml-2">/month</span>
            </div>
            <ul class="space-y-2 mb-6 text-sm text-gray-700">
              <li v-for="cd in course.course_data" :key="cd.id" class="flex items-center">✓ {{ cd.data }}</li>
            </ul>
            <Button
              @click="goDetail(course.id)"
              class="w-full  text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200"
              :class="(usePage().props.enrolledCourses as any).find((ec: any) => ec.course_id === course.id)?.status === 'approved' ? 'bg-green-700 hover:bg-green-600' : ''"
            >
              {{ (usePage().props.enrolledCourses as any).find((ec: any) => ec.course_id === course.id)?.status === 'approved' ? 'Enrolled' : 'View Detail' }}
            </Button>
          </div>
        </div>

        
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-900 text-gray-300 mt-16 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
        <div>
          <h3 class="text-white font-semibold mb-4">About Us</h3>
          <p class="text-sm">Learn Chinese from expert instructors with years of teaching experience.</p>
        </div>
        <div>
          <h3 class="text-white font-semibold mb-4">Quick Links</h3>
          <ul class="text-sm space-y-2">
            <li><a href="#" class="hover:text-white transition">Contact Us</a></li>
            <li><a href="#" class="hover:text-white transition">FAQ</a></li>
            <li><a href="#" class="hover:text-white transition">Terms & Conditions</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-white font-semibold mb-4">Follow Us</h3>
          <ul class="text-sm space-y-2">
            <li><a href="#" class="hover:text-white transition">Facebook</a></li>
            <li><a href="#" class="hover:text-white transition">Instagram</a></li>
            <li><a href="#" class="hover:text-white transition">Twitter</a></li>
          </ul>
        </div>
      </div>
      <div class="border-t border-gray-800 pt-8 text-center text-sm">
        <p>&copy; 2024 Language Courses. All rights reserved.</p>
      </div>
    </div>
  </footer>
</template>

<script setup lang="ts">
import { useForm, usePage } from '@inertiajs/vue3';
import Button from '@/components/ui/button/Button.vue';
import Navbar from '@/pages/layout/Navbar.vue';

withDefaults(
    defineProps<{
        canRegister: boolean;
        courseCategories: any[];
    }>(),
    {
        canRegister: true,
    },
);

const goDetail = (courseId: number) => {
    useForm({}).get(`/front/courses/${courseId}`);
};
</script>
