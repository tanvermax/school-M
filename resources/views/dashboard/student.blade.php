<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            {{ __('NoteArch - Student Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                <h3 class="text-lg font-bold mb-4">Hello Student!</h3>
                <p class="text-sm text-gray-500">তোমার প্রোফাইল ড্যাশবোর্ড। এখান থেকে তুমি তোমার হাজিরার রিপোর্ট ও ক্লাসের আপডেট দেখতে পাবে।</p>
            </div>
        </div>
    </div>
</x-app-layout>