<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Navbar from './layout/Navbar.vue';

withDefaults(
    defineProps<{
        canRegister: boolean;
    }>(),
    {
        canRegister: true,
    },
);
</script>

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    
    
    <div>
        <Navbar :canRegister="canRegister"/>
        <!-- Hero Section -->
        <section id="home" class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-linear-to-b from-red-50 to-white">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="space-y-6">
            <div class="inline-block bg-red-100 text-[#DF2D29] px-4 py-2 rounded-full text-sm font-semibold">
                🚀 Leading Online Learning Platform
            </div>
            
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
                Start Your
                <span class="bg-gradient-to-r from-[#DF2D29] to-[#E7483F] bg-clip-text text-transparent">Learning Journey</span>
            </h1>

            <p class="text-lg text-gray-600 leading-relaxed">
                Professional instructors, interactive courses, flexible schedules. Whatever your learning goals, we have the perfect course for you. Join hundreds of thousands of students and begin your learning journey today.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <button class="bg-gradient-to-r from-[#DF2D29] to-[#E7483F] text-white px-8 py-3 rounded-lg hover:shadow-lg transition font-semibold">
                Get Started Now
                </button>
                <button class="border-2 border-[#DF2D29] text-[#DF2D29] px-8 py-3 rounded-lg hover:bg-red-50 transition font-semibold">
                Browse Courses
                </button>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-3 gap-8 pt-8 border-t border-gray-200">
                <div>
                <p class="text-2xl font-bold text-[#DF2D29]">50K+</p>
                <p class="text-gray-600 text-sm">Active Students</p>
                </div>
                <div>
                <p class="text-2xl font-bold text-[#DF2D29]">500+</p>
                <p class="text-gray-600 text-sm">Quality Courses</p>
                </div>
                <div>
                <p class="text-2xl font-bold text-[#DF2D29]">98%</p>
                <p class="text-gray-600 text-sm">Satisfaction Rate</p>
                </div>
            </div>
            </div>

            <!-- Right Image -->
            <div class="relative h-96 md:h-full">
            <div class="absolute inset-0 bg-gradient-to-br from-red-200 to-red-100 rounded-2xl transform -rotate-3"></div>
            <div class="relative bg-gradient-to-br from-[#DF2D29] to-[#E7483F] rounded-2xl h-96 flex items-center justify-center text-white overflow-hidden">
                <svg class="w-32 h-32 opacity-20" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                </svg>
            </div>
            </div>
        </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose EduHub</h2>
            <p class="text-lg text-gray-600">We provide the most comprehensive learning experience</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-red-100 text-[#DF2D29] rounded-lg flex items-center justify-center text-2xl mb-4">
                👨‍🏫
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Expert Instructors</h3>
                <p class="text-gray-600">Certified instructors from top universities and companies with extensive teaching experience.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-green-100 text-green-600 rounded-lg flex items-center justify-center text-2xl mb-4">
                🎯
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Personalized Learning</h3>
                <p class="text-gray-600">Course content and difficulty automatically adjust based on your learning progress and style.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center text-2xl mb-4">
                📱
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Learn Anytime, Anywhere</h3>
                <p class="text-gray-600">Learn on any device without time or location restrictions. Study at your own pace.</p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-red-100 text-red-600 rounded-lg flex items-center justify-center text-2xl mb-4">
                🏆
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Recognized Certificates</h3>
                <p class="text-gray-600">Earn industry-recognized certificates upon completion to enhance your career prospects.</p>
            </div>

            <!-- Feature 5 -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-lg flex items-center justify-center text-2xl mb-4">
                👥
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Vibrant Community</h3>
                <p class="text-gray-600">Interact with global students, share insights, ask questions, and grow together.</p>
            </div>

            <!-- Feature 6 -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-teal-100 text-teal-600 rounded-lg flex items-center justify-center text-2xl mb-4">
                💰
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Affordable Pricing</h3>
                <p class="text-gray-600">High-quality courses at competitive prices with multiple flexible payment options.</p>
            </div>
            </div>
        </div>
        </section>

        <!-- Video Section -->
        <section id="video" class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Our Students Say</h2>
            <p class="text-lg text-gray-600">Hear real success stories from our learners</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
            <!-- Video Card 1 -->
            <div class="bg-gray-100 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition">
                <div class="relative h-72 bg-gradient-to-br from-gray-300 to-gray-200 flex items-center justify-center group cursor-pointer">
                <svg class="w-20 h-20 text-gray-400 group-hover:text-gray-500 transition" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                </svg>
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition"></div>
                </div>
                <div class="p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-2">John&apos;s Success Story</h3>
                <p class="text-gray-600 text-sm mb-4">From beginner to expert in just 6 months with our comprehensive courses.</p>
                <p class="text-[#DF2D29] text-sm font-semibold">▶ Watch Video</p>
                </div>
            </div>

            <!-- Video Card 2 -->
            <div class="bg-gray-100 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition">
                <div class="relative h-72 bg-gradient-to-br from-gray-300 to-gray-200 flex items-center justify-center group cursor-pointer">
                <svg class="w-20 h-20 text-gray-400 group-hover:text-gray-500 transition" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                </svg>
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition"></div>
                </div>
                <div class="p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-2">Sarah&apos;s Career Change</h3>
                <p class="text-gray-600 text-sm mb-4">Achieved my career goals and landed my dream job through this amazing platform.</p>
                <p class="text-[#DF2D29] text-sm font-semibold">▶ Watch Video</p>
                </div>
            </div>

            <!-- Video Card 3 -->
            <div class="bg-gray-100 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition">
                <div class="relative h-72 bg-gradient-to-br from-gray-300 to-gray-200 flex items-center justify-center group cursor-pointer">
                <svg class="w-20 h-20 text-gray-400 group-hover:text-gray-500 transition" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                </svg>
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition"></div>
                </div>
                <div class="p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-2">Mike&apos;s Experience</h3>
                <p class="text-gray-600 text-sm mb-4">Rich course content, patient instructors, results exceeded all my expectations.</p>
                <p class="text-[#DF2D29] text-sm font-semibold">▶ Watch Video</p>
                </div>
            </div>

            <!-- Video Card 4 -->
            <div class="bg-gray-100 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition">
                <div class="relative h-72 bg-gradient-to-br from-gray-300 to-gray-200 flex items-center justify-center group cursor-pointer">
                <svg class="w-20 h-20 text-gray-400 group-hover:text-gray-500 transition" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                </svg>
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition"></div>
                </div>
                <div class="p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-2">Emma&apos;s Testimonial</h3>
                <p class="text-gray-600 text-sm mb-4">Flexible scheduling allowed me to balance work and learning. Highly recommended!</p>
                <p class="text-[#DF2D29] text-sm font-semibold">▶ Watch Video</p>
                </div>
            </div>
            </div>
        </div>
        </section>

        <!-- Pricing Section -->
        <section id="pricing" class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Choose Your Plan</h2>
            <p class="text-lg text-gray-600">Flexible pricing options for every learning need</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
            <!-- Pricing Card 1 -->
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-200 hover:shadow-lg transition">
                <div class="mb-6">
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Starter</h3>
                <p class="text-gray-600 text-sm">Perfect for beginners</p>
                </div>
                
                <div class="mb-6">
                <p class="text-4xl font-bold text-gray-900">$9.99</p>
                <p class="text-gray-600 text-sm mt-2">per month</p>
                </div>

                <div class="space-y-4 mb-8">
                <div class="flex gap-3 items-start">
                    <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-gray-700">50+ Courses</span>
                </div>
                <div class="flex gap-3 items-start">
                    <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-gray-700">Lifetime Access</span>
                </div>
                <div class="flex gap-3 items-start">
                    <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-gray-700">Community Access</span>
                </div>
                </div>

                <button class="w-full border-2 border-[#DF2D29] text-[#DF2D29] py-3 rounded-lg hover:bg-red-50 transition font-semibold">
                Select Plan
                </button>
            </div>

            <!-- Pricing Card 2 - Featured -->
            <div class="bg-gradient-to-br from-[#DF2D29] to-[#E7483F] p-8 rounded-xl shadow-lg transform md:scale-105 text-white">
                <div class="inline-block bg-white bg-opacity-20 text-white px-3 py-1 rounded-full text-sm font-semibold mb-6">
                ⭐ Most Popular
                </div>
                
                <div class="mb-6">
                <h3 class="text-2xl font-bold mb-2">Professional</h3>
                <p class="text-red-100 text-sm">For serious learners</p>
                </div>
                
                <div class="mb-6">
                <p class="text-4xl font-bold">$19.99</p>
                <p class="text-red-100 text-sm mt-2">per month</p>
                </div>

                <div class="space-y-4 mb-8">
                <div class="flex gap-3 items-start">
                    <svg class="w-5 h-5 text-white mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span>All Courses (200+)</span>
                </div>
                <div class="flex gap-3 items-start">
                    <svg class="w-5 h-5 text-white mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Instructor Support</span>
                </div>
                <div class="flex gap-3 items-start">
                    <svg class="w-5 h-5 text-white mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Priority Certificates</span>
                </div>
                <div class="flex gap-3 items-start">
                    <svg class="w-5 h-5 text-white mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Custom Learning Plan</span>
                </div>
                </div>

                <button class="w-full bg-white text-[#DF2D29] py-3 rounded-lg hover:bg-red-50 transition font-semibold">
                Start Free Trial
                </button>
            </div>

            <!-- Pricing Card 3 -->
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-200 hover:shadow-lg transition">
                <div class="mb-6">
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Enterprise</h3>
                <p class="text-gray-600 text-sm">For teams and organizations</p>
                </div>
                
                <div class="mb-6">
                <p class="text-4xl font-bold text-gray-900">$99+</p>
                <p class="text-gray-600 text-sm mt-2">per year</p>
                </div>

                <div class="space-y-4 mb-8">
                <div class="flex gap-3 items-start">
                    <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-gray-700">Unlimited Users</span>
                </div>
                <div class="flex gap-3 items-start">
                    <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-gray-700">Custom Content</span>
                </div>
                <div class="flex gap-3 items-start">
                    <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-gray-700">Dedicated Support</span>
                </div>
                <div class="flex gap-3 items-start">
                    <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-gray-700">Analytics & Reports</span>
                </div>
                </div>

                <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                Contact Sales
                </button>
            </div>
            </div>
        </div>
        </section>

        <!-- CTA Section -->
        <section id="contact" class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-[#DF2D29] to-[#E7483F]">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Start Learning?</h2>
            <p class="text-lg text-red-100 mb-8">
            Join hundreds of thousands of students on their learning journey. Sign up today and get 7 days of free access.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="bg-white text-[#DF2D29] px-8 py-3 rounded-lg hover:bg-red-50 transition font-semibold">
                Start Free Trial
            </button>
            <button class="border-2 border-white text-white px-8 py-3 rounded-lg hover:bg-white hover:bg-opacity-10 transition font-semibold">
                Learn More
            </button>
            </div>
        </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-gray-300 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid md:grid-cols-4 gap-8 mb-8">
            <div>
            <div class="flex items-center gap-2 mb-4">
                <div class="w-8 h-8 bg-gradient-to-br from-[#DF2D29] to-[#E7483F] rounded-lg flex items-center justify-center">
                <span class="text-white font-bold text-lg">E</span>
                </div>
                <span class="font-bold text-lg text-white">EduHub</span>
            </div>
            <p class="text-sm">Empowering learners worldwide with quality education and opportunities.</p>
            </div>
            
            <div>
            <h4 class="text-white font-semibold mb-4">Platform</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-white transition">Browse Courses</a></li>
                <li><a href="#" class="hover:text-white transition">Enterprise Solutions</a></li>
                <li><a href="#" class="hover:text-white transition">Mobile App</a></li>
            </ul>
            </div>

            <div>
            <h4 class="text-white font-semibold mb-4">Company</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-white transition">About Us</a></li>
                <li><a href="#" class="hover:text-white transition">Contact</a></li>
                <li><a href="#" class="hover:text-white transition">Careers</a></li>
            </ul>
            </div>

            <div>
            <h4 class="text-white font-semibold mb-4">Social</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-white transition">Twitter</a></li>
                <li><a href="#" class="hover:text-white transition">LinkedIn</a></li>
                <li><a href="#" class="hover:text-white transition">Facebook</a></li>
            </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-400">
            <p>&copy; 2024 EduHub. All rights reserved.</p>
            <div class="flex gap-6 mt-4 md:mt-0">
                <a href="#" class="hover:text-white transition">Privacy Policy</a>
                <a href="#" class="hover:text-white transition">Terms of Service</a>
                <a href="#" class="hover:text-white transition">Cookie Settings</a>
            </div>
            </div>
        </div>
        </footer>
    </div>
</template>
