<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $class->class_name }} - {{ $class->subject_name }} ({{ $class->section ?? 'No Section' }})
            </h2>
            <a href="{{ route('admin.classes.index') }}" class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:underline">&larr; Back to Classes</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Students Enrolled (Auto-Matched by Class Name)</h3>
                
                <table class="w-full text-left border-collapse text-gray-600 dark:text-gray-400">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th class="pb-3">Roll No</th>
                            <th class="pb-3">Student Name</th>
                            <th class="pb-3">Email</th>
                            <th class="pb-3">Admission Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($class->students as $student)
                            <tr class="border-b border-gray-100 dark:border-gray-700">
                                <td class="py-3 font-mono">{{ $student->roll_no }}</td>
                                <td class="py-3 font-semibold text-gray-900 dark:text-gray-100">{{ $student->user->name }}</td>
                                <td class="py-3">{{ $student->user->email }}</td>
                                <td class="py-3">{{ $student->admission_year }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 text-center text-red-500">No students found matching "{{ $class->class_name }}" yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>