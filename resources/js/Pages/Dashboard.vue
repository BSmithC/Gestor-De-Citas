<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CardStats from '@/Components/CardStats.vue';
</script>

<template>
    <Head title="Inicio - CRUD Pacientes" />

    <AuthenticatedLayout>
        <template #header>
            <div class="relative bg-gradient-to-r from-blue-50 to-blue-100 dark:from-gray-800 dark:to-gray-900 rounded-xl p-6 mb-6">
                <h3 class="text-gray-900 dark:text-white text-3xl font-bold mb-2 flex items-center">
                    <span class="mr-3 animate-bounce">👋</span> 
                    ¡Bienvenido al Gestor de Pacientes!
                </h3>
                <p class="text-gray-600 dark:text-gray-300">
                    Sistema integral para la gestión de información médica de pacientes
                </p>
            </div>

            <!-- Estadísticas principales -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <CardStats
                    statSubtitle="Pacientes Activos"
                    statTitle="1,248"
                    statArrow="up"
                    statPercent="12.5"
                    statDescripition="Este mes"
                    statIconName="fas fa-user-injured"
                    statIconColor="bg-blue-500"
                />
                <CardStats
                    statSubtitle="Nuevos Pacientes"
                    statTitle="86"
                    statArrow="up"
                    statPercent="8.2"
                    statDescripition="Esta semana"
                    statIconName="fas fa-user-plus"
                    statIconColor="bg-green-500"
                />
                <CardStats
                    statSubtitle="Citas Pendientes"
                    statTitle="42"
                    statArrow="down"
                    statPercent="3.8"
                    statPercentColor="text-red-500"
                    statDescripition="Desde ayer"
                    statIconName="fas fa-calendar-check"
                    statIconColor="bg-purple-500"
                />
                <CardStats
                    statSubtitle="Presupuestos"
                    statTitle="28"
                    statArrow="up"
                    statPercent="5.3"
                    statDescripition="Última semana"
                    statIconName="fas fa-file-invoice-dollar"
                    statIconColor="bg-amber-500"
                />
            </div>

            <!-- Módulos principales -->
            <div>
                <h2 class="text-xl font-bold mb-6 text-gray-800 dark:text-white flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                    </svg>
                    Módulos Principales
                </h2>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Módulo de Pacientes -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <div class="bg-gradient-to-r from-blue-50 to-blue-100 dark:from-blue-900 dark:to-blue-800 p-5">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-lg text-gray-800 dark:text-white">Pacientes</h3>
                                <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">Gestión completa de registros de pacientes</p>
                        </div>
                        <div class="p-5">
                            <a href="#" class="block w-full px-4 py-2 text-sm font-medium text-center text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors duration-200">
                                Acceder al módulo
                            </a>
                        </div>
                    </div>

                    <!-- Módulo de Historial Médico -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <div class="bg-gradient-to-r from-green-50 to-green-100 dark:from-green-900 dark:to-green-800 p-5">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-lg text-gray-800 dark:text-white">Historial Médico</h3>
                                <div class="p-3 rounded-full bg-green-100 dark:bg-green-900/50 text-green-600 dark:text-green-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">Registros clínicos y antecedentes médicos</p>
                        </div>
                        <div class="p-5">
                            <a href="#" class="block w-full px-4 py-2 text-sm font-medium text-center text-white bg-green-600 hover:bg-green-700 rounded-lg transition-colors duration-200">
                                Acceder al módulo
                            </a>
                        </div>
                    </div>

                    <!-- Módulo de Presupuestos -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <div class="bg-gradient-to-r from-amber-50 to-amber-100 dark:from-amber-900 dark:to-amber-800 p-5">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-lg text-gray-800 dark:text-white">Presupuestos</h3>
                                <div class="p-3 rounded-full bg-amber-100 dark:bg-amber-900/50 text-amber-600 dark:text-amber-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">Gestión de presupuestos y facturación</p>
                        </div>
                        <div class="p-5">
                            <a href="#" class="block w-full px-4 py-2 text-sm font-medium text-center text-white bg-amber-600 hover:bg-amber-700 rounded-lg transition-colors duration-200">
                                Acceder al módulo
                            </a>
                        </div>
                    </div>

                    <!-- Módulo de Citas -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <div class="bg-gradient-to-r from-purple-50 to-purple-100 dark:from-purple-900 dark:to-purple-800 p-5">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-lg text-gray-800 dark:text-white">Citas Médicas</h3>
                                <div class="p-3 rounded-full bg-purple-100 dark:bg-purple-900/50 text-purple-600 dark:text-purple-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">Agendamiento y control de citas</p>
                        </div>
                        <div class="p-5">
                            <a href="#" class="block w-full px-4 py-2 text-sm font-medium text-center text-white bg-purple-600 hover:bg-purple-700 rounded-lg transition-colors duration-200">
                                Acceder al módulo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </AuthenticatedLayout>
</template>