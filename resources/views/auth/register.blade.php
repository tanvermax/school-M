<x-guest-layout>
    <!-- Top Branding / Logo Section -->
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-extrabold text-indigo-600 dark:text-indigo-400 tracking-wider">
            NoteArch
        </h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
            Create your institutional account to get started
        </p>
    </div>

    
    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Account Type (Role Selection) -->
        <div>
            <x-input-label for="role" :value="__('Register As')" class="font-semibold text-gray-700 dark:text-gray-300" />
            <select id="role" name="role" required class="...">
                <option value="" disabled selected>Choose your account type...</option>
                <!-- লক্ষ্য করুন: value এর ভেতর যেন student এবং teacher ই লেখা থাকে -->
                <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student (শিক্ষার্থী)</option>
                <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher (শিক্ষক)</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>ß
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <hr class="border-gray-200 dark:border-gray-700 my-4" />

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" class="font-semibold" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Institutional Email')" class="font-semibold" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="name@notearch.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="font-semibold" />
            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password"
                placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="font-semibold" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required autocomplete="new-password"
                placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-800">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 transition duration-150 ease-in-out" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-900 focus:ring-indigo-500 rounded-lg shadow-md hover:shadow-lg transition duration-150 ease-in-out">
                {{ __('Create Account') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>