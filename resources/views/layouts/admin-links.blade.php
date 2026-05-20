<x-nav-link :href="route('admin.allstudent')" :active="request()->routeIs('admin.allstudent')">
    {{ __('All Student') }}
</x-nav-link>

<x-nav-link :href="route('admin.allteacher')" :active="request()->routeIs('admin.allteacher')">
    {{ __('All Teacher') }}
</x-nav-link>

<x-nav-link :href="route('admin.classes.index')" :active="request()->routeIs('admin.classes.index')">
    {{ __('Add Class') }}
</x-nav-link>

<!-- এখানে রাউটের নাম এবং অ্যাক্টিভ স্টেট দুটোই ঠিক করা হলো -->
<x-nav-link :href="route('admin.attendance.index')" :active="request()->routeIs('admin.attendance.index')">
    {{ __('Assign Attendance') }}
</x-nav-link>