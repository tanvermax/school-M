<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Class Attendance Panel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Daily Attendance</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">আজকের ক্লাসের উপস্থিতি নিশ্চিত করতে নিচের অ্যাসাইন করা ক্লাসটি সিলেক্ট করুন।</p>
            </div>

            {{-- কন্ডিশন: যদি শিক্ষকের কোনো ক্লাস অ্যাসাইন করা না থাকে --}}
            @if($assignedClasses->isEmpty())
                <div class="flex flex-col items-center justify-center p-12 text-center border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-xl bg-white dark:bg-gray-800 shadow-sm">
                    <div class="p-4 bg-gray-100 dark:bg-gray-900 rounded-full text-gray-400 mb-4">
                        <!-- ক্যালেন্ডার আইকন -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">কোনো ক্লাস অ্যাসাইন করা নেই</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 max-w-sm mt-2">
                        অ্যাডমিন স্যার আপনাকে এখনো কোনো ক্লাসের দায়িত্ব দেননি। ক্লাস অ্যাসাইন করা হলে তা এখানে দেখতে পাবেন।
                    </p>
                </div>
            @else
                {{-- কন্ডিশন: যদি ক্লাস অ্যাসাইন করা থাকে তবে কার্ডগুলো দেখাবে --}}
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($assignedClasses as $class)
                        <div class="flex flex-col justify-between p-6 border border-gray-200 dark:border-gray-700 rounded-xl bg-white dark:bg-gray-800 shadow-sm hover:shadow-md transition-all duration-200">
                            <div>
                                <div class="flex items-center justify-between mb-3">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-800 dark:bg-indigo-900/50 dark:text-indigo-300">
                                        {{ $class->class_name }}
                                    </span>
                                    <span class="text-xs font-medium text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-900 px-2.5 py-1 rounded">
                                        Section: {{ $class->section ?? 'N/A' }}
                                    </span>
                                </div>
                                
                                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                                    {{ $class->subject_name }}
                                </h3>
                                
                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mt-4">
                                    <!-- স্টুডেন্ট আইকন -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1.5 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                    </svg>
                                    <span>{{ $class->students_count }} Students Registered</span>
                                </div>
                            </div>

                            <div class="mt-6">
                                {{-- যখন আমরা অ্যাটেনডেন্স নেওয়ার মেইন পেজ বানাবো, তখন এই রুটটি সেখানে লিঙ্ক করে দেব --}}
                                <a href="#" class="w-full inline-flex items-center justify-center px-4 py-2.5 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 rounded-lg shadow-sm transition-colors">
                                    Take Attendance
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 ml-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>