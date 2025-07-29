<template>
    <Head title="Nuevo Historial Médico" />
    <AuthenticatedLayout>
        <template #header>
            <div class="text-white text-2xl font-bold flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                </svg>
                Nuevo Historial Médico
            </div>
        </template>
        
        <template #default>
            <div @submit.prevent="submit()" class="min-h-screen bg-gray-50 dark:bg-gray-900 p-6">
                <div class="max-w-3xl mx-auto">
                    <!-- Form Container -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
                        <!-- Patient Info -->
                        <div class="bg-blue-50 dark:bg-blue-900 px-6 py-4 border-b border-blue-100 dark:border-blue-800">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0 h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-800 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <h1>{{ patients.name }} {{ patients.last_name }}</h1>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Form Content -->
                        <form class="p-6 space-y-6">
                            <!-- 1. Datos Básicos -->
                            <div>
                                <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-4 border-b pb-2">Datos de la Consulta</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-white dark:text-white mb-1">Médico</label>
                                        <select v-model="form.doctor_id" required class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                                            <option value="">Seleccione un doctor</option>
                                            <option v-for="doctor in doctors" :key="doctor.id"  :value="doctor.id"> {{ doctor.name }} {{ doctor.last_name }} </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- 2. Motivo y Síntomas -->
                            <div>
                                <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-4 border-b pb-2">Motivo y Síntomas</h3>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Motivo Principal*</label>
                                        <input v-model="form.reason" type="text" required placeholder="Ej: Dolor de cabeza, fiebre..." class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Síntomas*</label>
                                        <textarea v-model="form.symptoms" rows="3" required class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- 3. Examen Físico -->
                            <div>
                                <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-4 border-b pb-2">Examen Físico</h3>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                                    <div>
                                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Presión</label>
                                        <input v-model="form.blood_pressure" type="text" placeholder="120/80" class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Temp. (°C)</label>
                                        <input v-model="form.temperature" type="text" placeholder="36.5" class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Peso (kg)</label>
                                        <input v-model="form.weight" type="text" placeholder="68" class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">F. Cardíaca</label>
                                        <input v-model="form.heart_rate" type="text" placeholder="72" class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Observaciones</label>
                                    <textarea v-model="form.observation" rows="2" class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600"></textarea>
                                </div>
                            </div>
                            
                            <!-- 4. Diagnóstico -->
                            <div>
                                <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-4 border-b pb-2">Diagnóstico</h3>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Diagnóstico Principal*</label>
                                        <input v-model="form.diagnosis" type="text" required placeholder="Código o descripción" class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Notas</label>
                                        <textarea v-model="form.diagnosis_description" rows="2" class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- 5. Tratamiento -->
                            <div>
                                <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-4 border-b pb-2">Tratamiento</h3>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Medicamentos*</label>
                                        <select v-model="form.drug_id"> <option value="">Seleccione un medicamento</option>
                                            <option v-for="drug in drugs" :key="drug.id" :value="drug.id">{{ drug.name }}</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Indicaciones</label>
                                        <textarea v-model="form.description" rows="2" class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Form Actions -->
                            <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                                <button type="button" class="px-4 py-2 border rounded-lg text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    Cancelar
                                </button>
                                <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow">
                                    Guardar Historial
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
import { Head, Link, useForm} from '@inertiajs/vue3';
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
            form: useForm({
                diagnosis: '',
                reason: '',
                symptoms: '',
                diagnosis_description: '',
                description: '',
                blood_pressure: '',
                temperature: '',
                weight: '',
                heart_rate: '',
                observation: '',
                patient_id: this.patients.id,
                doctor_id: '',
                drug_id: '',
            }),
        }
    },
    methods: {
        submit() {
            this.form.post(route('medicalhistories.store'),);
        }
    },
    components: {
        Head,
        AuthenticatedLayout,
        LastDays,
        Link,
        ref,
        computed,
        onMounted,
        router
    }
}
</script>