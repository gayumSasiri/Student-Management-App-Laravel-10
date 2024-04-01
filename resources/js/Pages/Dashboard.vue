<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">CyberElysium</h2>
        </template>

        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                    <div class="text-gray-900 text-center p-12">
                        <h1 class="display-1 text-primary">Welcome</h1>
                        <h1 class="display-5 text-primary-emphasis">to</h1>
                        <h1 class="display-3 text-primary-emphasis">Student Management App</h1>
                        <h1 class="display-1 text-primary">🙏</h1>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    props: {
        students: Array
    },
}
</script>
