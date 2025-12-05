<template>
    <Head title="Dashboard - Gestión Clínica" />

    <AuthenticatedLayout>
        <template #header>
            <!-- Encabezado mejorado -->
            <div class="relative bg-gradient-to-r from-blue-600 to-blue-800 dark:from-gray-900 dark:to-gray-800 rounded-xl p-6 mb-6 overflow-hidden">
                <div class="absolute inset-0 bg-medical-pattern opacity-10"></div>
                <div class="relative z-10">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-white text-2xl font-bold mb-2">
                                Panel de Gestión Clínica
                            </h3>
                            <p class="text-blue-100 max-w-2xl">
                                Sistema integral para la administración de pacientes, historiales médicos y agenda de consultas.
                                <span class="block mt-1 text-sm opacity-90">Última actualización: Hoy, 10:45 AM</span>
                            </p>
                        </div>
                        <div class="hidden md:block">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-white bg-opacity-20 text-white">
                                <svg class="mr-1.5 h-2 w-2 text-blue-300 animate-pulse" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3" />
                                </svg>
                                Sistema activo
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estadísticas principales mejoradas -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
                <CardStats
                    statSubtitle="Pacientes"
                    statTitle="1,248"
                    statArrow="up"
                    statPercent="12.5"
                    statDescripition="vs mes anterior"
                    statIconName="fas fa-user-injured"
                    statIconColor="bg-blue-500"
                    statBgColor="bg-gradient-to-br from-blue-50 to-white dark:from-blue-900 dark:to-gray-800"
                    borderColor="border-l-blue-500"
                />
                <CardStats
                    statSubtitle="Nuevos Pacientes"
                    statTitle="86"
                    statArrow="up"
                    statPercent="8.2"
                    statDescripition="últimos 7 días"
                    statIconName="fas fa-user-plus"
                    statIconColor="bg-teal-500"
                    statBgColor="bg-gradient-to-br from-teal-50 to-white dark:from-teal-900 dark:to-gray-800"
                    borderColor="border-l-teal-500"
                />
                <CardStats
                    statSubtitle="Citas Programadas"
                    statTitle="42"
                    statArrow="down"
                    statPercent="3.8"
                    statPercentColor="text-red-500"
                    statDescripition="próximos 3 días"
                    statIconName="fas fa-calendar-check"
                    statIconColor="bg-purple-500"
                    statBgColor="bg-gradient-to-br from-purple-50 to-white dark:from-purple-900 dark:to-gray-800"
                    borderColor="border-l-purple-500"
                />
                <CardStats
                    statSubtitle="Presupuestos"
                    statTitle="28"
                    statArrow="up"
                    statPercent="5.3"
                    statDescripition="esta semana"
                    statIconName="fas fa-file-invoice-dollar"
                    statIconColor="bg-amber-500"
                    statBgColor="bg-gradient-to-br from-amber-50 to-white dark:from-amber-900 dark:to-gray-800"
                    borderColor="border-l-amber-500"
                />
            </div>

            <!-- Módulos principales mejorados -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                        Módulos del Sistema
                    </h2>
                    <div class="relative">
                        <input 
                            type="text" 
                            placeholder="Buscar módulo..." 
                            class="pl-10 pr-4 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700"
                        >
                        <svg class="absolute left-3 top-2.5 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    <!-- Módulo de Pacientes mejorado -->
                    <div class="group relative bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 transition-all duration-200 hover:shadow-md hover:border-blue-200 dark:hover:border-blue-700 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-transparent dark:from-blue-900/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative p-5">
                            <div class="flex justify-between items-start mb-4">
                                <div class="w-12 h-12 rounded-lg bg-blue-100 dark:bg-blue-900/50 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                </div>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                    Popular
                                </span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Gestión de Pacientes</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">Registro completo de información demográfica y clínica de pacientes.</p>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-500 dark:text-gray-400">1,248 registros</span>
                                <a :href="route('patients.index')" class="font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 flex items-center">
                                    Acceder
                                    <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Módulo de Historial Médico mejorado -->
                    <div class="group relative bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 transition-all duration-200 hover:shadow-md hover:border-teal-200 dark:hover:border-teal-700 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-teal-50 to-transparent dark:from-teal-900/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative p-5">
                            <div class="flex justify-between items-start mb-4">
                                <div class="w-12 h-12 rounded-lg bg-teal-100 dark:bg-teal-900/50 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-600 dark:text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-teal-100 text-teal-800 dark:bg-teal-900 dark:text-teal-200">
                                    Crítico
                                </span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Medicamentos</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">Registros De medicamentos</p>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-500 dark:text-gray-400">3,456 registros</span>
                                <a :href="route('drugs.index')" class="font-medium text-teal-600 hover:text-teal-800 dark:text-teal-400 dark:hover:text-teal-300 flex items-center">
                                    Acceder
                                    <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Módulo de Citas mejorado -->
                    <div class="group relative bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 transition-all duration-200 hover:shadow-md hover:border-purple-200 dark:hover:border-purple-700 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-50 to-transparent dark:from-purple-900/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative p-5">
                            <div class="flex justify-between items-start mb-4">
                                <div class="w-12 h-12 rounded-lg bg-purple-100 dark:bg-purple-900/50 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                    Nuevo
                                </span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Agenda de Citas</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">Programación y gestión de consultas médicas.</p>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-500 dark:text-gray-400">42 pendientes</span>
                                <a :href="route('appointments.index')" class="font-medium text-purple-600 hover:text-purple-800 dark:text-purple-400 dark:hover:text-purple-300 flex items-center">
                                    Acceder
                                    <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Módulo de Facturación mejorado -->
                    <div class="group relative bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 transition-all duration-200 hover:shadow-md hover:border-amber-200 dark:hover:border-amber-700 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-amber-50 to-transparent dark:from-amber-900/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative p-5">
                            <div class="flex justify-between items-start mb-4">
                                <div class="w-12 h-12 rounded-lg bg-amber-100 dark:bg-amber-900/50 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600 dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 dark:bg-amber-900 dark:text-amber-200">
                                    Actualizado
                                </span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Facturación</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">Presupuestos, facturas y gestión financiera.</p>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-500 dark:text-gray-400">28 pendientes</span>
                                <a :href="route('bills.index')" class="font-medium text-amber-600 hover:text-amber-800 dark:text-amber-400 dark:hover:text-amber-300 flex items-center">
                                    Acceder
                                    <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección de actividad reciente -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden mb-8">
                <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 dark:text-gray-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Actividad Reciente
                    </h3>
                </div>
                <div class="divide-y divide-gray-100 dark:divide-gray-700">
                    <!-- Elemento de actividad -->
                    <div class="px-6 py-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 pt-0.5">
                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">
                                        Dra. María González
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        10 min ago
                                    </p>
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-300">
                                    Actualizó el historial médico de <a href="#" class="font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400">Juan Pérez</a>
                                </p>
                                <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        Diagnóstico
                                    </span>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 ml-1">
                                        Tratamiento
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Otro elemento de actividad -->
                    <div class="px-6 py-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 pt-0.5">
                                <div class="h-10 w-10 rounded-full bg-purple-100 dark:bg-purple-900/50 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">
                                        Sistema Automático
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        1 hora ago
                                    </p>
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-300">
                                    Nueva cita programada para <a href="#" class="font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400">Ana Rodríguez</a>
                                </p>
                                <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                        Cita
                                    </span>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded bg-amber-100 text-amber-800 dark:bg-amber-900 dark:text-amber-200 ml-1">
                                        Pendiente
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tercer elemento de actividad -->
                    <div class="px-6 py-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 pt-0.5">
                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">
                                        Dr. Carlos Méndez
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        3 horas ago
                                    </p>
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-300">
                                    Generó un nuevo presupuesto para <a href="#" class="font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400">Laura Sánchez</a>
                                </p>
                                <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded bg-amber-100 text-amber-800 dark:bg-amber-900 dark:text-amber-200">
                                        $1,850.00
                                    </span>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 ml-1">
                                        Aprobado
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-3 bg-gray-50 dark:bg-gray-700/30 text-center border-t border-gray-100 dark:border-gray-700">
                    <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                        Ver toda la actividad
                    </a>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CardStats from '@/Components/CardStats.vue';

export default {
    props: {
        patients: Object(),
        doctors: Object(),
        appointments: Object(),
    },
    components: {
        AuthenticatedLayout,
        Head,
        CardStats,
    },
    data(){
        return{
            data: {

            }
        }
    },
    methods: {

    },
}
</script>

<style>
.bg-medical-pattern {
    background-image: url("data:image/svg+xml,%3Csvg width='52' height='26' viewBox='0 0 52 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
</style>