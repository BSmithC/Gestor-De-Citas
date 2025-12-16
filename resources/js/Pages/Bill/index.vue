<template>

    <Head title="Billing Management" />
    <AuthenticatedLayout>
        <template #header>
            <div class="text-white text-2xl font-bold flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
                </svg>
                BILLING MANAGEMENT
            </div>
        </template>

        <template #default>
            <div
                class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 p-6">
                <!-- Main Content Container -->
                <div class="max-w-7xl mx-auto">
                    <!-- Action Bar with Glass Morphism -->
                    <div
                        class="backdrop-blur-lg bg-white/80 dark:bg-gray-800/80 rounded-2xl shadow-lg p-4 mb-6 border border-white/20 dark:border-gray-700/50">
                        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                            <Link :href="route('bills.create')"
                                class="flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg hover:from-green-600 hover:to-emerald-700 focus:ring-4 focus:outline-none focus:ring-green-200 shadow-lg transition-all transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            Nuevo Paciente
                            </Link>

                            <div class="flex flex-col sm:flex-row items-center gap-4 w-full md:w-auto">
                                <LastDays v-model="filters.lastDays" @change="submit" class="w-full md:w-auto" />

                                <div class="relative w-full md:w-64">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input @input="submit()" v-model="filters.search" id="table-search"
                                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-white/50 dark:bg-gray-700/50 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-all"
                                        placeholder="Search bills...">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bills Table with Glass Card -->
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
                                            PATIENT
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            DOCTOR
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            TOTAL
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            STATUS
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-right text-xs font-medium text-white uppercase tracking-wider">
                                            ACTIONS
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white/50 dark:bg-gray-800/50 divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr v-for="bill in bills.data" :key="bill.id"
                                        class="hover:bg-gray-50/70 dark:hover:bg-gray-700/70 transition-colors">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                            #{{ bill.id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-6 w-6 text-blue-600 dark:text-blue-300" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ bill.patient.name }} {{ bill.patient.last_name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-white">
                                                Dr. {{ bill.user.name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-semibold text-gray-900 dark:text-white">
                                                {{ bill.total ? `$${bill.total}` : 'Pending' }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                :class="`px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${bill.status ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200'}`">
                                                {{ bill.status ? 'Paid' : 'Pending' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <Link :href="route('bills.show', bill.id)"
                                                class="flex items-center gap-1 text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd"
                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Details
                                            </Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <Pagination :pagination="bills" :filters="form" />
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
        bills: Object,
        filters: Object,
    },
    methods: {
        submit() {
            this.form.search = this.filters.search || '';
            this.form.lastDays = this.filters.lastDays || '1';
            this.$inertia.get(route('bills.index'), this.form, {
                preserveState: true,
                preserveScroll: true,
                replace: true
            });
        },
    },

    components: {
        Head,
        AuthenticatedLayout,
        Link,
        LastDays,
        ref,
        Pagination
    },
};
</script>
