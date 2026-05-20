<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Classes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if(session('success'))
                <div class="p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-900 dark:text-green-300">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Create Class Form -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Add New Class</h3>
                <form method="POST" action="{{ route('admin.classes.store') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                    @csrf
                    <div>
            <x-input-label for="class_name" :value="__('Class Name*')" />
            <select id="class_name" name="class_name" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                <option value="" disabled selected>Select Class</option>
                <option value="Class 1">Class 1</option>
                <option value="Class 2">Class 2</option>
                <option value="Class 3">Class 3</option>
                <option value="Class 4">Class 4</option>
                <option value="Class 5">Class 5</option>
                <option value="Class 6">Class 6</option>
                <option value="Class 7">Class 7</option>
                <option value="Class 8">Class 8</option>
                <option value="Class 9">Class 9</option>
                <option value="Class 10">Class 10</option>
                <option value="Class 11">Class 11</option>
                <option value="Class 12">Class 12</option>
            </select>
        </div>
                    <div>
                        <x-input-label for="subject_name" :value="__('Subject Name*')" />
                        <x-text-input id="subject_name" name="subject_name" type="text" class="mt-1 block w-full" placeholder="Math" required />
                    </div>
                    <div>
                        <x-input-label for="section" :value="__('Section (Optional)')" />
                        <x-text-input id="section" name="section" type="text" class="mt-1 block w-full" placeholder="A / Science" />
                    </div>
                    <div>
                        <x-primary-button class="w-full justify-center py-2.5">{{ __('Create Class') }}</x-primary-button>
                    </div>
                </form>
            </div>

            <!-- Classes List Table -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">All Classes</h3>
                <table class="w-full text-left border-collapse text-gray-600 dark:text-gray-400">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th class="pb-3">Class Name</th>
                            <th class="pb-3">Subject</th>
                            <th class="pb-3">Section</th>
                            <th class="pb-3">Total Students</th>
                            <th class="pb-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($classes as $class)
                            <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-900">
                                <td class="py-3 font-semibold text-gray-900 dark:text-gray-100">{{ $class->class_name }}</td>
                                <td class="py-3">{{ $class->subject_name }}</td>
                                <td class="py-3">{{ $class->section ?? 'N/A' }}</td>
                                <td class="py-3">
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                        {{ $class->students_count }} Students Matched
                                    </span>
                                </td>
                                <td class="py-3">
                                    <a href="{{ route('admin.classes.show', $class->id) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400">View Students</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-4 text-center">No classes created yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>