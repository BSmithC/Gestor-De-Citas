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
                                class="flex items-center gap-2 px-5 py-3 text-sm font-medium text-white bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl hover:from-emerald-600 hover:to-teal-700 focus:ring-4 focus:outline-none focus:ring-emerald-300 shadow-lg transition-all transform hover:scale-[1.02]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            CREATE NEW BILL
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
                                    <tr v-for="bill in bills" :key="bill.id"
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
                                            <button @click="openModal(bill)"
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

                <!-- Bill Detail Modal -->
                <div v-if="infoModal"
                    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm transition-opacity duration-300">
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-6xl max-h-[90vh] overflow-y-auto border border-white/20 dark:border-gray-700/50">
                        <!-- Modal Header -->
                        <div
                            class="sticky top-0 z-10 bg-gradient-to-r from-purple-600 to-indigo-600 dark:from-purple-800 dark:to-indigo-800 px-6 py-4 rounded-t-2xl flex justify-between items-center">
                            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
                                </svg>
                                Invoice #{{ form.id }}
                            </h2>
                            <div class="flex space-x-2">
                                <Link :href="route('bills.edit', form.id)"
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
                            <!-- Invoice Information Grid -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <!-- Company Information Card -->
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
                                                    d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Company Information
                                        </h3>
                                    </div>
                                    <div class="p-4">
                                        <dl class="space-y-4">
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Company
                                                    Name</dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ form.company_name || 'Not available' }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Tax ID
                                                    (RNC)</dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ form.rnc || 'Not available' }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Address
                                                </dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ form.company_address || 'Not available' }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Phone
                                                </dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ form.company_phone || 'Not available' }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email
                                                </dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ form.company_email || 'Not available' }}
                                                </dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>

                                <!-- Patient Information Card -->
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
                                                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Patient Information
                                        </h3>
                                    </div>
                                    <div class="p-4">
                                        <dl class="space-y-4">
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Patient
                                                </dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ form.patient.name }} {{ form.patient.last_name }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Doctor
                                                </dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    Dr. {{ form.user.name }}
                                                </dd>
                                            </div>
                                            <div class="grid grid-cols-3 gap-4">
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Payment
                                                    Type</dt>
                                                <dd
                                                    class="col-span-2 text-sm text-gray-900 dark:text-white font-medium">
                                                    {{ form.payment_type || 'Not specified' }}
                                                </dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <!-- Services Table -->
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
                                        Services Provided
                                    </h3>
                                </div>
                                <div class="p-4">
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                            <thead class="bg-gray-100 dark:bg-gray-600">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                                        Service
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                                        Time
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                                        Price
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-right text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                                        Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-700">
                                                <tr v-for="detail in form.bill_details" :key="detail.id"
                                                    class="hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                        {{ detail.service || 'Not specified' }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                        {{ detail.hour || 'Not specified' }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ detail.price ? `$${detail.price}` : 'Not specified' }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <Link href="#"
                                                            class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">
                                                        Edit
                                                        </Link>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Invoice Summary -->
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
                                                d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Invoice Summary
                                    </h3>
                                </div>
                                <div class="p-4">
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div class="bg-gray-50 dark:bg-gray-600 p-4 rounded-lg">
                                            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Subtotal
                                            </div>
                                            <div class="text-xl font-semibold text-gray-900 dark:text-white">{{
                                                form.sub_total ? `$${form.sub_total}` : 'Not available'
                                            }}</div>
                                        </div>
                                        <div class="bg-gray-50 dark:bg-gray-600 p-4 rounded-lg">
                                            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Tax
                                                (ITBIS)</div>
                                            <div class="text-xl font-semibold text-gray-900 dark:text-white">{{
                                                form.itbis ? `$${selectedBill.itbis}` : 'Not available' }}</div>
                                        </div>
                                        <div
                                            class="bg-purple-50 dark:bg-purple-900/30 p-4 rounded-lg border border-purple-200 dark:border-purple-800">
                                            <div class="text-sm font-medium text-purple-600 dark:text-purple-400">Total
                                                Amount</div>
                                            <div class="text-2xl font-bold text-purple-700 dark:text-purple-300">{{
                                                selectedBill.total ? `$${selectedBill.total}` : 'Not available' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div
                            class="sticky bottom-0 bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600 rounded-b-2xl flex justify-between">
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                Invoice generated on {{ new Date().toLocaleDateString() }}
                            </div>
                            <div class="flex space-x-4">
                                <button
                                    class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-200 dark:bg-gray-600 hover:bg-gray-300 dark:hover:bg-gray-500 rounded-lg transition-colors">
                                    Print Invoice
                                </button>
                                <button @click="closeModal"
                                    class="px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-indigo-600 rounded-lg hover:from-purple-700 hover:to-indigo-700 focus:ring-2 focus:outline-none focus:ring-purple-300 transition-colors">
                                    Close
                                </button>
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

export default {
    props: {
        bills: Object,
        filters: Object,
    },
    data() {
        return {
            infoModal: false,
            form: {
                id: null,
                drugs_id: '',
                users_id: '',
                itbis: '',
                sub_total: '',
                total: '',
                payment_type: '',
                status: true,
                search: this.filters.search || '',
                lastDays: this.filters.lastDays || '1',
            }
        };
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
        openModal(bill) {
            this.form = { ...bill };
            this.infoModal = true;
        },
        closeModal() {
            this.infoModal = false;
        },
    },

    components: {
        Head,
        AuthenticatedLayout,
        Link,
        LastDays,
        ref,
        router
    },
};
</script>
