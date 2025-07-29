<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-purple-50 dark:from-gray-900 dark:to-gray-800 p-4">
            <div class="w-full max-w-md space-y-8">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 15a4 4 0 004 4h10a4 4 0 004-4v-4a4 4 0 00-4-4H7a4 4 0 00-4 4v4z" />
                    </svg>
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900 dark:text-white">
                        Create your account
                    </h2>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                        Join our community today
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800/80 backdrop-blur-sm shadow-xl rounded-xl p-8 border border-white/20 dark:border-gray-700/30">
                    <form @submit.prevent="submit" class="space-y-6">
                        <div>
                            <InputLabel for="name" value="Full Name" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <TextInput
                                    id="name"
                                    type="text"
                                    class="block w-full pl-10 pr-3 py-2.5 border-0 bg-gray-50/50 dark:bg-gray-700/50 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:bg-white dark:focus:bg-gray-700 placeholder-gray-400 dark:placeholder-gray-500 text-gray-900 dark:text-white"
                                    placeholder="John Doe"
                                    v-model="form.name"
                                    required
                                    autofocus
                                    autocomplete="name"
                                />
                            </div>
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>

                        <div>
                            <InputLabel for="email" value="Email address" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div>
                                <TextInput
                                    id="email"
                                    type="email"
                                    class="block w-full pl-10 pr-3 py-2.5 border-0 bg-gray-50/50 dark:bg-gray-700/50 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:bg-white dark:focus:bg-gray-700 placeholder-gray-400 dark:placeholder-gray-500 text-gray-900 dark:text-white"
                                    placeholder="you@example.com"
                                    v-model="form.email"
                                    required
                                    autocomplete="username"
                                />
                            </div>
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div>
                            <InputLabel for="password" value="Password" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <TextInput
                                    id="password"
                                    type="password"
                                    class="block w-full pl-10 pr-3 py-2.5 border-0 bg-gray-50/50 dark:bg-gray-700/50 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:bg-white dark:focus:bg-gray-700 placeholder-gray-400 dark:placeholder-gray-500 text-gray-900 dark:text-white"
                                    placeholder="••••••••"
                                    v-model="form.password"
                                    required
                                    autocomplete="new-password"
                                />
                            </div>
                            <InputError class="mt-2" :message="form.errors.password" />
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                Use 8 or more characters with a mix of letters, numbers & symbols
                            </p>
                        </div>

                        <div>
                            <InputLabel for="password_confirmation" value="Confirm Password" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <TextInput
                                    id="password_confirmation"
                                    type="password"
                                    class="block w-full pl-10 pr-3 py-2.5 border-0 bg-gray-50/50 dark:bg-gray-700/50 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:bg-white dark:focus:bg-gray-700 placeholder-gray-400 dark:placeholder-gray-500 text-gray-900 dark:text-white"
                                    placeholder="••••••••"
                                    v-model="form.password_confirmation"
                                    required
                                    autocomplete="new-password"
                                />
                            </div>
                            <InputError class="mt-2" :message="form.errors.password_confirmation" />
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <div class="text-sm">
                                <Link
                                    :href="route('login')"
                                    class="font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300"
                                >
                                    Already have an account? Sign in
                                </Link>
                            </div>

                            <PrimaryButton 
                                class="flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200"
                                :class="{ 'opacity-50 cursor-not-allowed': form.processing }" 
                                :disabled="form.processing"
                            >
                                <svg v-if="form.processing" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>{{ form.processing ? 'Creating account...' : 'Register' }}</span>
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>