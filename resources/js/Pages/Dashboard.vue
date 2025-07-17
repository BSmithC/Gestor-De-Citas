<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Inicio - CRUD Pacientes" />

    <AuthenticatedLayout>
        <template #header>
            <h3 class="text-gray-900 dark:text-gray-100 text-2xl font-bold mb-4">
                👋 ¡Bienvenido al Gestor de Pacientes!
            </h3>
                <div>
                    <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Información Relacionada</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 text-sm">
                    <!-- Info -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 shadow">
                        <h3 class="font-semibold mb-2 text-gray-700 dark:text-white">Patient Information</h3>
                    </div>
                    <!-- Historial -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 shadow">
                        <h3 class="font-semibold mb-2 text-gray-700 dark:text-white">Historial Médico</h3>
                    </div>
                
                    <!-- Presupuesto -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 shadow">
                        <h3 class="font-semibold mb-2 text-gray-700 dark:text-white">Presupuesto</h3>
                    </div>
                
                    <!-- Citas -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 shadow">
                        <h3 class="font-semibold mb-2 text-gray-700 dark:text-white">Citas</h3>
                    </div>
                    </div>
                </div>
            
        </template>

    </AuthenticatedLayout>
</template>
