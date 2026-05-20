<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 Aly">
            {{ __('NoteArch - Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                <h3 class="text-lg font-bold mb-4">Welcome, Control Center Admin!</h3>
                <p class="text-sm text-gray-500">এখানে আপনি শিক্ষক ও শিক্ষার্থীদের অনুমোদন এবং ক্লাসের রুটিন সেটআপ করতে পারবেন।</p>
            </div>
        </div>
    </div>
</x-app-layout>