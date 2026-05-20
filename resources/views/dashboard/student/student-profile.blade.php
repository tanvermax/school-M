<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Student Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Success Message Alert -->
            @if(session('success'))
                <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-900 dark:text-green-300">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Academic Information</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Please fill in your admission details and keeping them up to date.</p>

                <form method="POST" action="{{ route('student.studentprofile.store') }}" class="space-y-6">
                    @csrf

                    <!-- Name & Email (Read Only from Users table) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="name" :value="__('Account Name')" />
                            <x-text-input id="name" type="text" class="mt-1 block w-full bg-gray-100 dark:bg-gray-700" :value="$user->name" disabled />
                        </div>
                        <div>
                            <x-input-label for="email" :value="__('Account Email')" />
                            <x-text-input id="email" type="text" class="mt-1 block w-full bg-gray-100 dark:bg-gray-700" :value="$user->email" disabled />
                        </div>
                    </div>

                    <!-- Class Name and Roll No -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="class_name" :value="__('Class Name *')" />
                            <x-text-input id="class_name" name="class_name" type="text" class="mt-1 block w-full" :value="old('class_name', $profile->class_name ?? '')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('class_name')" />
                        </div>

                        <div>
                            <x-input-label for="roll_no" :value="__('Roll Number *')" />
                            <x-text-input id="roll_no" name="roll_no" type="text" class="mt-1 block w-full" :value="old('roll_no', $profile->roll_no ?? '')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('roll_no')" />
                        </div>
                    </div>

                    <!-- Admission Year and Phone -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="admission_year" :value="__('Admission Year *')" />
                            <x-text-input id="admission_year" name="admission_year" type="number" placeholder="e.g. 2026" class="mt-1 block w-full" :value="old('admission_year', $profile->admission_year ?? '')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('admission_year')" />
                        </div>

                        <div>
                            <x-input-label for="phone_number" :value="__('Phone Number')" />
                            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old('phone_number', $profile->phone_number ?? '')" />
                            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                        </div>
                    </div>

                    <!-- Address -->
                    <div>
                        <x-input-label for="address" :value="__('Current Address')" />
                        <textarea id="address" name="address" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" rows="3">{{ old('address', $profile->address ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('address')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save Information') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>