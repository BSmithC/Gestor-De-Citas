<template>

    <Head title="Pacientes" />
    <AuthenticatedLayout>
        <template #header>
            <div class="text-white text-2xl font-bold">
                APPOINTMENT MANAGEMENT
            </div>
        </template>

        <template #default>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                    <!-- Header with actions -->
                    <div
                        class="p-6 border-b border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                            <LastDays v-model="filters.lastDays" @change="submit" class="w-full sm:w-auto" />

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
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 focus:ring-purple-500 focus:border-purple-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Search appointments...">
                            </div>
                        </div>
                    </div>

                    <!-- Appointments Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Patient
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Doctor
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Appointment Date
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                <tr v-for="appointment in appointments" :key="appointment.id"
                                    class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        #{{ appointment.id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        {{ appointment.patient.name }} {{ appointment.patient.last_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        {{ appointment.doctor.name }} {{ appointment.doctor.last_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        {{ appointment.date }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span :class="{
                                            'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200': appointment.active,
                                            'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200': !appointment.active
                                        }" class="px-2 py-1 text-xs font-semibold rounded-full">
                                            {{ appointment.active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button @click="openModal(appointment)"
                                            class="text-purple-600 hover:text-purple-900 dark:text-purple-400 dark:hover:text-purple-300 mr-3 transition-colors">
                                            View Details
                                        </button>
                                        <Link :href="route('appointments.edit', appointment.id)"
                                            class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-3 transition-colors">
                                        Edit
                                        </Link>
                                        <button @click="confirmDelete(appointment)"
                                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition-colors">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr v-if="appointments.length === 0">
                                    <td colspan="6"
                                        class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                        No appointments found
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
                            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Appointment Details</h2>
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
                                <h3 class="font-semibold text-lg text-gray-700 dark:text-white mb-3">Appointment
                                    Information</h3>
                                <dl class="space-y-3">
                                    <div
                                        class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-gray-200 dark:border-gray-600">
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Patient Name
                                        </dt>
                                        <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{
                                            form.patient.name }} {{ form.patient.last_name || 'N/A' }}</dd>
                                    </div>
                                    <div
                                        class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-gray-200 dark:border-gray-600">
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Doctor Name
                                        </dt>
                                        <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{
                                            form.doctor.name }} {{ form.doctor.last_name || 'N/A' }}</dd>
                                    </div>
                                    <div
                                        class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-gray-200 dark:border-gray-600">
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Appointment
                                            Date</dt>
                                        <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{ form.date }}
                                        </dd>
                                    </div>
                                    <div
                                        class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-gray-200 dark:border-gray-600">
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Time Slot</dt>
                                        <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{
                                            form.starttime }} - {{ form.endtime }}</dd>
                                    </div>
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between pt-2">
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</dt>
                                        <dd class="text-sm font-semibold" :class="{
                                            'text-green-600 dark:text-green-400': form.active,
                                            'text-red-600 dark:text-red-400': !form.active
                                        }">
                                            {{ form.active ? 'Active' : 'Inactive' }}
                                        </dd>
                                    </div>
                                </dl>
                            </div>

                            <div class="flex justify-end pt-4">
                                <button @click="closeModal"
                                    class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:focus:ring-offset-gray-800 transition-colors">
                                    Close
                                </button>
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
        ref
    }
};
</script>
