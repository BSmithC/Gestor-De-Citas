<template>
    <Head title="Pacientes" />
    <AuthenticatedLayout>
        <template #header>
            <div class="text-white text-xl font-bold">
                GESTIÓN DE PACIENTES
            </div>
        </template>
        
        <template #default>
            <div class="min-h-screen bg-gray-50 dark:bg-gray-900 p-6">
                <!-- Main Content Container -->
                <div class="max-w-7xl mx-auto">
                    <!-- Action Bar -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-4 mb-6">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                            <Link :href="route('patients.create')" 
                                class="flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg hover:from-green-600 hover:to-emerald-700 focus:ring-4 focus:outline-none focus:ring-green-200 shadow-lg transition-all transform hover:scale-105">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                Nuevo Paciente
                            </Link>
                            
                            <div class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto">
                                <LastDays v-model="filters.lastDays" @change="submit" class="w-full sm:w-auto"/>
                                
                                <div class="relative w-full sm:w-64">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input @input="submit()" v-model="filters.search" id="table-search" 
                                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-all" 
                                        placeholder="Buscar pacientes...">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Patients Table -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gradient-to-r from-purple-600 to-indigo-600 dark:from-purple-800 dark:to-indigo-800">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            NOMBRE COMPLETO
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            FECHA NAC.
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            SEGURO
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            LUGAR NAC.
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            ESTADO
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-white uppercase tracking-wider">
                                            ACCIONES
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr v-for="patient in patients" :key="patient.id" 
                                        class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                            #{{ patient.id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 dark:text-purple-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ patient.name }} {{ patient.last_name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                                        {{ patient.DNI || 'Sin DNI' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            {{ patient.date_of_birth }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                {{ patient.insurance || 'Sin seguro' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            {{ patient.place_of_birth || 'No especificado' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span :class="`px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${patient.status ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200'}`">
                                                {{ patient.status ? 'Activo' : 'Inactivo' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button @click="openModal(patient)" 
                                                class="flex items-center gap-1 text-purple-600 dark:text-purple-400 hover:text-purple-900 dark:hover:text-purple-300 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                </svg>
                                                Ver
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Patient Detail Modal -->
                <div v-if="infoModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-75 transition-opacity duration-300">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-6xl max-h-[90vh] overflow-y-auto">
                        <!-- Modal Header -->
                        <div class="sticky top-0 z-10 bg-gradient-to-r from-purple-600 to-indigo-600 dark:from-purple-800 dark:to-indigo-800 px-6 py-4 rounded-t-2xl flex justify-between items-center">
                            <h2 class="text-xl font-bold text-white">
                                Expediente del Paciente: {{ selectedPatient.name }} {{ selectedPatient.last_name }}
                            </h2>
                            <div class="flex space-x-2">
                                <Link :href="route('patients.edit', selectedPatient.id)" 
                                    class="flex items-center gap-1 px-4 py-2 text-sm font-medium text-yellow-800 bg-yellow-400 hover:bg-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-300 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                    Editar
                                </Link>
                                <button @click="closeModal" 
                                    class="p-2 text-white hover:text-gray-200 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Modal Content -->
                        <div class="p-6 space-y-6">
                            <!-- Patient Information Grid -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <!-- Personal Information Card -->
                                <div class="bg-white dark:bg-gray-700 rounded-xl shadow-md overflow-hidden border border-gray-200 dark:border-gray-600">
                                    <div class="bg-gray-50 dark:bg-gray-600 px-4 py-3 border-b border-gray-200 dark:border-gray-500">
                                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600 dark:text-purple-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                            </svg>
                                            Información Personal
                                        </h3>
                                    </div>
                                    <div class="p-4">
                                        <dl class="space-y-4">
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">DNI/Cédula</dt>
                                                <dd class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ selectedPatient.DNI || 'No disponible' }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nombre</dt>
                                                <dd class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ selectedPatient.name }} {{ selectedPatient.last_name || '' }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Teléfono</dt>
                                                <dd class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ selectedPatient.phone_number || 'No registrado' }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</dt>
                                                <dd class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ selectedPatient.email || 'No registrado' }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Fecha Nac.</dt>
                                                <dd class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ selectedPatient.date_of_birth || 'No registrado' }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Lugar Nac.</dt>
                                                <dd class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ selectedPatient.place_of_birth || 'No registrado' }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Dirección</dt>
                                                <dd class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ selectedPatient.address || 'No registrado' }}
                                                </dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>
                                
                                <!-- Medical History Card -->
                                <div class="bg-white dark:bg-gray-700 rounded-xl shadow-md overflow-hidden border border-gray-200 dark:border-gray-600">
                                    <div class="bg-gray-50 dark:bg-gray-600 px-4 py-3 border-b border-gray-200 dark:border-gray-500">
                                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600 dark:text-purple-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z" clip-rule="evenodd" />
                                            </svg>
                                            Historial Médico
                                        </h3>
                                    </div>
                                    <div class="p-4">
                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Antecedentes</label>
                                            <div class="bg-gray-50 dark:bg-gray-600 p-3 rounded-lg border border-gray-200 dark:border-gray-500 text-sm text-gray-700 dark:text-gray-300 min-h-24">
                                                {{ 'No hay historial médico registrado' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Visits Card -->
                                <div class="bg-white dark:bg-gray-700 rounded-xl shadow-md overflow-hidden border border-gray-200 dark:border-gray-600">
                                    <div class="bg-gray-50 dark:bg-gray-600 px-4 py-3 border-b border-gray-200 dark:border-gray-500">
                                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600 dark:text-purple-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                            </svg>
                                            Visitas y Consultas
                                        </h3>
                                    </div>
                                    <div class="p-4">
                                        <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                            <p>No hay registros de visitas</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Appointments Card -->
                                <div class="bg-white dark:bg-gray-700 rounded-xl shadow-md overflow-hidden border border-gray-200 dark:border-gray-600">
                                    <div class="bg-gray-50 dark:bg-gray-600 px-4 py-3 border-b border-gray-200 dark:border-gray-500">
                                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600 dark:text-purple-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" />
                                            </svg>
                                            Próximas Citas
                                        </h3>
                                    </div>
                                    <div class="p-4">
                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Notas</label>
                                            <div class="bg-gray-50 dark:bg-gray-600 p-3 rounded-lg border border-gray-200 dark:border-gray-500 text-sm text-gray-700 dark:text-gray-300 min-h-24">
                                                {{ 'No hay citas programadas' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Footer -->
                        <div class="sticky bottom-0 bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600 rounded-b-2xl flex justify-end">
                            <button @click="closeModal" 
                                class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-200 dark:bg-gray-600 hover:bg-gray-300 dark:hover:bg-gray-500 rounded-lg transition-colors">
                                Cerrar
                            </button>
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
        filters: Object
    },
    data() {
        return {
            form: {
                search: this.filters.search || '',
                lastDays: this.filters.lastDays || '1',
            }
        };
    },
    methods: {
        submit() {
            this.form.search = this.filters.search || '';
            this.form.lastDays = this.filters.lastDays || '1';
            this.$inertia.get(route('patients.index'), this.form, {
                preserveState: true,
                preserveScroll: true,
                replace: true
            });
        },
        openModal(patient) {
            this.selectedPatient = { ...patient };
            this.infoModal = true;
        },
        closeModal() {
            this.infoModal = false;
        },
        updatePatient() {
            router.put(route('patients.update', this.selectedPatient.id), this.selectedPatient, {
                onSuccess: () => this.closeModal()
            });
        },
        storePatient() {
            router.put(route('patients.store', this.selectedPatient), this.selectedPatient, {});
        }
    },
    data() {
        return {
            form: {
                search: this.filters.search || '',
            },
            infoModal: false,
            selectedPatient: {
                id: null,
                name: '',
                sur_name: '',
                last_name: '',
                second_sur_name: '',
                DNI: '',
                date_of_birth: '',
                phone_number: '',
                nacionality: '',
                address: '',
                gender: '',
                sex: '',
                marital_status: '',
                ocupation: '',
                place_of_birth: '',
                blood_type: '',
                insurance: '',
                email: '',
                status: false
                }
            };
        },
    components: {
        Head,
        AuthenticatedLayout,
        LastDays,
        Link,
        ref
    }
};
</script>
