<template>

    <Head title="Appointments" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                    Appointment Management
                </h1>
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                    <svg class="mr-1.5 h-2 w-2 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                        <circle cx="4" cy="4" r="3" />
                    </svg>
                    Active System
                </span>
            </div>
        </template>

        <template #default>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <!-- Filters and Search -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-4 mb-6 border border-gray-200 dark:border-gray-700">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div class="flex flex-col sm:flex-row gap-4 w-full">
                            <LastDays v-model="filters.lastDays" @change="submit()" class="w-full sm:w-auto" />

                            <div class="relative w-full sm:w-64">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input @input="submit()" v-model="filters.search" id="table-search"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Search appointments...">
                            </div>
                        </div>

                        <Link :href="route('appointments.create')"
                            class="w-full sm:w-auto flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        New Appointment
                        </Link>
                    </div>
                </div>

                <!-- Appointments Grid -->

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                    <div v-for="appointment in appointments.data" :key="appointment.id"
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-md transition-shadow">
                        <!-- Appointment Header -->
                        <div
                            class="px-5 py-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                            <div>
                                <span class="text-xs font-semibold text-gray-500 dark:text-gray-400">Appointment #{{
                                    appointment.id }}</span>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mt-1">
                                    {{ formatDate(appointment.date) }}
                                </h3>
                            </div>
                            <span :class="{
                                'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200': appointment.active,
                                'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200': !appointment.active
                            }" class="px-2.5 py-0.5 text-xs font-medium rounded-full">
                                {{ appointment.active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>

                        <!-- Appointment Body -->
                        <div class="p-5">
                            <div class="space-y-4">
                                <!-- Patient Info -->
                                <div class="flex items-start">
                                    <div
                                        class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 text-blue-600 dark:text-blue-300" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Patient</h4>
                                        <p class="text-sm font-semibold text-gray-800 dark:text-white">
                                            {{ appointment.patient.name }} {{ appointment.patient.last_name }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Doctor Info -->
                                <div class="flex items-start">
                                    <div
                                        class="flex-shrink-0 h-10 w-10 rounded-full bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 text-purple-600 dark:text-purple-300" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Doctor</h4>
                                        <p class="text-sm font-semibold text-gray-800 dark:text-white">
                                            Dr. {{ appointment.doctor.name }} {{ appointment.doctor.last_name }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Time Slot -->
                                <div class="flex items-start">
                                    <div
                                        class="flex-shrink-0 h-10 w-10 rounded-full bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 text-amber-600 dark:text-amber-300" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Time</h4>
                                        <p class="text-sm font-semibold text-gray-800 dark:text-white">
                                            {{ appointment.starttime }} - {{ appointment.endtime }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <Pagination :pagination="appointments" :value="form" />
            </div>
        </template>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import LastDays from '@/Components/LastDays.vue';
import Pagination from '@/Components/Pagination.vue'

export default {
    props: {
        patients: Object,
        doctors: Object,
        appointments: Object,
        filters: Object
    },
    methods: {
        formatDate(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' }
            return new Date(dateString).toLocaleDateString(undefined, options)
        }
    },
    submit() {
        this.form.search = this.filters.search || '';
        this.form.lastDays = this.filters.lastDays || '1';
        this.$inertia.get(route('appointments.index'), this.form, {
            preserveState: true,
            preserveScroll: true,
            replace: true
        });
    },
    // openModal(Appointment) {
    //     this.form = { ...appointment };
    //     this.infoModal = true;
    // },
    // closeModal() {
    //     this.infoModal = false;
    // },
    components: {
        Head,
        AuthenticatedLayout,
        Link,
        LastDays,
        ref,
        Pagination,
    }
};
</script>
