<template>
    <Head title="Create Medication" />
    <AuthenticatedLayout>
        <template #header>
            <div class="text-white text-2xl font-bold flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                </svg>
                CREATE NEW MEDICATION
            </div>
        </template>

        <template #default>
            <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 p-6">
                <div class="max-w-4xl mx-auto">
                    <!-- Form Container with Glass Effect -->
                    <div class="backdrop-blur-lg bg-white/80 dark:bg-gray-800/80 rounded-2xl shadow-xl overflow-hidden border border-white/20 dark:border-gray-700/50">
                        <!-- Form Header with Gradient -->
                        <div class="bg-gradient-to-r from-purple-600 to-indigo-600 dark:from-purple-800 dark:to-indigo-800 px-6 py-4">
                            <h3 class="text-xl font-semibold text-white flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Medication Details
                            </h3>
                        </div>

                        <!-- Form Content -->
                        <form @submit.prevent="submit" class="p-6 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Basic Information Column -->
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Medication Name*</label>
                                        <input v-model="drugs.name" type="text" id="name" placeholder="e.g. Amoxicillin" required 
                                            class="w-full px-4 py-2.5 text-sm text-gray-900 bg-gray-50/50 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700/50 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 transition-all duration-200">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Administration Route*</label>
                                        <select v-model="drugs.route" id="Route" required 
                                            class="w-full px-4 py-2.5 text-sm text-gray-900 bg-gray-50/50 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700/50 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500 transition-all duration-200">
                                            <option value="" disabled selected>Select route</option>
                                            <option value="Oral">Oral</option>
                                            <option value="Intravenous">Intravenous</option>
                                            <option value="Intramuscular">Intramuscular</option>
                                            <option value="Subcutaneous">Subcutaneous</option>
                                            <option value="Topical">Topical</option>
                                            <option value="Inhalation">Inhalation</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Duration*</label>
                                        <div class="relative">
                                            <input v-model="drugs.duration" type="text" id="duration" placeholder="e.g. 7 days" required 
                                                class="w-full px-4 py-2.5 text-sm text-gray-900 bg-gray-50/50 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700/50 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 transition-all duration-200">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Additional Information Column -->
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                                        <textarea v-model="drugs.description" id="message" rows="4" 
                                            class="block p-3 w-full text-sm text-gray-900 bg-gray-50/50 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700/50 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 transition-all duration-200" 
                                            placeholder="Enter medication description, indications, or special instructions..."></textarea>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Frequency*</label>
                                        <div class="relative">
                                            <input v-model="drugs.frequency" type="text" id="frequency" placeholder="e.g. Every 8 hours" required 
                                                class="w-full px-4 py-2.5 text-sm text-gray-900 bg-gray-50/50 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700/50 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 transition-all duration-200">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                                <Link :href="route('drugs.index')" 
                                    class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-2 focus:outline-none focus:ring-gray-200 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:border-gray-700 dark:focus:ring-gray-700 transition-colors">
                                    Cancel
                                </Link>
                                <button type="submit" 
                                    class="px-6 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-indigo-600 rounded-lg hover:from-purple-700 hover:to-indigo-700 focus:ring-2 focus:outline-none focus:ring-purple-300 shadow-lg transition-all transform hover:scale-[1.02]">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        Save Medication
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
import { ref  } from 'vue';
import { router } from '@inertiajs/vue3';
import LastDays from '@/Components/LastDays.vue';

export default {
    props: {
    drugs: Object,
    },
    data() {
        return {
            form: {drugs: this.drugs},
            errors: {}
        };
    },    
    methods: {
        submit() {
            console.log(this.form)  
            router.put(route('drugs.update',this.drugs), this.form.drugs, {
                onError: (errors) => {
                    this.errors = errors
                    console.log(errors)
                }
            })
        }
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