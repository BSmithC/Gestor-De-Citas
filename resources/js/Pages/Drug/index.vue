<template>

    <Head title="Drug Management" />
    <AuthenticatedLayout>
        <template #header>
            <div class="text-white text-2xl font-bold flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                </svg>
                MEDICATION INVENTORY
            </div>
        </template>

        <template #default>
            <div
                class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 p-6">
                <!-- Main Content Container -->
                <div class="max-w-7xl mx-auto">
                    <!-- Action Bar with Glass Morphism Effect -->
                    <div
<<<<<<< HEAD
                        class="backdrop-blur-lg bg-white/80 dark:bg-gray-800/80 rounded-2xl shadow-lg p-4 mb-6 border border-white/20 dark:border-gray-700/50">
                        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                            <Link :href="route('drugs.create')"
                                class="flex items-center gap-2 px-5 py-3 text-sm font-medium text-white bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl hover:from-emerald-600 hover:to-teal-700 focus:ring-4 focus:outline-none focus:ring-emerald-300 shadow-lg transition-all transform hover:scale-[1.02]">
=======
                        class=" bg-white/80 dark:bg-gray-800/80 rounded-2xl shadow-lg p-4 mb-6 border border-white/20 dark:border-gray-700/50">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                            <Link :href="route('drugs.create')"
                                class="flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg hover:from-green-600 hover:to-emerald-700 focus:ring-4 focus:outline-none focus:ring-green-200 shadow-lg transition-all transform hover:scale-105">
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                    clip-rule="evenodd" />
                            </svg>
<<<<<<< HEAD
                            ADD NEW MEDICATION
                            </Link>

                            <div class="flex flex-col sm:flex-row items-center gap-4 w-full md:w-auto">
                                <LastDays v-model="filters.lastDays" @change="submit" class="w-full md:w-auto" />

                                <div class="relative w-full md:w-64">
=======
                            Nuevo Paciente
                            </Link>

                            <div class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto">
                                <LastDays v-model="filters.lastDays" @change="submit" class="w-full sm:w-auto" />

                                <div class="relative w-full sm:w-64">
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input @input="submit()" v-model="filters.search" id="table-search"
<<<<<<< HEAD
                                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-white/50 dark:bg-gray-700/50 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-all"
                                        placeholder="Search medications...">
=======
                                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-all"
                                        placeholder="Buscar pacientes...">
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Medications Table with Glass Card -->
                    <div
                        class="backdrop-blur-lg bg-white/80 dark:bg-gray-800/80 rounded-2xl shadow-lg overflow-hidden border border-white/20 dark:border-gray-700/50">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead
                                    class="bg-gradient-to-r from-purple-600 to-indigo-600 dark:from-purple-800 dark:to-indigo-800">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            MEDICATION
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            DESCRIPTION
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            ADMINISTRATION
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            FREQUENCY
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            DURATION
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-right text-xs font-medium text-white uppercase tracking-wider">
                                            ACTIONS
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white/50 dark:bg-gray-800/50 divide-y divide-gray-200 dark:divide-gray-700">
<<<<<<< HEAD
                                    <tr v-for="drug in drugs" :key="drug.id"
=======
                                    <tr v-for="drug in drugs.data" :key="drug.id"
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
                                        class="hover:bg-gray-50/70 dark:hover:bg-gray-700/70 transition-colors">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                            #{{ drug.id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex-shrink-0 h-10 w-10 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-6 w-6 text-purple-600 dark:text-purple-300" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ drug.name.slice(0, 25) + '...' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-500 dark:text-gray-400 max-w-xs truncate">
                                                {{ drug.description }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                {{ drug.route || 'N/A' }}
                                            </span>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            {{ drug.frequency || 'N/A' }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            {{ drug.duration || 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button @click="openModal(drug)"
                                                class="flex items-center gap-1 text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    <path fill-rule="evenodd"
                                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Details
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Medication Detail Modal -->
                <div v-if="infoModal"
                    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm transition-opacity duration-300">
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto border border-white/20 dark:border-gray-700/50">
                        <!-- Modal Header -->
                        <div
                            class="sticky top-0 z-10 bg-gradient-to-r from-purple-600 to-indigo-600 dark:from-purple-800 dark:to-indigo-800 px-6 py-4 rounded-t-2xl flex justify-between items-center">
                            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Medication Details: {{ form.name }}
                            </h2>
                            <div class="flex space-x-2">
                                <Link :href="route('drugs.edit', form.id)"
                                    class="flex items-center gap-1 px-4 py-2 text-sm font-medium text-yellow-800 bg-yellow-400 hover:bg-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-300 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                                Edit
                                </Link>
                                <button @click="closeModal"
                                    class="p-2 text-white hover:text-gray-200 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Modal Content -->
                        <div class="p-6 space-y-6">
                            <!-- Medication Information Grid -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <!-- Basic Information Card -->
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
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Basic Information
                                        </h3>
                                    </div>
                                    <div class="p-4">
                                        <dl class="space-y-4">
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Name
                                                </dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ form.name || 'Not available' }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    Description</dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ form.description || 'Not available' }}
                                                </dd>
                                            </div>
                                        </dl>
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
                                    <div class="p-4">
                                        <dl class="space-y-4">
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Route
                                                </dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ form.route || 'Not specified' }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    Frequency</dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ form.frequency || 'Not specified' }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    Duration</dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ form.duration || 'Not specified' }}
                                                </dd>
                                            </div>
                                        </dl>
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
                            class="sticky bottom-0 bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600 rounded-b-2xl flex justify-end">
                            <button @click="closeModal"
                                class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-200 dark:bg-gray-600 hover:bg-gray-300 dark:hover:bg-gray-500 rounded-lg transition-colors">
                                Close
                            </button>
                        </div>
                    </div>
<<<<<<< HEAD
                </div>
=======
                </div>a
                <Pagination :pagination="drugs" :filters="form" />
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
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
<<<<<<< HEAD
=======
import Pagination from '@/Components/Pagination.vue'
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)

export default {
    props: {
        drugs: Object,
        filters: Object
    },
    data() {
        return {
            form: {
                search: this.filters.search || '',
            },
            infoModal: false,
            form: {
                id: null,
                name: '',
                description: '',
                route: '',
                frequency: '',
                duration: '',
                search: this.filters.search || '',
                lastDays: this.filters.lastDays || '1',
            }
        };
    },
    methods: {
        submit() {
            this.form.search = this.filters.search || '';
            this.form.lastDays = this.filters.lastDays || '1';
            this.$inertia.get(route('drugs.index'), this.form, {
                preserveState: true,
                preserveScroll: true,
                replace: true
            });
        },
        openModal(drug) {
            this.form = { ...drug };
            this.infoModal = true;
        },

        closeModal() {
            this.infoModal = false;
        },
    },
    components: {
        Head,
        AuthenticatedLayout,
        LastDays,
        Link,
        ref, 
<<<<<<< HEAD
        router
=======
        router,
        Pagination
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
    },
};
</script>