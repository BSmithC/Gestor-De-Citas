<template>

    <Head title="Edit Bill" />
    <AuthenticatedLayout>
        <template #header>
            <div class="text-white text-2xl font-bold flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
                </svg>
                EDIT INVOICE #{{ updateBills.id }}
            </div>
        </template>

        <template #default>
            <div
                class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 p-6">
                <div class="max-w-6xl mx-auto">
                    <!-- Form Container with Glass Effect -->
                    <div
                        class="backdrop-blur-lg bg-white/80 dark:bg-gray-800/80 rounded-2xl shadow-xl overflow-hidden border border-white/20 dark:border-gray-700/50">
                        <!-- Form Header with Gradient -->
                        <div
                            class="bg-gradient-to-r from-purple-600 to-indigo-600 dark:from-purple-800 dark:to-indigo-800 px-6 py-4">
                            <h3 class="text-xl font-semibold text-white flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Invoice Details
                            </h3>
                        </div>

                        <!-- Form Content -->
                        <form @submit.prevent="updateBill" class="p-6 space-y-6">
                            <!-- Services Table Section -->
                            <div
                                class="bg-white dark:bg-gray-700 rounded-xl shadow-md overflow-hidden border border-gray-200 dark:border-gray-600">
                                <div
                                    class="bg-gray-50 dark:bg-gray-600 px-4 py-3 border-b border-gray-200 dark:border-gray-500 flex justify-between items-center">
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
                                        Services & Procedures
                                    </h3>
                                    <button @click="addRow" type="button"
                                        class="flex items-center gap-1 px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-2 focus:outline-none focus:ring-green-300 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Add Service
                                    </button>
                                </div>
                                <div class="p-4 overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">#</th>
                                                <th scope="col" class="px-6 py-3">Service Description</th>
                                                <th scope="col" class="px-6 py-3">Duration (hrs)</th>
                                                <th scope="col" class="px-6 py-3">Price ($)</th>
                                                <th scope="col" class="px-6 py-3 text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-if="table_bill.length === 0"
                                                class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                                                <td colspan="5"
                                                    class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                                    No services added yet
                                                </td>
                                            </tr>
                                            <tr v-for="(bill, index) in table_bill" :key="index"
                                                class="bg-white dark:bg-gray-800 border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ index + 1 }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <input type="text" v-model="bill.service" :disabled="disable_inputs"
                                                        class="w-full px-3 py-2 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500 transition-all">
                                                </td>
                                                <td class="px-6 py-4">
                                                    <input type="number" v-model="bill.hour" :disabled="disable_inputs"
                                                        class="w-full px-3 py-2 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500 transition-all">
                                                </td>
                                                <td class="px-6 py-4">
                                                    <input type="number" v-model="bill.price" :disabled="disable_inputs"
                                                        class="w-full px-3 py-2 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500 transition-all">
                                                </td>
                                                <td class="px-6 py-4 text-right">
                                                    <button @click="removeRow(index)" type="button"
                                                        class="px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300 transition-colors">
                                                        Remove
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Professional Selection Section -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <!-- Doctor Selection Card -->
                                <div
                                    class="bg-white dark:bg-gray-700 rounded-xl shadow-md overflow-hidden border border-gray-200 dark:border-gray-600">
                                    <div
                                        class="bg-gray-50 dark:bg-gray-600 px-4 py-3 border-b border-gray-200 dark:border-gray-500">
                                        <h3
                                            class="text-lg font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 text-purple-600 dark:text-purple-400" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 12.094A5.973 5.973 0 004 15v1H1v-1a3 3 0 013.75-2.906z" />
                                            </svg>
                                            Attending Professional
                                        </h3>
                                    </div>
                                    <div class="p-4">
                                        <select v-model="updateBills.users_id"
                                            class="w-full px-4 py-2.5 mb-4 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500 transition-all">
                                            <option disabled value="">Select Doctor</option>
                                            <option v-for="user in users" :key="user.id" :value="user">
                                                Dr. {{ user.name }} {{ user.last_name }}
                                            </option>
                                        </select>
                                        <div class="bg-gray-100 dark:bg-gray-600/50 p-4 rounded-lg">
                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <p class="text-sm text-gray-500 dark:text-gray-400">Name</p>
                                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{
                                                        updateBills.users_id.name || 'Not selected' }}</p>
                                                </div>
                                                <div>
                                                    <p class="text-sm text-gray-500 dark:text-gray-400">Phone</p>
                                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{
                                                        updateBills.users_id.phone_number || 'Not available' }}</p>
                                                </div>
                                                <div>
                                                    <p class="text-sm text-gray-500 dark:text-gray-400">Email</p>
                                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{
                                                        updateBills.users_id.email || 'Not available' }}</p>
                                                </div>
                                                <div>
                                                    <p class="text-sm text-gray-500 dark:text-gray-400">Specialty</p>
                                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{
                                                        updateBills.users_id.specialty || 'Not specified' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Medication Selection Card -->
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
                                                    d="M3 5a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5zm11 1H6v8l4-2 4 2V6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Prescribed Medication
                                        </h3>
                                    </div>
                                    <div class="p-4">
                                        <select v-model="updateBills.drug_id"
                                            class="w-full px-4 py-2.5 mb-4 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500 transition-all">
                                            <option disabled value="">Select Medication</option>
                                            <option v-for="drug in drugs" :key="drug.id" :value="drug">
                                                {{ drug.name }} ({{ drug.route }})
                                            </option>
                                        </select>
                                        <div class="bg-gray-100 dark:bg-gray-600/50 p-4 rounded-lg">
                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <p class="text-sm text-gray-500 dark:text-gray-400">Medication</p>
                                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{
                                                        updateBills.drug_id.name || 'Not selected' }}</p>
                                                </div>
                                                <div>
                                                    <p class="text-sm text-gray-500 dark:text-gray-400">Administration
                                                    </p>
                                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{
                                                        updateBills.drug_id.route || 'Not specified' }}</p>
                                                </div>
                                                <div>
                                                    <p class="text-sm text-gray-500 dark:text-gray-400">Frequency</p>
                                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{
                                                        updateBills.drug_id.frequency || 'Not specified' }}</p>
                                                </div>
                                                <div>
                                                    <p class="text-sm text-gray-500 dark:text-gray-400">Duration</p>
                                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{
                                                        updateBills.drug_id.duration || 'Not specified' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Summary Section -->
                            <div
                                class="bg-white dark:bg-gray-700 rounded-xl shadow-md overflow-hidden border border-gray-200 dark:border-gray-600">
                                <div
                                    class="bg-gray-50 dark:bg-gray-600 px-4 py-3 border-b border-gray-200 dark:border-gray-500">
                                    <h3
                                        class="text-lg font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 text-purple-600 dark:text-purple-400" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Payment Summary
                                    </h3>
                                </div>
                                <div class="p-4">
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div class="bg-gray-50 dark:bg-gray-600 p-4 rounded-lg">
                                            <label
                                                class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Payment
                                                Type</label>
                                            <select v-model="updateBills.payment_type"
                                                class="w-full px-4 py-2 text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500 transition-all">
                                                <option value="Cash">Cash</option>
                                                <option value="Credit Card">Credit Card</option>
                                                <option value="Insurance">Insurance</option>
                                                <option value="Bank Transfer">Bank Transfer</option>
                                            </select>
                                        </div>
                                        <div class="bg-gray-50 dark:bg-gray-600 p-4 rounded-lg">
                                            <p class="text-sm text-gray-700 dark:text-gray-300">Subtotal</p>
                                            <p class="text-xl font-semibold text-gray-900 dark:text-white">${{
                                                updateBills.sub_total || '0.00' }}</p>
                                        </div>
                                        <div
                                            class="bg-purple-50 dark:bg-purple-900/30 p-4 rounded-lg border border-purple-200 dark:border-purple-800">
                                            <p class="text-sm text-purple-600 dark:text-purple-400">Total Amount</p>
                                            <p class="text-2xl font-bold text-purple-700 dark:text-purple-300">${{
                                                updateBills.total || '0.00' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                                <button @click="closeModal" type="button"
                                    class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-2 focus:outline-none focus:ring-gray-200 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:border-gray-700 dark:focus:ring-gray-700 transition-colors">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="px-6 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-indigo-600 rounded-lg hover:from-purple-700 hover:to-indigo-700 focus:ring-2 focus:outline-none focus:ring-purple-300 shadow-lg transition-all transform hover:scale-[1.02]">
                                    Update Invoice
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
import { ref, computed } from 'vue';
import { router } from '@inertiajs/vue3';
import LastDays from '@/Components/LastDays.vue';

export default {
    props: {
        users: Object,
        drugs: Object,
        editbills: Object,
    },
    data() {
        return {
            updateBills: {
                drug_id: this.editbills?.drug_id ?? '',
                users_id: this.editbills?.users_id ?? '',
                itbis: this.editbills?.itbis ?? '',
                sub_total: this.editbills?.sub_total ?? '',
                total: this.editbills?.total ?? '',
                payment_type: this.editbills?.payment_type ?? 'cash',
                status: this.editbills?.status ?? true,
            },
            select_user: ref({}),
            select_drug: ref({}),
            itbis_rate: 0.18,
            disable_inputs: true,
            table_bill: this.editbills?.bill_details ?? [{ service: '', hour: 0, price: 0, }],
            erros: {}
        };
    },
    computed: {
        subtotal() {
            return this.table_bill.reduce((acc, item) => {
                const rowTotal = item.hour * item.price;
                return acc + (isNaN(rowTotal) ? 0 : rowTotal);
            }, 0);
        },
        itbis() {
            this.subtotal * this.itbis_rate;
        },
        total() {
            this.subtotal + this.itbis;
        },
        selectuser() {
            return this.users.find(user => user.id === this.updateBills.users_id) || {};
        },
        selectDrug() {
            return this.drugs.find(drug => drug.id === this.updateBills.drug_id) || {};
        },
    },
    methods: {
        addRow() {
            this.table_bill.push({
                service: '',
                hour: 0,
                price: 0
            });
            this.disable_inputs = this.table_bill.some(row =>
                row.service && row.hour > 0 && row.price > 0
            );
        },
        removeRow(index) {
            this.table_bill.splice(index, 1)
            this.disable_inputs = false;
        },
        updateBill() {
            this.updateBills.sub_total = this.subtotal.toFixed(2);
            this.updateBills.itbis = this.itbis.toFixed(2);
            this.updateBills.total = this.total.toFixed(2);
            const data = {
                form: {
                    drug_id: this.updateBills.drug_id.id,
                    itbis: this.updateBills.itbis,
                    sub_total: this.updateBills.sub_total,
                    total: this.updateBills.total,
                    status: this.updateBills.status,
                    payment_type: this.updateBills.payment_type,
                    users_id: this.updateBills.users_id.id,
                },
                details: this.table_bill
            };
            console.log(data);
            router.post(route('bills.update', this.editbills.id), data, {
                onSuccess: (success) => {
                    this.success = success;
                    // toast.success('¡Guardado con éxito!');
                    console.log(success);
                },
                onError: (errors) => {
                    this.errors = errors;
                    // toast.error('¡Error No Se Creado Paciente!');
                    console.log(errors);
                }
            });
        }
    },
    components: {
        Head,
        AuthenticatedLayout,
        LastDays,
        Link,
        computed,
    }
};

</script>
