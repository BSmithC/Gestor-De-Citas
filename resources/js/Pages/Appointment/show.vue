<template>
    <Head title="Appointments" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                    Appointment Management
                </h1>
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                    <svg class="mr-1.5 h-2 w-2 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                        <circle cx="4" cy="4" r="3" />
                    </svg>
                    Active System
                </span>
            </div>
        </template>
        <template #default>
                        <div>
                            <div>
                                <div class="p-6 space-y-6">
                                    <div class="space-y-4">
                                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 shadow-sm">
                                            <h3 class="font-semibold text-lg text-gray-700 dark:text-white mb-3">
                                                Appointment
                                                Information</h3>
                                            <dl class="space-y-3">
                                                <div
                                                    class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-gray-200 dark:border-gray-600">
                                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        Patient Name
                                                    </dt>
                                                    <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{
                                                        appointments.patient_id }} {{ 'N/A' }}</dd>
                                                </div>
                                                <div
                                                    class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-gray-200 dark:border-gray-600">
                                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        Doctor Name
                                                    </dt>
                                                    <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{
                                                        }} {{ appointments.patient_id || 'N/A' }}</dd>
                                                </div>
                                                <div
                                                    class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-gray-200 dark:border-gray-600">
                                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        Appointment
                                                        Date</dt>
                                                    <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{
                                                        appointments.date }}
                                                    </dd>
                                                </div>
                                                <div
                                                    class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-gray-200 dark:border-gray-600">
                                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        Time Slot</dt>
                                                    <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{
                                                        appointments.starttime }} - {{ appointments.endtime }}</dd>
                                                </div>
                                                <div
                                                    class="flex flex-col sm:flex-row sm:items-center justify-between pt-2">
                                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        Status</dt>
                                                    <dd class="text-sm font-semibold" :class="{
                                                        'text-green-600 dark:text-green-400': appointments.active,
                                                        'text-red-600 dark:text-red-400': !appointments.active
                                                    }">
                                                        {{ appointments.active ? 'Active' : 'Inactive' }}
                                                    </dd>
                                                </div>
                                            </dl>
                                        </div>
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

	export default{
		props: {
			patients: Object,
        	doctors: Object,
        	appointments: Object,
        	filters: Object
		},
		components: {
	    	Head,
        	AuthenticatedLayout,
        	Link,
        	LastDays,
        	ref,
        	router
		},
		data(){
			return{
				form: {
					id: '',
                	title: '',
                	doctor_id: '',
                	patient_id: '',
                	attended: '',
                	date: '',
                	endtime: '',
                	active: true,
				},
			}
		},
		methods: {
		formatDate(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' }
            return new Date(dateString).toLocaleDateString(undefined, options)
        	}
    	},
    	submit() {
        	this.form.search = this.filters.search || '';
        	this.form.lastDays = this.filters.lastDays || '1';
        	this.$inertia.get(route('appointments.index'), this.form, {
        	    preserveState: true,
        	    preserveScroll: true,
        	    replace: true
        	});
		},
	}
</script>