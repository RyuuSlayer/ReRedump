<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Non-Game Discs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-theme-d-200 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-0">
                    <x-disc-table />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
