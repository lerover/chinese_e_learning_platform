<template>
    <nav class="fixed top-0 w-full bg-white shadow-sm z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-[#DF2D29] to-[#E7483F] rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">E</span>
                        </div>
                        <span class="font-bold text-xl text-gray-900">EduHub</span>
                    </div>

                    <!-- Menu Items -->
                    <div class="hidden md:flex gap-8">
                        <Link :href="home()" class="text-gray-700 hover:text-[#DF2D29] transition font-medium">Home</Link>
                        <Link :href="coursesIndex()" class="text-gray-700 hover:text-[#DF2D29] transition font-medium">Courses</Link>
                    </div>

                    <!-- CTA Button -->
                    <div class="flex items-center gap-4">
                        <template v-if="$page.props.auth.user">
                            <Link
                                v-if="$page.props.auth.user.role === 'admin'"
                                :href="dashboard()"
                                class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                            >
                                Dashboard
                            </Link>
                            <Link
                                :href="logout()"
                                method="post"
                                class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                            >
                                Logout
                            </Link>
                        </template>
                        <template v-else>
                            <Link
                                :href="login()"
                                class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]"
                            >
                                Log in
                            </Link>
                            <Link
                                v-if="canRegister"
                                :href="register()"
                                class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                            >
                                Register
                            </Link>
                        </template>
                    </div>
                </div>
            </div>
        </nav>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { dashboard, home, login, register, logout } from '@/routes';
import { index as coursesIndex } from '@/routes/courses';

withDefaults(
    defineProps<{
        canRegister: boolean;
    }>(),
    {
        canRegister: true,
    },
);
</script>