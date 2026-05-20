<x-nav-link
    :href="route('dashboard')"
    :active="request()->routeIs('dashboard')">
    {{ __('Student Dashboard') }}
</x-nav-link>

<x-nav-link 
:href="route('student.studentprofile')"
    :active="request()->routeIs('/student/dashboard')">
    {{ __('Academic Profile') }}
</x-nav-link>
<x-nav-link href="#" :active="false">
    {{ __('Attendance') }}
</x-nav-link>