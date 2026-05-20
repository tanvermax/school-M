<x-nav-link :href="route('admin.allstudent')" :active="request()->routeIs('dashboard')">
    {{ __('All Student') }}
</x-nav-link>
<x-nav-link :href="route('admin.allteacher')" :active="false">
    {{ __('All Teacher') }}
</x-nav-link>
<x-nav-link :href="route('admin.classes.index')" :active="false">
    {{ __('Add Class') }}
</x-nav-link>
<x-nav-link href="route('admin.allstudent')" :active="false">
    {{ __('Attendance') }}
</x-nav-link>
