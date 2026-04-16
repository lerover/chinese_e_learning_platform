<template>
    <Navbar :canRegister="canRegister"/>

    <div class="min-h-screen bg-background">
      

      <div class="mt-32 mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
          <div class="lg:col-span-2 space-y-6">
            <div class="bg-black rounded-lg overflow-hidden">
              <div class="aspect-video bg-gray-900 flex items-center justify-center relative">
                <img
                  src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800"
                  alt={currentVideo.title}
                  class="w-full h-full object-cover"
                />
                <button class="absolute inset-0 flex items-center justify-center hover:bg-black/20 transition-colors group">
                  <div class="bg-white p-4 rounded-full  transition-colors">
                    <Play class="text-black fill-black" :size="32"/>
                  </div>
                </button>
              </div>
            </div>

            <div class="bg-white rounded-lg border p-6">
              <h2 class="text-2xl font-bold text-foreground mb-2">
                {{ currentVideo.title }}
              </h2>
              <div class="flex flex-wrap gap-4 text-sm text-muted-foreground">
                <div class="flex items-center gap-1">
                  <Clock :size="16" />
                  <span>
                    {{ currentVideo.duration }}
                    <!-- {/* {currentVideo.duration} */} -->
                  </span>
                </div>
                <!-- {/* {currentVideo.completed && (
                  <Badge class="bg-green-100 text-green-800">Completed</Badge>
                )} */} -->
              </div>
              <p class="mt-4 text-muted-foreground leading-relaxed">
                In this lesson, you&apos;ll learn about{{ currentVideo.title.toLowerCase() }}.
                We&apos;ll cover the fundamentals, best practices, and real-world examples
                that will help you master this important concept in web development.
              </p>
            </div>

            <Tabs defaultValue="outline" class="w-full">
              <TabsList class="grid w-full grid-cols-2">
                <TabsTrigger value="outline">Course Outline</TabsTrigger>
                <TabsTrigger value="instructor">Instructor</TabsTrigger>
              </TabsList>

              <TabsContent value="outline" class="bg-white rounded-lg border p-6 mt-4">
                <div class="space-y-6">
                    <div v-for="cour in course.outline" :key="cour.section">
                      <h3 class="font-semibold text-foreground flex items-center gap-2 mb-3">
                        <Award :size="18" />
                        {{ cour.section }}
                      </h3>
                      <ul class="space-y-2 ml-6">
                        <li v-for="lesson in cour.lessons" :key="lesson" class="flex items-start gap-2 text-muted-foreground">
                            <ChevronRight :size="16" class="mt-0.5 shrink-0 " />
                            <span>{{ lesson }}</span>
                          </li>
                      </ul>
                    </div>
                </div>
              </TabsContent>

              <TabsContent value="instructor" class="bg-white rounded-lg border p-6 mt-4">
                <div class="flex gap-6">
                  <Avatar class="h-24 w-24 shrink-0">
                    <AvatarImage :src="course.instructor.image" :alt="course.instructor.name" />
                    <AvatarFallback>
                     {{ course.instructor.name.charAt(0) }}
                    </AvatarFallback>
                  </Avatar>
                  <div class="flex-1">
                    <h3 class="text-xl font-bold text-foreground">
                      {{ course.instructor.name }}
                    </h3>
                    <p class="text-sm font-medium mb-3">
                      {{ course.instructor.title }}
                    </p>
                    <p class="text-muted-foreground leading-relaxed">
                      {{ course.instructor.bio }}
                    </p>
                  </div>
                </div>
              </TabsContent>
            </Tabs>
          </div>

          <!-- Right Column - Video List -->
          <div class="lg:col-span-1">
            <!-- Course Stats -->
            <div class="bg-white rounded-lg border p-4 mb-6">
            
                <div class="mb-4 font-bold">
                    {{ course.title }}
                </div>

              <div class="space-y-3">
                <div class="flex items-center justify-between pb-3 border-b">
                  <div class="flex items-center gap-2 text-muted-foreground">
                    <Clock :size="16" />
                    <span class="text-sm">Duration</span>
                  </div>
                  <span class="font-semibold text-foreground">{{ course.duration }}</span>
                </div>
                <div class="flex items-center justify-between pb-3 border-b">
                  <div class="flex items-center gap-2 text-muted-foreground">
                    <Users :size="16" />
                    <span class="text-sm">Students</span>
                  </div>
                  <span class="font-semibold text-foreground">{{ course.students.toLocaleString() }}</span>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-center gap-2 text-muted-foreground">
                    <Award :size="16" />
                    <span class="text-sm">Level</span>
                  </div>
                  <span class="font-semibold text-foreground">{{ course.level }}</span>
                </div>
              </div>

              <Button class="w-full mt-4">Enroll Now</Button>
            </div>

            

            <!-- {/* Video List */} -->
            <div class="bg-white rounded-lg border overflow-hidden">
              <div class="px-4 py-4 border-b bg-gray-50">
                <h3 class="font-semibold text-foreground">
                  Course Videos ({{ videoList.length }})
                </h3>
              </div>
              <div class="divide-y max-h-[600px] overflow-y-auto">

                <button
                    v-for="(video, index) in videoList"
                    :key="video.id"
                    @click="selectedVideo = index"
                    :class="`w-full text-left px-4 py-3 transition-colors hover:bg-gray-50 ${
                      selectedVideo === index
                        ? 'bg-blue-50 border-l-4 border-l-blue-600'
                        : ''
                    }`"
                  >
                    <div class="flex items-start gap-3">
                      <div class="shrink-0">
                        <Play
                            v-if="currentVideo.id === video.id"
                            :size="16"
                            class="mt-0.5"
                          />
                        <div 
                            v-else-if="video.completed"
                            class="w-4 h-4 rounded-full bg-green-500 mt-0.5" />
                        <div 
                            v-else
                            class="w-4 h-4 rounded-full border-2 border-gray-300 mt-0.5" />
                      </div>
                      <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-foreground truncate">
                          {{ video.title }}
                        </p>
                        <p class="text-xs text-muted-foreground mt-1">
                          {{ video.duration }}
                        </p>
                      </div>
                    </div>
                  </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script setup lang="ts">
import { Play, Award, Clock, Users, ChevronRight } from 'lucide-vue-next';
import { ref } from 'vue';
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar'
import { Button } from '@/components/ui/button';
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@/components/ui/tabs'
import Navbar from '@/pages/layout/Navbar.vue';


const props = withDefaults(defineProps<{
  canRegister: boolean,
  course: any 
}>(), {
  canRegister: true // Explicitly set a default
});



const course = props.course || {
    id: 1,
    title: 'Advanced Web Development with Next.js',
    instructor: {
      name: 'Sarah Chen',
      title: 'Senior Software Engineer',
      image: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400',
      bio: 'With 10+ years of experience in full-stack development, Sarah specializes in modern web technologies and teaching.',
    },
    description:
      'Master Next.js and build production-ready applications with this comprehensive course covering the latest features and best practices.',
    duration: '24 hours',
    students: 2847,
    level: 'Advanced',
    videos: [
      {
        id: 1,
        title: 'Introduction to Next.js 14',
        duration: '45 min',
        completed: true,
      },
      {
        id: 2,
        title: 'App Router Deep Dive',
        duration: '52 min',
        completed: true,
      },
      {
        id: 3,
        title: 'Server Components and Actions',
        duration: '38 min',
        completed: false,
      },
      {
        id: 4,
        title: 'Data Fetching Strategies',
        duration: '41 min',
        completed: false,
      },
      {
        id: 5,
        title: 'Optimization Techniques',
        duration: '35 min',
        completed: false,
      },
      {
        id: 6,
        title: 'Deployment and Performance',
        duration: '39 min',
        completed: false,
      },
    ],
    outline: [
      {
        section: 'Module 1: Fundamentals',
        lessons: [
          'What is Next.js and why use it',
          'Setting up your first project',
          'Understanding the file structure',
          'Creating pages and routes',
        ],
      },
      {
        section: 'Module 2: Advanced Routing',
        lessons: [
          'Dynamic routes and parameters',
          'Nested layouts',
          'Route groups',
          'Middleware and authentication',
        ],
      },
      {
        section: 'Module 3: Data and Performance',
        lessons: [
          'Server and client components',
          'Data fetching patterns',
          'Caching strategies',
          'Image and font optimization',
        ],
      },
      {
        section: 'Module 4: Deployment',
        lessons: [
          'Building for production',
          'Environment variables',
          'Deploying to Vercel',
          'Monitoring and debugging',
        ],
      },
    ],
  }

 const videoList = course.videos
  const currentVideo = videoList[0]
const selectedVideo = ref<string | number>(0);
</script>
