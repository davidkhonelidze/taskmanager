<script setup>
import {Link} from "@inertiajs/vue3";
</script>
<template>
    <header class="bg-gray-50 px-5 sticky top-0 z-10 mb-6 border-b-2">

        <div class="container mx-auto sm:px-5 max-w-[1280px] h-[110px] md:h-[66px] relative">



            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
                    <a href="https://flowbite.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Task Manager</span>
                    </a>
                    <div class="flex items-center space-x-6 rtl:space-x-reverse">
                        <Link
                            href="#"
                            class="text-sm  text-blue-600 dark:text-blue-500 hover:underline">Login</Link>
                    </div>
                </div>
            </nav>
            <nav class="bg-gray-50 dark:bg-gray-700">
                <div class="max-w-screen-xl px-4 py-3 mx-auto">
                    <div class="flex items-center">
                        <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                            <li>
                                <Link href="#" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Home</Link>
                            </li>
                            <li>
                                <Link href="/projects" class="text-gray-900 dark:text-white hover:underline">Projects</Link>
                            </li>
                            <li>
                                <a href="#" class="text-gray-900 dark:text-white hover:underline">Issues</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-900 dark:text-white hover:underline">Settings</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>

    </header>
</template>
