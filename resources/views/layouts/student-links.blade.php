<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
    {{ __('Student Dashboard') }}
</x-nav-link>
<x-nav-link :href="route('student.studentprofile')" :active="false">
    {{ __('Profile') }}
</x-nav-link>
<x-nav-link href="#" :active="false">
    {{ __('Attendance') }}
</x-nav-link>