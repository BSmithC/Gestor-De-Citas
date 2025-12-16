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
                        class=" bg-white/80 dark:bg-gray-800/80 rounded-2xl shadow-lg p-4 mb-6 border border-white/20 dark:border-gray-700/50">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                            <Link :href="route('drugs.create')"
                                class="flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg hover:from-green-600 hover:to-emerald-700 focus:ring-4 focus:outline-none focus:ring-green-200 shadow-lg transition-all transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            Nuevo Paciente
                            </Link>

                            <div class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto">
                                <LastDays v-model="filters.lastDays" @change="submit" class="w-full sm:w-auto" />

                                <div class="relative w-full sm:w-64">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input @input="submit()" v-model="filters.search" id="table-search"
                              class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-all"
                                        placeholder="Buscar pacientes...">
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
                                    <tr v-for="drug in drugs.data" :key="drug.id"
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
                                            <Link :href="route('drugs.show',drug.id )"
                                                class="flex items-center gap-1 text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    <path fill-rule="evenodd"
                                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Ver
                                            </Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                                        <Pagination :pagination="drugs" :filters="form" />
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
import Pagination from '@/Components/Pagination.vue';
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
        // openModal(drug) {
        //     this.form = { ...drug };
        //     this.infoModal = true;
        // },

        // closeModal() {
        //     this.infoModal = false;
        // },
    },
    components: {
        Head,
        AuthenticatedLayout,
        LastDays,
        Link,
        ref,
        Pagination
    },
};
</script>
