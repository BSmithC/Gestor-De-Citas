<template>

    <Head title="Create Appointment" />
    <AuthenticatedLayout>
        <template #header>
            <div class="text-white text-2xl font-bold">
                CREATE APPOINTMENT
            </div>
        </template>

        <template #default>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                    <form @submit.prevent="submit" class="p-6 space-y-8">
                        <!-- Three Column Layout -->
                        <div class="grid grid-cols-2 lg:grid-cols-2 gap-8">
                            <!-- Left Column - Date and Notes -->
                            <div class="space-y-6">
                                <div>
                                    <h2
                                        class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-purple-600 dark:text-purple-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </h2>

                            <!-- Middle Column - Doctor and Patient -->
                            <div class="space-y-6">
                                <div>
                                    <h2
                                        class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-blue-600 dark:text-blue-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                        DOCTOR
                                    </h2>

                                    <div class="space-y-6">
                                        <div>
                                            <label for="doctor-select"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Select
                                                Doctor</label>
                                            <select id="doctor-select" v-model="form.doctor_id"
                                                class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 focus:ring-blue-500 focus:border-blue-500 dark:text-white">
                                                <option disabled value="">Select a doctor</option>
                                                <option v-for="doctor in doctors" :key="doctor.id" :value="doctor.id">
                                                    Dr. {{ doctor.name }} {{ doctor.last_name }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Middle Column - Doctor and Patient -->
                            <div class="space-y-6">
                                <div>
                                    <h2
                                        class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-green-600 dark:text-green-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                        Patient
                                    </h2>

                                    <div class="space-y-6">
                                        <div>
                                            <label for="doctor-select"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Select
                                                patients</label>
                                            <select id="doctor-select" v-model="form.patient_id"
                                                class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 focus:ring-blue-500 focus:border-blue-500 dark:text-white">
                                                <option disabled value="">Select a doctor</option>
                                                <option v-for="patient in patients" :key="patient.id" :value="patient.id">
                                                    Dr. {{ patient.name }} {{ patient.last_name }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                </div>
                            </div>
                                                                <div class="space-y-4">
                                        <div>
                                            <label for="datepicker"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Date</label>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-500"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input id="datepicker" type="date" v-model="form.date"
                                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 focus:ring-purple-500 focus:border-purple-500 dark:text-white dark:placeholder-gray-400"
                                                    placeholder="Select date">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="startime"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Start
                                                Time</label>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-500"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input id="startime" type="time" v-model="form.starttime"
                                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 focus:ring-purple-500 focus:border-purple-500 dark:text-white dark:placeholder-gray-400"
                                                    placeholder="Select date">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="endtime"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">EndTime</label>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-500"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input id="endtime" type="time" v-model="form.endtime"
                                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 focus:ring-purple-500 focus:border-purple-500 dark:text-white dark:placeholder-gray-400"
                                                    placeholder="Select date">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="notes"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Notes</label>
                                            <textarea id="notes" rows="4" v-model="form.title"
                                                class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 focus:ring-purple-500 focus:border-purple-500 dark:text-white dark:placeholder-gray-400"
                                                placeholder="Enter appointment notes..."></textarea>
                                        </div>
                                    </div>
                        </div>
                        <!-- Form Actions -->
                        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <button type="button"
                                class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:focus:ring-offset-gray-800 transition-colors">
                                Cancel
                            </button>
                            <button @click="submit"
                                class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-colors">
                                Create Appointment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import { computed, ref, onMounted } from 'vue';
import LastDays from '@/Components/LastDays.vue';

export default {
    props: {
        patients: Object,
        doctors: Object,
        drugs: Object,
    },
    data() {
        return {
            form: {
                title: '',
                date: '',
                starttime: '',
                endtime: '',
                active: true,
                attended: false,
            },
        }
    },
    methods: {
        submit() {
            this.form.date = this.formatDate(this.form.date);
            this.$inertia.post(route('appointments.store'), this.form, {
                onSuccess: () => {
                    this.$emit('appointmentCreated');
                },
                onError: (errors) => {
                    this.errors = errors;
                }
            });
        },
        formatDate(date) {
            const d = new Date(date);
            return d.toISOString().split('T')[0];
        },
        formatTime(time) {
            const d = new Date(time);
            return d.toTimeString().split(' ')[0];
        },
    },
    components: {
        Head,
        AuthenticatedLayout,
        LastDays,
        Link,
        computed,
        router,
        ref,
        onMounted,
    }
};
</script>
