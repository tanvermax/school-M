<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Attendance Duty Assignment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"> <!-- এখানে space-y-6 দেওয়া হয়েছে দুটি কার্ডের মাঝে গ্যাপের জন্য -->
            
            @if(session('success'))
                <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-900 dark:text-green-300">
                    {{ session('success') }}
                </div>
            @endif

            <!-- প্রথম সেকশন: যেখানে সব ক্লাস ম্যানেজ এবং অ্যাসাইন করা যায় -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">Assign Teachers to Classes</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Select a teacher for each class who will be responsible for taking daily attendance.</p>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-gray-600 dark:text-gray-400">
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                                <th class="p-3">Class Name</th>
                                <th class="p-3">Subject</th>
                                <th class="p-3">Section</th>
                                <th class="p-3">Total Students</th>
                                <th class="p-3 w-1/3">Assign Attendance Taker</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($classes as $class)
                                <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-900">
                                    <td class="p-3 font-semibold text-gray-900 dark:text-gray-100">{{ $class->class_name }}</td>
                                    <td class="p-3">{{ $class->subject_name }}</td>
                                    <td class="p-3">{{ $class->section ?? 'N/A' }}</td>
                                    <td class="p-3">
                                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                            {{ $class->students_count }} Students
                                        </span>
                                    </td>
                                    <td class="p-3">
                                        <form method="POST" action="{{ route('admin.attendance.assign.update', $class->id) }}" class="flex items-center gap-2">
                                            @csrf
                                            <select name="teacher_id" onchange="this.form.submit()" class="block w-full text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 rounded-md shadow-sm">
                                                <option value="">-- Not Assigned --</option>
                                                @foreach($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}" {{ $class->teacher_id == $teacher->id ? 'selected' : '' }}>
                                                        {{ $teacher->name }} ({{ ucfirst($teacher->role) }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-4 text-center">No classes found. Please create classes first.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- দ্বিতীয় সেকশন (নতুন): শুধুমাত্র অ্যাসাইন হওয়া ক্লাসগুলোর সামারি (Assigned Classes Summary) -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-green-600 dark:text-green-400 mb-2">✔ Assigned Classes Summary</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Quick overview of classes that currently have an assigned attendance taker.</p>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-gray-600 dark:text-gray-400">
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-700 bg-green-50 dark:bg-slate-900/50">
                                <th class="p-3">Class Name</th>
                                <th class="p-3">Subject</th>
                                <th class="p-3">Section</th>
                                <th class="p-3">Assigned Teacher</th>
                                <th class="p-3 text-right">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                // শুধুমাত্র শিক্ষক অ্যাসাইন হওয়া ক্লাসগুলো ফিল্টার করা
                                $assignedClasses = $classes->whereNotNull('teacher_id');
                            @endphp

                            @forelse($assignedClasses as $assignedClass)
                                <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-900">
                                    <td class="p-3 font-semibold text-gray-900 dark:text-gray-100">{{ $assignedClass->class_name }}</td>
                                    <td class="p-3">{{ $assignedClass->subject_name }}</td>
                                    <td class="p-3">{{ $assignedClass->section ?? 'N/A' }}</td>
                                    <td class="p-3">
                                        <div class="flex items-center gap-2">
                                            <div class="h-2 w-2 rounded-full bg-green-500"></div>
                                            <span class="font-medium text-gray-800 dark:text-gray-200">
                                                {{ $assignedClass->teacher->name ?? 'Unknown Teacher' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="p-3 text-right">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                            Active Duty
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-6 text-center text-gray-500 dark:text-gray-400">
                                        No teachers have been assigned yet. Select a teacher from the table above.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>