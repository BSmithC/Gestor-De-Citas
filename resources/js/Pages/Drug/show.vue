<template>
    <Head title="Drug Management" />
    <AuthenticatedLayout>
        <template #header>
            <div class="text-white text-2xl font-bold flex items-center gap-3">
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Medication Details: {{ drugs.name}}
                </h2>
            </div>
        </template>

        <template #default>
                            <!-- Medication Detail Modal -->
                <div>
                    <div>
                        <!-- Modal Content -->
                        <div class="p-6 space-y-6">
                            <!-- Medication Information Grid -->
                            <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
                                <!-- Basic Information Card -->
                                <div
                                    class="bg-white dark:bg-gray-700 rounded-xl shadow-md overflow-hidden border border-gray-200 dark:border-gray-600">
                                    <div
                                        class="bg-gray-50 dark:bg-gray-600 border-b border-gray-200 dark:border-gray-500 px-6 py-3 rounded-t-2xl flex justify-between items-center">
                                        <h3
                                            class="text-lg font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 text-purple-600 dark:text-purple-400" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Basic Information
                                        </h3>
                                            <div class="flex space-x-2">
                                                <Link :href="route('drugs.edit', drugs.id)"
                                                    class="flex items-center gap-1 px-4 py-2 text-sm font-medium text-yellow-800 bg-yellow-400 hover:bg-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-300 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379                 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                                Edit
                                                </Link>
                                            </div>
                                    </div>
                                    <div v-if="drugs" class="p-4">
                                        <dl class="space-y-4">
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Name
                                                </dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ drugs.name || 'Not available' }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    Description</dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ drugs.description || 'Not available' }}
                                                </dd>
                                            </div>
                                        </dl>
                                    </div>

                                      <div v-else class="text-center py-8 text-gray-500 dark:text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-2"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <p>No additional information available</p>
                                    </div>
                                </div>

                                <!-- Administration Card -->
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
                                                    d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Administration
                                        </h3>
                                    </div>
                                    <div v-if="drugs" class="p-4">
                                        <dl class="space-y-4">
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Route
                                                </dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ drugs.route || 'Not specified' }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    Frequency</dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ drugs.frequency || 'Not specified' }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    Duration</dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ drugs.duration || 'Not specified' }}
                                                </dd>
                                            </div>
                                        </dl>
                                    </div>
                                    <div v-else class="text-center py-8 text-gray-500 dark:text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-2"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <p>No additional information available</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Related Information -->
                            <div
                                class="bg-white dark:bg-gray-700 rounded-xl shadow-md overflow-hidden border border-gray-200 dark:border-gray-600">
                                <div
                                    class="bg-gray-50 dark:bg-gray-600 px-4 py-3 border-b border-gray-200 dark:border-gray-500">
                                    <h3
                                        class="text-lg font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 text-purple-600 dark:text-purple-400" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                            <path fill-rule="evenodd"
                                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Additional Information
                                    </h3>
                                </div>
                                <div class="p-4">
                                    <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-2"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <p>No additional information available</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div
                            class="bottom-0 bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600 rounded-b-2xl flex justify-end">
                            <button :Link="route('drugs.index')"
                                class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-200 dark:bg-gray-600 hover:bg-gray-300 dark:hover:bg-gray-500 rounded-lg transition-colors">
                                Close
                            </button>
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
        drugs: Object,
    },
    components: {
        Head,
        Link,
        AuthenticatedLayout,
        ref,
        router,
        LastDays
    },
    data(){
        return{
            form: {

            }
        }
    },
}
</script>