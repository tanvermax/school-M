<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Teacher Dashboard') }}
            </h2>
            <div class="text-sm text-gray-600 dark:text-gray-400">
                {{ now()->format('l, d F Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Total Students -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg border-l-4 border-blue-500">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 uppercase">Total Students</p>
                                <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">245</p>
                                <p class="text-xs text-green-600 mt-1">↑ 12% from last month</p>
                            </div>
                            <div class="p-3 bg-blue-100 dark:bg-blue-900 rounded-full">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- My Classes -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg border-l-4 border-green-500">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 uppercase">My Classes</p>
                                <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">4</p>
                                <p class="text-xs text-gray-500 mt-1">Science, Math, English</p>
                            </div>
                            <div class="p-3 bg-green-100 dark:bg-green-900 rounded-full">
                                <svg class="w-6 h-6 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Attendance Today -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg border-l-4 border-yellow-500">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 uppercase">Today's Attendance</p>
                                <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">92%</p>
                                <p class="text-xs text-gray-500 mt-1">42/45 students present</p>
                            </div>
                            <div class="p-3 bg-yellow-100 dark:bg-yellow-900 rounded-full">
                                <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Assignments -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg border-l-4 border-red-500">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 uppercase">Pending Assignments</p>
                                <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">18</p>
                                <p class="text-xs text-red-600 mt-1">5 overdue</p>
                            </div>
                            <div class="p-3 bg-red-100 dark:bg-red-900 rounded-full">
                                <svg class="w-6 h-6 text-red-600 dark:text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <!-- Attendance Chart -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Weekly Attendance Overview</h3>
                        <canvas id="attendanceChart" height="200"></canvas>
                    </div>
                </div>

                <!-- Performance Chart -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Class Performance</h3>
                        <canvas id="performanceChart" height="200"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Activities & Tasks -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Upcoming Classes -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">📅 Today's Schedule</h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center text-white font-bold">9AM</div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">Mathematics</p>
                                        <p class="text-sm text-gray-500">Class 10-A | Room 201</p>
                                    </div>
                                </div>
                                <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Ongoing</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700/30 rounded-lg">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center text-white font-bold">11AM</div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">Physics Lab</p>
                                        <p class="text-sm text-gray-500">Class 9-B | Lab 1</p>
                                    </div>
                                </div>
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-700 text-xs rounded-full">Upcoming</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700/30 rounded-lg">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center text-white font-bold">2PM</div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">English Literature</p>
                                        <p class="text-sm text-gray-500">Class 8-A | Room 105</p>
                                    </div>
                                </div>
                                <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">Scheduled</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Submissions -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">📝 Recent Assignment Submissions</h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 border-b border-gray-200 dark:border-gray-700">
                                <div>
                                    <p class="font-medium text-gray-900 dark:text-gray-100">John Doe</p>
                                    <p class="text-sm text-gray-500">Algebra Homework - Class 10</p>
                                </div>
                                <div class="text-right">
                                    <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Submitted</span>
                                    <p class="text-xs text-gray-400 mt-1">2 hours ago</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between p-3 border-b border-gray-200 dark:border-gray-700">
                                <div>
                                    <p class="font-medium text-gray-900 dark:text-gray-100">Sarah Smith</p>
                                    <p class="text-sm text-gray-500">Physics Project - Class 9</p>
                                </div>
                                <div class="text-right">
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 text-xs rounded-full">Pending Review</span>
                                    <p class="text-xs text-gray-400 mt-1">Yesterday</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between p-3">
                                <div>
                                    <p class="font-medium text-gray-900 dark:text-gray-100">Mike Johnson</p>
                                    <p class="text-sm text-gray-500">Essay Writing - Class 8</p>
                                </div>
                                <div class="text-right">
                                    <span class="px-2 py-1 bg-red-100 text-red-700 text-xs rounded-full">Late</span>
                                    <p class="text-xs text-gray-400 mt-1">3 days ago</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="mt-4 inline-block text-sm text-blue-600 hover:text-blue-700">View all submissions →</a>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                <button class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg p-4 hover:shadow-lg transition">
                    <svg class="w-6 h-6 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span class="text-sm">Take Attendance</span>
                </button>
                <button class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg p-4 hover:shadow-lg transition">
                    <svg class="w-6 h-6 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span class="text-sm">Add Assignment</span>
                </button>
                <button class="bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-lg p-4 hover:shadow-lg transition">
                    <svg class="w-6 h-6 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="text-sm">Create Exam</span>
                </button>
                <button class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white rounded-lg p-4 hover:shadow-lg transition">
                    <svg class="w-6 h-6 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span class="text-sm">View Reports</span>
                </button>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Include Chart.js for charts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Attendance Chart
    const ctx1 = document.getElementById('attendanceChart').getContext('2d');
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            datasets: [{
                label: 'Attendance %',
                data: [95, 88, 92, 90, 96, 85],
                borderColor: 'rgb(59, 130, 246)',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    labels: {
                        color: document.documentElement.classList.contains('dark') ? '#e5e7eb' : '#1f2937'
                    }
                }
            }
        }
    });

    // Performance Chart
    const ctx2 = document.getElementById('performanceChart').getContext('2d');
    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Class 8', 'Class 9', 'Class 10'],
            datasets: [{
                label: 'Average Score %',
                data: [82, 78, 88],
                backgroundColor: 'rgb(34, 197, 94)',
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    labels: {
                        color: document.documentElement.classList.contains('dark') ? '#e5e7eb' : '#1f2937'
                    }
                }
            }
        }
    });
</script>