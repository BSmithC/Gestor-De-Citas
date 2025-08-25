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
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div v-for="appointment in appointments" :key="appointment.id"
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

                            <!-- Actions -->
                            <div
                                class="mt-6 flex justify-between items-center pt-4 border-t border-gray-200 dark:border-gray-700">
                                <button @click="openModal(appointment)"
                                    class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 text-sm font-medium flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Details
                                </button>

                                <!-- Empty State -->
                                <div v-if="appointments.length === 0" class="col-span-full py-12 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    <h3 class="mt-2 text-lg font-medium text-gray-900 dark:text-white">No appointments
                                        found</h3>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Create a new appointment to
                                        get started
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Appointment Details Modal -->
                        <div v-if="infoModal"
                            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50">
                            <div
                                class="bg-white dark:bg-gray-800 rounded-xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                                <div class="p-6 space-y-6">
                                    <div class="flex justify-between items-start">
                                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Appointment Details
                                        </h2>
                                        <button @click="closeModal"
                                            class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="space-y-4">
                                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 shadow-sm">
                                            <h3 class="font-semibold text-lg text-gray-700 dark:text-white mb-3">
                                                Appointment
                                                Information</h3>
                                            <dl class="space-y-3">
                                                <div
                                                    class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-gray-200 dark:border-gray-600">
                                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        Patient Name
                                                    </dt>
                                                    <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{
                                                        form.patient.name }} {{ form.patient.last_name || 'N/A' }}</dd>
                                                </div>
                                                <div
                                                    class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-gray-200 dark:border-gray-600">
                                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        Doctor Name
                                                    </dt>
                                                    <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{
                                                        form.doctor.name }} {{ form.doctor.last_name || 'N/A' }}</dd>
                                                </div>
                                                <div
                                                    class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-gray-200 dark:border-gray-600">
                                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        Appointment
                                                        Date</dt>
                                                    <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{
                                                        form.date }}
                                                    </dd>
                                                </div>
                                                <div
                                                    class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-gray-200 dark:border-gray-600">
                                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        Time Slot</dt>
                                                    <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{
                                                        form.starttime }} - {{ form.endtime }}</dd>
                                                </div>
                                                <div
                                                    class="flex flex-col sm:flex-row sm:items-center justify-between pt-2">
                                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        Status</dt>
                                                    <dd class="text-sm font-semibold" :class="{
                                                        'text-green-600 dark:text-green-400': form.active,
                                                        'text-red-600 dark:text-red-400': !form.active
                                                    }">
                                                        {{ form.active ? 'Active' : 'Inactive' }}
                                                    </dd>
                                                </div>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    openModal(appointment) {
        this.form = { ...appointment };
        this.infoModal = true;
    },
    closeModal() {
        this.infoModal = false;
    },
    data() {
        return {
            infoModal: false,
            form: {
                id: '',
                title: '',
                doctor_id: '',
                patient_id: '',
                attended: '',
                date: '',
                endtime: '',
                active: true,
                search: this.filters.search || '',
                lastDays: this.filters.lastDays || '1',
            }
        };
    },
    components: {
        Head,
        AuthenticatedLayout,
        Link,
        LastDays,
        ref,
        router
    }
};
</script>
