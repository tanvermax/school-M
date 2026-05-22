<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
    {{ __('Teacher Dashboard') }}
</x-nav-link>
<x-nav-link href="#" :active="false">
    {{ __('Take Attendance') }}
</x-nav-link>
<x-nav-link :href="route('teacher.teacherprofile')" :active="request()->routeIs('teacher.teacherprofile')">
    {{ __('Office Profile') }}
</x-nav-link>
<x-nav-link :href="route('teacher.teacherattendance')" :active="false">
    {{ __('Attendance') }}
</x-nav-link>