<x-guest-layout>
    <!-- Top Branding -->
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-extrabold text-red-600 dark:text-red-400 tracking-wider">
            NoteArch Control Center
        </h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
            Register a New Super Administrator
        </p>
    </div>

    <!-- লক্ষ্য করুন: এখানে অ্যাকশন রাউটটি আমাদের কাস্টম রাউট -->
    <form method="POST" action="{{ route('admin.register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Admin Full Name')" class="font-semibold" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="System Admin" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Secure Admin Email')" class="font-semibold" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="admin@notearch.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Master Password')" class="font-semibold" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Master Password')" class="font-semibold" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-800">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100" href="{{ route('login') }}">
                {{ __('Back to Login') }}
            </a>

            <x-primary-button class="px-6 py-2.5 bg-red-600 hover:bg-red-700 active:bg-red-900 focus:ring-red-500 rounded-lg shadow-md transition duration-150 ease-in-out">
                {{ __('Create Admin Account') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>