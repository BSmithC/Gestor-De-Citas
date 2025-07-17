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
                    <form @submit.prevent="storeAppointment" class="p-6 space-y-8">
                        <!-- Three Column Layout -->
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
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
                                        APPOINTMENT DETAILS
                                    </h2>
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
                                                <input id="datepicker" type="date" v-model="storeAppointments.date"
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
                                                <input id="startime" type="time" v-model="storeAppointments.starttime"
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
                                                <input id="endtime" type="time" v-model="storeAppointments.endtime"
                                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 focus:ring-purple-500 focus:border-purple-500 dark:text-white dark:placeholder-gray-400"
                                                    placeholder="Select date">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="notes"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Notes</label>
                                            <textarea id="notes" rows="4" v-model="storeAppointments.title"
                                                class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 focus:ring-purple-500 focus:border-purple-500 dark:text-white dark:placeholder-gray-400"
                                                placeholder="Enter appointment notes..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                        DOCTOR & PATIENT
                                    </h2>

                                    <div class="space-y-6">
                                        <div>
                                            <label for="doctor-select"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Select
                                                Doctor</label>
                                            <select id="doctor-select" v-model="storeAppointments.doctor_id"
                                                class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 focus:ring-blue-500 focus:border-blue-500 dark:text-white">
                                                <option disabled value="">Select a doctor</option>
                                                <option v-for="doctor in doctors" :key="doctor.id" :value="doctor.id">
                                                    Dr. {{ doctor.name }} {{ doctor.last_name }}
                                                </option>
                                            </select>

                                            <div v-if="selectedDoctor"
                                                class="mt-3 bg-blue-50 dark:bg-blue-900/30 p-4 rounded-lg border border-blue-100 dark:border-blue-800">
                                                <div class="flex items-center space-x-3">
                                                    <div class="flex-shrink-0">
                                                        <div
                                                            class="h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-800 flex items-center justify-center">
                                                            <svg class="h-6 w-6 text-blue-600 dark:text-blue-400"
                                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h4
                                                            class="text-sm font-semibold text-blue-800 dark:text-blue-200">
                                                            Dr. {{ selectedDoctor.name }} {{ selectedDoctor.last_name }}
                                                        </h4>
                                                        <p class="text-xs text-blue-600 dark:text-blue-400">Specialty:
                                                            {{ selectedDoctor.specialty || 'General' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label for="patient-select"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Select
                                                Patient</label>
                                            <select id="patient-select" v-model="storeAppointments.patient_id"
                                                class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 focus:ring-blue-500 focus:border-blue-500 dark:text-white">
                                                <option disabled value="">Select a patient</option>
                                                <option v-for="patient in patients" :key="patient.id"
                                                    :value="patient.id">
                                                    {{ patient.name }} {{ patient.last_name }}
                                                </option>
                                            </select>

                                            <div v-if="selectedPatient"
                                                class="mt-3 bg-purple-50 dark:bg-purple-900/30 p-4 rounded-lg border border-purple-100 dark:border-purple-800">
                                                <div class="flex items-center space-x-3">
                                                    <div class="flex-shrink-0">
                                                        <div
                                                            class="h-10 w-10 rounded-full bg-purple-100 dark:bg-purple-800 flex items-center justify-center">
                                                            <svg class="h-6 w-6 text-purple-600 dark:text-purple-400"
                                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h4
                                                            class="text-sm font-semibold text-purple-800 dark:text-purple-200">
                                                            {{ selectedPatient.name }} {{ selectedPatient.last_name }}
                                                        </h4>
                                                        <p class="text-xs text-purple-600 dark:text-purple-400">DOB: {{
                                                            selectedPatient.date_of_birth || 'Not specified' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column - Medication -->
                            <div class="space-y-6">
                                <div>
                                    <h2
                                        class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-green-600 dark:text-green-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                            </path>
                                        </svg>
                                        MEDICATION
                                    </h2>

                                    <div class="space-y-4">
                                        <div>
                                            <label for="drug-select"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Select
                                                Medication</label>
                                            <select id="drug-select" v-model="storeAppointments.drug_id"
                                                class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 focus:ring-green-500 focus:border-green-500 dark:text-white">
                                                <option disabled value="">Select a medication</option>
                                                <option v-for="drug in drugs" :key="drug.id" :value="drug.id">
                                                    {{ drug.name }}
                                                </option>
                                            </select>
                                        </div>

                                        <div v-if="selectedDrug"
                                            class="bg-green-50 dark:bg-green-900/30 p-4 rounded-lg border border-green-100 dark:border-green-800">
                                            <div class="space-y-3">
                                                <div>
                                                    <h4
                                                        class="text-sm font-semibold text-green-800 dark:text-green-200">
                                                        {{ selectedDrug.name }}</h4>
                                                    <p class="text-xs text-green-600 dark:text-green-400">Description:
                                                        {{ selectedDrug.description || 'Not specified' }}</p>
                                                </div>

                                                <div class="grid grid-cols-2 gap-2 text-xs">
                                                    <div>
                                                        <span
                                                            class="font-medium text-green-700 dark:text-green-300">Frequency:</span>
                                                        <span class="text-green-600 dark:text-green-400 ml-1">{{
                                                            selectedDrug.frequency || 'N/A' }}</span>
                                                    </div>
                                                    <div>
                                                        <span
                                                            class="font-medium text-green-700 dark:text-green-300">Duration:</span>
                                                        <span class="text-green-600 dark:text-green-400 ml-1">{{
                                                            selectedDrug.duration || 'N/A' }}</span>
                                                    </div>
                                                    <div>
                                                        <span
                                                            class="font-medium text-green-700 dark:text-green-300">Route:</span>
                                                        <span class="text-green-600 dark:text-green-400 ml-1">{{
                                                            selectedDrug.route || 'N/A' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <button type="button" @click="closeModal"
                                class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:focus:ring-offset-gray-800 transition-colors">
                                Cancel
                            </button>
                            <button type="submit"
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
            storeAppointments: {
                title: '',
                date: '',
                starttime: '',
                endtime: '',
                patient_id: '',
                drug_id: '',
                doctor_id: '',
                active: true,
                attended: false,
            },
        }
    },
    computed: {
        selectedDoctor() {
            // console.log('Buscando ID Doctor: ', this.storeAppointments.doctor_id);
            return this.doctors.find(doctor => doctor.id === this.storeAppointments.doctor_id) || {};
        },
        selectedPatient() {
            // console.log('Buscando ID Patient: ', this.storeAppointments.patient_id);
            return this.patients.find(patient => patient.id === this.storeAppointments.patient_id) || {};
        },
        selectedDrug() {
            // console.log('Buscando ID Drug: ', this.storeAppointments.drug_id);
            return this.drugs.find(drug => drug.id === this.storeAppointments.drug_id) || {};
        },
    },
    methods: {
        storeAppointment() {
            console.log('Enviando: ', this.storeAppointments);
            this.storeAppointments.date = this.formatDate(this.storeAppointments.date);
            // this.storeAppointments.starttime = this.formatTime(this.storeAppointments.starttime);
            // this.storeAppointments.endtime = this.formatTime(this.storeAppointments.endtime);
            this.$inertia.post(route('appointments.store'), this.storeAppointments, {
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
            return d.toISOString().split('T')[0]; // "YYYY-MM-DD"
        },
        formatTime(time) {
            const d = new Date(time);
            return d.toTimeString().split(' ')[0]; // "HH:MM:SS"
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
        onMounted
    }
};
</script>
