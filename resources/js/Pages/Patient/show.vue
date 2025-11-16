<template>
    <AuthenticatedLayout>
        <template #header>
            <div
                class="sticky top-0 z-10 bg-gradient-to-r from-pu    to-inddark:from-purple-800     dark:to-indigo-800 p rounded-t-2justify-between items-center">
                <h2 class="text-xl font-bold text-white">
                    Expediente del Paciente
                </h2>
            </div>
        </template>
        <template #default>
                <div
                    >
                    <div
                        >
                        <div class="p-6 space-y-6">
                            <!-- patients Information Grid -->
                            <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
                                <!-- Personal Information Card -->
                                <div
                                    class="bg-white dark:bg-gray-700 rounded-xl shadow-md overflow-hidden border border-gray-200 dark:border-gray-600">
                                    <div
                                        class="bg-gray-50 dark:bg-gray-600 px-4 py-3 border-b border-gray-200 dark:border-gray-500">
                                        <h3
                                            class="text-lg font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 text-purple-600 dark:text-purple-400" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Información Personal
                                        </h3>
                                    </div>
                                    <div class="p-4">
                                        <dl class="space-y-4">
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    DNI/Cédula</dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{  patients.DNI  || 'No disponible' }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nombre
                                                </dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ patients.name }} {{ patients.last_name }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    Teléfono</dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ patients.phone_number }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email
                                                </dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ patients.email }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Fecha
                                                    Nac.</dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ patients.date_of_birth }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Lugar
                                                    Nac.</dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ patients.place_of_birth }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    Dirección</dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ patients.address }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Accion
                                                </dt>
                                                <dd class="col-span-2 text-sm font-medium">
                                                    <div class="flex flex-wrap gap-3">
                                                        <!-- Botón Editar - Efecto neón interactivo -->
                                                        <Link :href="route('patients.edit', patients.id)"
                                                            class="relative group flex items-center gap-2 px-4 py-2 text-sm font-bold rounded-lg overflow-hidden transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg bg-gradient-to-br from-yellow-500 to-yellow-400 hover:from-yellow-600 hover:to-yellow-500">

                                                        <span
                                                            class="relative z-10 flex items-center gap-1 text-yellow-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                                viewBox="0 0 20 20" fill="currentColor">
                                                                <path
                                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                            </svg>
                                                            Editar
                                                        </span>

                                                        <!-- Efecto de brillo al pasar el mouse -->
                                                        <span
                                                            class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300"></span>

                                                        <!-- Efecto de borde animado -->
                                                        <span
                                                            class="absolute inset-0 border-2 border-yellow-300 rounded-lg opacity-0 group-hover:opacity-100 transition-all duration-500 group-hover:animate-pulse"></span>
                                                        </Link>

                                                        <!-- Botón Crear - Efecto 3D con profundidad -->
                                                        <Link :href="route('patients.create')"
                                                            class="relative group flex items-center gap-2 px-4 py-2 text-sm font-bold rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lgg bg-gradient-to-br from-emerald-500 to-emerald-400 hover:from-emerald-600 hover:to-emerald-500 shadow-md shadow-emerald-600/20 hover:shadow-emerald-600/30 active:translate-y-0.5">

                                                        <span
                                                            class="relative z-10 flex items-center gap-1 text-emerald-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                                viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            Nuevo Paciente
                                                        </span>

                                                        <!-- Efecto de pulsación al hacer clic -->
                                                        <span
                                                            class="absolute inset-0 bg-white opacity-0 group-active:opacity-30 rounded-lg transition-opacity duration-100"></span>
                                                        </Link>
                                                    </div>
                                                </dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>
                                <!-- Visits Card -->
                                <div
                                    class="bg-white dark:bg-gray-700 rounded-xl shadow-md overflow-hidden border border-gray-200 dark:border-gray-600">
                                    <div
                                        class="bg-gray-50 dark:bg-gray-600 px-4 py-3 border-b border-gray-200 dark:border-gray-500">
                                        <h3
                                            class="text-lg font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 text-purple-600 dark:text-purple-400" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Facturas Del Paciente
                                        </h3>
                                    </div>
                                    <div class="p-4">
                                        <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-2"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                            <p>No hay registros de visitas</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Appointments Card -->
                                <div
                                    class="bg-white dark:bg-gray-700 rounded-xl shadow-md overflow-hidden border border-gray-200 dark:border-gray-600">
                                    <div
                                        class="bg-gray-50 dark:bg-gray-600 px-4 py-3 border-b border-gray-200 dark:border-gray-500">
                                        <h3
                                            class="text-lg font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 text-purple-600 dark:text-purple-400" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" />
                                            </svg>
                                            Próximas Citas
                                        </h3>
                                    </div>
                                    <div v-if="patients.appointment.length" class="p-4">
                                        <div class="space-y-2">
                                            <label
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Notas De La Ultima Citas</label>
                                            <div
                                                class="bg-gray-50 dark:bg-gray-600 p-3 rounded-lg border border-gray-200 dark:border-gray-500 text-sm text-gray-700 dark:text-gray-300 min-h-24">
                                                {{ patients.appointment[patients.appointment.length -1].title|| 'No hay citas programadas' }}
                                            </div>

                                            <div class="flex flex-wrap gap-4 pt-2">
                                                <Link
                                                    :href="route('appointments.create')"
                                                    class="flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 active:translate-y-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Nuevo Historial 
                                                </Link>
                                                <Link
                                                    :href="route('appointments.edit', patients.appointment[patients.appointment.length -1].id)"
                                                    class="flex items-center gap-2 px-6 py-3 text-sm font-semibold text-gray-800 bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 active:translate-y-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                                Editar Historial
                                                </Link>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-else class="p-4">
                                        <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-2"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                            <p>No hay registros de citas</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Footer -->
                        <div
                            class="bottom-0 bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600 rounded-b-2xl flex justify-end">
                            <Link :href="route('patients.index')"
                                class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-200 dark:bg-gray-600 hover:bg-gray-300 dark:hover:bg-gray-500 rounded-lg transition-colors">
                                Cerrar
                            </Link>
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

export default{
    props: {
        patients: Object,
    },
    components: {
        AuthenticatedLayout,
        Head,
        Link,
        ref,
        router,
        LastDays
    },
    
    data(){
        return {
            form: {
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
    },
}

</script>