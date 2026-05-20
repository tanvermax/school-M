<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Teacher Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-900 dark:text-green-300">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Professional Information</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Update your designation, department, and other academic qualifications.</p>

                <form method="POST" action="{{ route('teacher.teacherprofile.store') }}" class="space-y-6">
                    @csrf

                    <!-- Name & Email (Read Only) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" type="text" class="mt-1 block w-full bg-gray-100 dark:bg-gray-700" :value="$user->name" disabled />
                        </div>
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" type="text" class="mt-1 block w-full bg-gray-100 dark:bg-gray-700" :value="$user->email" disabled />
                        </div>
                    </div>

                    <!-- Designation and Department -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="designation" :value="__('Designation *')" />
                            <x-text-input id="designation" name="designation" type="text" placeholder="e.g. Lecturer" class="mt-1 block w-full" :value="old('designation', $profile->designation ?? '')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('designation')" />
                        </div>

                        <div>
                            <x-input-label for="department" :value="__('Department *')" />
                            <x-text-input id="department" name="department" type="text" placeholder="e.g. CSE" class="mt-1 block w-full" :value="old('department', $profile->department ?? '')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('department')" />
                        </div>
                    </div>

                    <!-- Qualification and Joining Date -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="qualification" :value="__('Highest Qualification *')" />
                            <x-text-input id="qualification" name="qualification" type="text" placeholder="e.g. MSc in CSE" class="mt-1 block w-full" :value="old('qualification', $profile->qualification ?? '')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('qualification')" />
                        </div>

                        <div>
                            <x-input-label for="joining_date" :value="__('Joining Date *')" />
                            <x-text-input id="joining_date" name="joining_date" type="date" class="mt-1 block w-full" :value="old('joining_date', $profile->joining_date ?? '')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('joining_date')" />
                        </div>
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <x-input-label for="phone_number" :value="__('Phone Number')" />
                        <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old('phone_number', $profile->phone_number ?? '')" />
                        <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                    </div>

                    <!-- Address -->
                    <div>
                        <x-input-label for="address" :value="__('Address')" />
                        <textarea id="address" name="address" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" rows="3">{{ old('address', $profile->address ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('address')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save Profile') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>