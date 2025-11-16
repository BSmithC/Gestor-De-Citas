<template>

    <Head title="Create Patients" />
    <AuthenticatedLayout>
        <template #header>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">CREATE BILLS</h1>
        </template>
        <template #default>
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                    <form @submit.prevent="submit" class="p-6 space-y-6">
                        <!-- Header Section -->
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                            <h2 class="text-xl font-bold text-gray-800 dark:text-white">BILL INFORMATION</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Complete all required fields</p>
                        </div>

                        <!-- Three Column Grid -->
<<<<<<< HEAD
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
=======
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
                            <!-- Patient Info Card -->
                            <div
                                class="bg-gray-50 dark:bg-gray-700 rounded-lg p-5 shadow-sm border border-gray-200 dark:border-gray-600">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="font-semibold text-lg text-gray-700 dark:text-white">Patient Information
                                    </h3>
                                    <div
                                        class="w-8 h-8 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-purple-600 dark:text-purple-300" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>

                                <select v-model="form.patient_id"
                                    class="w-full mb-4 bg-purple-600 text-white hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center justify-between dark:bg-purple-700 dark:hover:bg-purple-800 dark:focus:ring-purple-900 transition-colors">
                                    <option disabled value="" class="bg-white text-gray-900">Select Patient</option>
                                    <option v-for="patient in patients" :key="patient.id" :value="patient.id"
                                        class="bg-white text-gray-900">
                                        {{ patient.name }} {{ patient.last_name }}
                                    </option>
                                </select>

                            </div>

                            <!-- Doctor Info Card -->
                            <div
                                class="bg-gray-50 dark:bg-gray-700 rounded-lg p-5 shadow-sm border border-gray-200 dark:border-gray-600">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="font-semibold text-lg text-gray-700 dark:text-white">Doctor Information
                                    </h3>
                                    <div
                                        class="w-8 h-8 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-300" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>

                                <select v-model="form.users_id"
                                    class="w-full mb-4 bg-blue-600 text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center justify-between dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus:ring-blue-900 transition-colors">
                                    <option disabled value="" class="bg-white text-gray-900">Select Doctor</option>
                                    <option v-for="user in users" :key="user.id" :value="user.id"
                                        class="bg-white text-gray-900">
                                        {{ user.name }} {{ user.last_name }}
                                    </option>
                                </select>
                            </div>
