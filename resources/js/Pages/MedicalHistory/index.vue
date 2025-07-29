<template>

    <Head title="Historial Médico" />
    <AuthenticatedLayout>
        <template #header>
            <div class="text-white text-2xl font-bold p-4 rounded-lg ">
                HISTORIAL MÉDICO DE PACIENTES
            </div>
        </template>

        <template #default>
            <div class="min-h-screen bg-gray-50 dark:bg-gray-900 p-6">
                <!-- Main Content Container -->
                <div class="max-w-7xl mx-auto">
                    <!-- Action Bar -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-4 mb-6">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">

                            <div class="relative w-full sm:w-72">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input placeholder="Buscar por paciente, diagnóstico..."
                                    class="block w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-all duration-200">
                            </div>
                        </div>
                    </div>

                    <!-- Records Table -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead
                                    class="bg-gradient-to-r from-purple-600 to-indigo-600 dark:from-purple-800 dark:to-indigo-800">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-4 text-left text-sm font-semibold text-white uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-left text-sm font-semibold text-white uppercase tracking-wider">
                                            Paciente
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-left text-sm font-semibold text-white uppercase tracking-wider">
                                            Diagnóstico
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-left text-sm font-semibold text-white uppercase tracking-wider">
                                            Descripción
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-left text-sm font-semibold text-white uppercase tracking-wider">
                                            Actualización
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-right text-sm font-semibold text-white uppercase tracking-wider">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr v-for="medicalhistory in medicalhistories" :key="medicalhistory.id"
                                        class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                            {{ medicalhistory.id || 'NR' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex-shrink-0 h-10 w-10 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-6 w-6 text-purple-600 dark:text-purple-300" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ medicalhistory.patient.name || 'No registrado' }}
                                                    </div>
                                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                                        {{ medicalhistory.patient.DNI || 'Sin DNI' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                {{ medicalhistory.diagnosis || 'NR' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900 dark:text-white max-w-xs truncate">
                                                {{ medicalhistory.diagnosis_description || 'No registrado' }}
                                            </div>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            {{ formatDate(medicalhistory.updated_at) || 'NR' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex justify-end space-x-3">
                                                <Link 
                                                    class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 transition-colors duration-200"
                                                    title="Ver detalles">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    <path fill-rule="evenodd"
                                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                </Link>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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

export default {
    props: {
        medicalhistories: Object,
    },
    components: {
        AuthenticatedLayout,
        Head,
        Link,
        router,
        ref
    },
    data() {
        return {
            select_medicalhistories: {
                id: null,
                patient_id: null,
                drug_id: null,
                diagnosis: '',
                reason: '',
                symtoms: '',
                diagnosis_description: '',
                description: '',
                blood_pressure: '',
                temperature: '',
                weight: '',
                observation: ''
            },
        }
    },
    methods: {
        formatDate(date) {
            const d = new Date(date);
            return d.toISOString().split('T')[0];
        },
    },
}
</script>