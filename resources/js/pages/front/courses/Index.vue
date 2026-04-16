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
    <section class="mb-16">
      <h2 class="text-3xl font-bold text-gray-900 mb-8">Beginner Courses</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Course Card 1 -->
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
          <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-32 flex items-center justify-center">
            <span class="text-4xl">🇨🇳</span>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Chinese Basics</h3>
            <p class="text-gray-600 text-sm mb-4">Learn essential Mandarin phrases and pronunciation</p>
            <div class="flex items-baseline mb-6">
              <span class="text-4xl font-bold text-blue-600">$49</span>
              <span class="text-gray-500 ml-2">/month</span>
            </div>
            <ul class="space-y-2 mb-6 text-sm text-gray-700">
              <li class="flex items-center">✓ 12 lessons</li>
              <li class="flex items-center">✓ Live instructor</li>
              <li class="flex items-center">✓ 2 hours/week</li>
            </ul>
            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
              Enroll Now
            </button>
          </div>
        </div>

        <!-- Course Card 2 -->
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
          <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 h-32 flex items-center justify-center">
            <span class="text-4xl">📚</span>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Introduction to Pinyin</h3>
            <p class="text-gray-600 text-sm mb-4">Master Chinese romanization system</p>
            <div class="flex items-baseline mb-6">
              <span class="text-4xl font-bold text-emerald-600">$39</span>
              <span class="text-gray-500 ml-2">/month</span>
            </div>
            <ul class="space-y-2 mb-6 text-sm text-gray-700">
              <li class="flex items-center">✓ 8 lessons</li>
              <li class="flex items-center">✓ Self-paced</li>
              <li class="flex items-center">✓ Certificate included</li>
            </ul>
            <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
              Enroll Now
            </button>
          </div>
        </div>

        <!-- Course Card 3 -->
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
          <div class="bg-gradient-to-r from-amber-500 to-amber-600 h-32 flex items-center justify-center">
            <span class="text-4xl">🎯</span>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Survival Chinese</h3>
            <p class="text-gray-600 text-sm mb-4">Quick phrases for travelers</p>
            <div class="flex items-baseline mb-6">
              <span class="text-4xl font-bold text-amber-600">$29</span>
              <span class="text-gray-500 ml-2">/month</span>
            </div>
            <ul class="space-y-2 mb-6 text-sm text-gray-700">
              <li class="flex items-center">✓ 6 lessons</li>
              <li class="flex items-center">✓ Audio + video</li>
              <li class="flex items-center">✓ 4 weeks access</li>
            </ul>
            <button class="w-full bg-amber-600 hover:bg-amber-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
              Enroll Now
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- Intermediate Courses Section -->
    <section class="mb-16">
      <h2 class="text-3xl font-bold text-gray-900 mb-8">Intermediate Courses</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Course Card 4 -->
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
          <div class="bg-gradient-to-r from-purple-500 to-purple-600 h-32 flex items-center justify-center">
            <span class="text-4xl">💬</span>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Conversational Chinese</h3>
            <p class="text-gray-600 text-sm mb-4">Build real conversation skills</p>
            <div class="flex items-baseline mb-6">
              <span class="text-4xl font-bold text-purple-600">$79</span>
              <span class="text-gray-500 ml-2">/month</span>
            </div>
            <ul class="space-y-2 mb-6 text-sm text-gray-700">
              <li class="flex items-center">✓ 16 lessons</li>
              <li class="flex items-center">✓ Native speakers</li>
              <li class="flex items-center">✓ 4 hours/week</li>
            </ul>
            <button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
              Enroll Now
            </button>
          </div>
        </div>

        <!-- Course Card 5 -->
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
          <div class="bg-gradient-to-r from-pink-500 to-pink-600 h-32 flex items-center justify-center">
            <span class="text-4xl">📖</span>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Business Chinese</h3>
            <p class="text-gray-600 text-sm mb-4">Professional language for work</p>
            <div class="flex items-baseline mb-6">
              <span class="text-4xl font-bold text-pink-600">$89</span>
              <span class="text-gray-500 ml-2">/month</span>
            </div>
            <ul class="space-y-2 mb-6 text-sm text-gray-700">
              <li class="flex items-center">✓ 20 lessons</li>
              <li class="flex items-center">✓ Corporate trainer</li>
              <li class="flex items-center">✓ 5 hours/week</li>
            </ul>
            <button class="w-full bg-pink-600 hover:bg-pink-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
              Enroll Now
            </button>
          </div>
        </div>

        <!-- Course Card 6 -->
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
          <div class="bg-gradient-to-r from-cyan-500 to-cyan-600 h-32 flex items-center justify-center">
            <span class="text-4xl">✍️</span>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Chinese Characters</h3>
            <p class="text-gray-600 text-sm mb-4">Learn writing and reading skills</p>
            <div class="flex items-baseline mb-6">
              <span class="text-4xl font-bold text-cyan-600">$69</span>
              <span class="text-gray-500 ml-2">/month</span>
            </div>
            <ul class="space-y-2 mb-6 text-sm text-gray-700">
              <li class="flex items-center">✓ 18 lessons</li>
              <li class="flex items-center">✓ Writing exercises</li>
              <li class="flex items-center">✓ 3.5 hours/week</li>
            </ul>
            <button class="w-full bg-cyan-600 hover:bg-cyan-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
              Enroll Now
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- Advanced Courses Section -->
    <section class="mb-16">
      <h2 class="text-3xl font-bold text-gray-900 mb-8">Advanced Courses</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Course Card 7 -->
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
          <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 h-32 flex items-center justify-center">
            <span class="text-4xl">🎓</span>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Advanced Fluency</h3>
            <p class="text-gray-600 text-sm mb-4">Near-native proficiency level</p>
            <div class="flex items-baseline mb-6">
              <span class="text-4xl font-bold text-indigo-600">$119</span>
              <span class="text-gray-500 ml-2">/month</span>
            </div>
            <ul class="space-y-2 mb-6 text-sm text-gray-700">
              <li class="flex items-center">✓ 24 lessons</li>
              <li class="flex items-center">✓ Expert mentors</li>
              <li class="flex items-center">✓ 6 hours/week</li>
            </ul>
            <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
              Enroll Now
            </button>
          </div>
        </div>

        <!-- Course Card 8 -->
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
          <div class="bg-gradient-to-r from-red-500 to-red-600 h-32 flex items-center justify-center">
            <span class="text-4xl">🎬</span>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Media & Culture</h3>
            <p class="text-gray-600 text-sm mb-4">Chinese films, news, and culture</p>
            <div class="flex items-baseline mb-6">
              <span class="text-4xl font-bold text-red-600">$99</span>
              <span class="text-gray-500 ml-2">/month</span>
            </div>
            <ul class="space-y-2 mb-6 text-sm text-gray-700">
              <li class="flex items-center">✓ 20 lessons</li>
              <li class="flex items-center">✓ Video materials</li>
              <li class="flex items-center">✓ 4.5 hours/week</li>
            </ul>
            <button class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
              Enroll Now
            </button>
          </div>
        </div>

        <!-- Course Card 9 -->
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden border-2 border-yellow-400">
          <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 h-32 flex items-center justify-center relative">
            <span class="absolute top-2 right-2 bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-xs font-semibold">Popular</span>
            <span class="text-4xl">👑</span>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">HSK Exam Prep</h3>
            <p class="text-gray-600 text-sm mb-4">Official Chinese proficiency certification</p>
            <div class="flex items-baseline mb-6">
              <span class="text-4xl font-bold text-yellow-600">$129</span>
              <span class="text-gray-500 ml-2">/month</span>
            </div>
            <ul class="space-y-2 mb-6 text-sm text-gray-700">
              <li class="flex items-center">✓ 28 lessons</li>
              <li class="flex items-center">✓ Mock exams</li>
              <li class="flex items-center">✓ 7 hours/week</li>
            </ul>
            <button class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
              Enroll Now
            </button>
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
import Navbar from '@/pages/layout/Navbar.vue';

withDefaults(
    defineProps<{
        canRegister: boolean;
    }>(),
    {
        canRegister: true,
    },
);
</script>