<<<<<<< HEAD

                            <!-- Drug Info Card -->
                            <div
                                class="bg-gray-50 dark:bg-gray-700 rounded-lg p-5 shadow-sm border border-gray-200 dark:border-gray-600">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="font-semibold text-lg text-gray-700 dark:text-white">Drug Information
                                    </h3>
                                    <div
                                        class="w-8 h-8 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-green-600 dark:text-green-300" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>

                                <select v-model="form.drug_id"
                                    class="w-full mb-4 bg-green-600 text-white hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center justify-between dark:bg-green-700 dark:hover:bg-green-800 dark:focus:ring-green-900 transition-colors">
                                    <option disabled value="" class="bg-white text-gray-900">Select Drug</option>
                                    <option v-for="drug in drugs" :key="drug.id" :value="drug.id"
                                        class="bg-white text-gray-900">
                                        {{ drug.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Payment Type Section -->
                        <div
                            class="bg-gray-50 dark:bg-gray-700 rounded-lg p-5 shadow-sm border border-gray-200 dark:border-gray-600">
                            <h3 class="font-semibold text-lg text-gray-700 dark:text-white mb-4">Payment Type</h3>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <button type="button"
                                    class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-center hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                                    <div class="flex items-center justify-center space-x-2">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                            </path>
                                        </svg>
                                        <span>Credit Card</span>
                                    </div>
                                </button>
                                <button type="button"
                                    class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-center hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                                    <div class="flex items-center justify-center space-x-2">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                            </path>
                                        </svg>
                                        <span>Cash</span>
                                    </div>
                                </button>
                                <button type="button"
                                    class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-center hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                                    <div class="flex items-center justify-center space-x-2">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                        </svg>
                                        <span>Transfer</span>
                                    </div>
                                </button>
                                <button type="button"
                                    class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-center hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                                    <div class="flex items-center justify-center space-x-2">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                        <span>Other</span>
                                    </div>
                                </button>
                            </div>
                        </div>

=======
                        </div>
>>>>>>> 75b04bc (Modificaciones con los show, paginaciones y index)
                        <!-- Bill Items Table -->
                        <div
                            class="bg-gray-50 dark:bg-gray-700 rounded-lg p-5 shadow-sm border border-gray-200 dark:border-gray-600">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-lg text-gray-700 dark:text-white">Bill Items</h3>
                                <button type="button" @click="addRow"
                                    class="flex items-center space-x-1 px-3 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    <span>Add Item</span>
                                </button>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                    <thead class="bg-gray-100 dark:bg-gray-800">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Doctor</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Service</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Hours</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Price</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                                        <tr v-if="table_bill.length" v-for="(bill, index) in table_bill" :key="bill.id"
                                            class="hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                                {{ users.name || "Not specified" }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <input type="text" v-model="bill.service"
                                                    :disabled="disable_inputs === true"
                                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <input type="number" v-model.number="bill.hour"
                                                    :disabled="disable_inputs === true"
                                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <input type="number" v-model.number="bill.price"
                                                    :disabled="disable_inputs === true"
                                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button type="button" @click="removeRow(index)"
                                                    class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 focus:outline-none transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr v-if="!table_bill.length">
                                            <td colspan="5"
                                                class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                                No items added yet. Click "Add Item" to start.
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Summary Section -->
                        <div
                            class="bg-gray-50 dark:bg-gray-700 rounded-lg p-5 shadow-sm border border-gray-200 dark:border-gray-600">
                            <h3 class="font-semibold text-lg text-gray-700 dark:text-white mb-4">Bill Summary</h3>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-gray-600 dark:text-gray-300">Subtotal:</span>
                                    <span class="font-medium text-gray-900 dark:text-white">{{ subtotal.toFixed(2)
                                        }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600 dark:text-gray-300">Tax (18%):</span>
                                    <span class="font-medium text-gray-900 dark:text-white">{{ itbis.toFixed(2)
                                        }}</span>
                                </div>
                                <div
                                    class="flex justify-between border-t border-gray-200 dark:border-gray-600 pt-2 mt-2">
                                    <span class="text-lg font-semibold text-gray-800 dark:text-white">Total:</span>
                                    <span class="text-lg font-bold text-purple-600 dark:text-purple-400">{{
                                        total.toFixed(2) }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex justify-end space-x-3 pt-4">
                            <button @click="closeModal" type="button"
                                class="px-6 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:focus:ring-offset-gray-800 transition-colors">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-colors">
                                Generate Bill
                            </button>
                        </div>
                    </form>
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
        patients: Object,
        users: Object,
        drugs: Object,
    },
    data() {
        return {
            form: {
                drug_id: '',
                users_id: '',
                patient_id: '',
                itbis: '',
                sub_total: '',
                total: '',
                payment_type: 'cash',
                status: true
            },
            itbis_rate: 0.18,
            disable_inputs: false,
            table_bill: [
                { service: '', hour: 0, price: 0 }
            ],
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
            return this.subtotal * this.itbis_rate;
        },
        total() {
            return this.subtotal + this.itbis;
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
            this.table_bill.splice(index, 1);
            this.disable_inputs = false;
        },
        submit() {
            this.form.sub_total = this.subtotal.toFixed(2);
            this.form.itbis = this.itbis.toFixed(2);
            this.form.total = this.total.toFixed(2);
            const data = {
                form: {
                    drug_id: this.form.drug_id,
                    itbis: this.form.itbis,
                    sub_total: this.form.sub_total,
                    total: this.form.total,
                    status: this.form.status,
                    payment_type: this.form.payment_type,
                    patient_id: this.form.patient_id,
                    users_id: this.form.users_id,
                },
                details: this.table_bill
            };
            router.post(route('bills.store'), data, {
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
        computed
    },
};
</script>