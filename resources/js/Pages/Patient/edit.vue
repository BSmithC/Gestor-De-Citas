<template>
    <Head title="Edit Patients" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-white dark:text-gray-200">EDIT PACIENTE</h2>
        </template>
        <template #default>
            <div class=" py-12 flex items-center justify-center bg-gray-50 dark:bg-gray-900">
                <div class="w-full max-w-3xl">
                    <!-- Tarjeta del formulario -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl overflow-hidden transition-all duration-300 transform hover:shadow-2xl">
                        <!-- Encabezado con gradiente -->
                        <div class="bg-gradient-to-r from-purple-600 to-blue-500 p-6 text-white">
                            <h3 class="text-xl font-semibold flex items-center gap-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Información del Paciente
                            </h3>
                        </div>
                        <!-- Formulario -->
                        <form @submit.prevent="submit" class="p-6 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Columna Izquierda -->
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nombre</label>
                                        <input v-model="patients.name" 
                                            class="w-full px-4 py-2 text-gray-700 bg-gray-50 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white transition-all duration-200"
                                            placeholder="Ej: Juan">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Apellido</label>
                                        <input v-model="patients.last_name" 
                                            class="w-full px-4 py-2 text-gray-700 bg-gray-50 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white transition-all duration-200"
                                            placeholder="Ej: Pérez">
                                    </div>
                                </div>
                                <!-- Columna Derecha -->
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Fecha de Nacimiento</label>
                                        <input v-model="patients.date_of_birth" type="date" 
                                            class="w-full px-4 py-2 text-gray-700 bg-gray-50 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white transition-all duration-200">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Seguro Médico (ARS)</label>
                                        <select v-model="patients.insurance" 
                                            class="w-full px-4 py-2 text-gray-700 bg-gray-50 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white transition-all duration-200">
                                            <option value="Universal">Universal</option>
                                            <option value="Humano">Humano</option>
                                            <option value="Palic">Palic</option>
                                            <option value="Mapfre Salud">Mapfre Salud</option>
                                            <option value="SEMMA">SEMMA</option>
                                            <option value="Metromed">Metromed</option>
                                            <option value="Futuro">Futuro</option>
                                            <option value="SER">SER</option>
                                            <option value="Ever">Ever</option>
                                            <option value="Salud Total">Salud Total</option>
                                            <option value="CIMA">CIMA</option>
                                            <option value="Familiar">Familiar</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Estado -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Estado</label>
                                <div class="flex items-center space-x-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" v-model="patients.status" :value="true" 
                                            class="form-radio h-5 w-5 text-purple-600 transition duration-150 ease-in-out">
                                        <span class="ml-2 text-gray-700 dark:text-gray-300">Activo</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" v-model="patients.status" :value="false" 
                                            class="form-radio h-5 w-5 text-purple-600 transition duration-150 ease-in-out">
                                        <span class="ml-2 text-gray-700 dark:text-gray-300">Inactivo</span>
                                    </label>
                                </div>
                            </div>
                            <!-- Botones -->
                            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                                <button type="button" @click="closeModal" 
                                    class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 transition-all duration-200">
                                    Cancelar
                                </button>
                                <button type="submit" 
                                    class="px-6 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-purple-500 to-blue-500 rounded-lg hover:from-purple-600 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-purple-300 shadow-md transition-all duration-200 transform hover:scale-105">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        Guardar Cambios
                                    </div>
                                </button>
                            </div>
                        </form>
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
    },
    data() {
        return {
            form: {patients: this.patients},
            errors: {}
        };
    },    
    methods: {
        submit() {
            console.log(this.form)
            router.put(route('patients.update',this.patients), this.form.patients, {
                onSuccess: (success) => {
                    this.success = success
<<<<<<< HEAD
                    // toast.success('¡Guardado con éxito!')
=======
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
                    console.log(success)
                },
                onError: (errors) => {
                    this.errors = errors
<<<<<<< HEAD
                    // toast.error('¡Error No Se Actualizo Paciente!')
=======
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
                    console.log(errors)
                }
            })
        }
    },
    components: {
    Head,
    AuthenticatedLayout,
    LastDays,
    Link
    }
};
</script>.