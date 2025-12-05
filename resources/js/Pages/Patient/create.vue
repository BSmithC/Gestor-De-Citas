<template>
    <Head title="Create Patients" />
    <AuthenticatedLayout>
        <template #header>
            <div class="text-white text-lg font-semibold">
                CREATE PATIENT
            </div>
        </template>
        
        <template #default>
            <div class="rounded-lg bg-white py-8 px-6 md:px-12 lg:px-16 dark:bg-gray-900">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <form @submit.prevent="submit" class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                        <div class="grid gap-6 mb-8 md:grid-cols-2 lg:grid-cols-3">
                            <!-- Personal Information Column -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 border-b pb-2">Personal Information</h3>
                                
                                <div>
                                    <label for="dni" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">DNI</label>
                                    <input type="Number" v-model="form.DNI" placeholder="000-0000000-0" required 
                                        class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-colors" />
                                </div>
                                
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">First Name</label>
                                    <input v-model="form.name" type="text" id="name" placeholder="John" required 
                                        class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-colors" />
                                </div>
                                
                                <div>
                                    <label for="sur_name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">First Surname</label>
                                    <input v-model="form.sur_name" type="text" id="sur_name" placeholder="Smith" required 
                                        class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-colors" />
                                </div>
                                
                                <div>
                                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Second Name</label>
                                    <input v-model="form.last_name" type="text" id="last_name" placeholder="Doe" required 
                                        class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-colors" />
                                </div>
                                
                                <div>
                                    <label for="second_sur_name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Second Surname</label>
                                    <input v-model="form.second_sur_name" type="text" id="second_sur_name" placeholder="Gonzalez" required 
                                        class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-colors" />
                                </div>
                                
                                <div>
                                    <label for="date_of_birth" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Date of Birth</label>
                                    <input v-model="form.date_of_birth" type="date" id="date_of_birth" required 
                                        class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-colors" />
                                </div>
                            </div>
                            
                            <!-- Contact & Demographics Column -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 border-b pb-2">Contact & Demographics</h3>
                                
                                <div>
                                    <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
                                    <input v-model="form.phone_number" type="text" id="phone_number" required 
                                        class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-colors" />
                                </div>
                                
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                    <input v-model="form.email" type="email" id="email" placeholder="example@email.com" required 
                                        class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-colors" />
                                </div>
                                
                                <div>
                                    <label for="address" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                                    <input v-model="form.address" type="text" id="address" placeholder="Street 123, City" required 
                                        class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-colors" />
                                </div>
                                
                                <div>
                                    <label for="nacionality" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nationality</label>
                                    <select v-model="form.nacionality" id="gender" required 
                                        class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-colors">
                                        <option>Dominican</option>
                                        <option>American</option>
                                        <option>Canadian</option>
                                        <option>Mexican</option>
                                        <option>Spanish</option>
                                        <option>French</option>
                                        <option>German</option>
                                        <option>Italian</option>
                                        <option>British</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Gender</label>
                                    <select v-model="form.gender" id="gender" required 
                                        class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-colors">
                                        <option>Masculino</option>
                                        <option>Femenino</option>
                                        <option>No Binario</option>
                                        <option>Otro</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="sex" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Sex</label>
                                    <select v-model="form.sex" id="sex" required 
                                        class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-colors">
                                        <option>Masculino</option>
                                        <option>Femenino</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Medical & Other Information Column -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 border-b pb-2">Medical & Other Information</h3>
                                
                                <div>
                                    <label for="marital_status" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Marital Status</label>
                                    <select v-model="form.marital_status" id="marital_status" required 
                                        class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-colors">
                                        <option>Soltero/a</option>
                                        <option>Casado/a</option>
                                        <option>Divorciado/a</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="ocupation" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Occupation</label>
                                    <input v-model="form.ocupation" type="text" id="ocupation" placeholder="Engineer" required 
                                        class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-colors" />
                                </div>
                                
                                <div>
                                    <label for="place_of_birth" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Place of Birth</label>
                                    <input v-model="form.place_of_birth" type="text" id="place_of_birth" placeholder="Santo Domingo" required 
                                        class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-colors" />
                                </div>
                                
                                <div>
                                    <label for="blood_type" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Blood Type</label>
                                    <select v-model="form.blood_type" id="blood_type" required 
                                        class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-colors">
                                        <option>A+</option>
                                        <option>A-</option>
                                        <option>B+</option>
                                        <option>B-</option>
                                        <option>AB+</option>
                                        <option>AB-</option>
                                        <option>O+</option>
                                        <option>O-</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="insurance" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Insurance</label>
                                    <select v-model="form.insurance" id="insurance" required 
                                        class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 transition-colors">
                                        <option>Universal</option>
                                        <option>Humano</option>
                                        <option>Palic</option>
                                        <option>Mapfre Salud</option>
                                        <option>SEMMA</option>
                                        <option>Metromed</option>
                                        <option>Futuro</option>
                                        <option>SER</option>
                                        <option>Ever</option>
                                        <option>Salud Total</option>
                                        <option>CIMA</option>
                                        <option>Familiar</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Form Actions -->
                        <div class="flex justify-end space-x-4 mt-8">
                            <button type="button" @click="closeModal" 
                                class="px-6 py-2.5 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:border-gray-700 dark:focus:ring-gray-700 transition-colors">
                                Cancel
                            </button>
                            <button type="submit" 
                                class="px-6 py-2.5 text-sm font-medium text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-500 dark:hover:bg-purple-600 dark:focus:ring-purple-800 transition-colors">
                                Save Patient
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
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import LastDays from '@/Components/LastDays.vue';

export default {
    data() {
        return {
            form: {
                DNI: '',
                name: '',
                sur_name: '',
                last_name: '',
                second_sur_name: '',
                date_of_birth: '',
                phone_number: '',
                nacionality: '',
                address: '',
                gender: '',
                sex: '',
                marital_status: '',
                ocupation: '',
                place_of_birth: '',
                blood_type: '',
                insurance: '',
                status: true,
                email: ''
            },
            errors: {}
        };
    },
    methods: {
        submit() {
            console.log(this.form)
            router.post(route('patients.store'), this.form, {
                onError: (errors) => {
                    this.errors = errors
                    toast.error('¡Error No Se Creado Paciente!')
                    console.log(errors)
                },
            })
        },
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