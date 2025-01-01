<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Welcome to ReRedump') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-theme-l-100 dark:bg-theme-d-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Recent Dumps Section -->
            <div class="bg-theme-l-200 dark:bg-theme-d-200 overflow-hidden shadow-xl sm:rounded-lg mb-6">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-4 dark:text-white">Recent dumps</h2>
                    <div class="space-y-2">
                        <!-- This will be populated dynamically -->
                        <div class="recent-dumps">
                            <!-- Example structure (will be replaced by dynamic data) -->
                            <div class="text-sm text-gray-600 dark:text-gray-300">
                                <!-- Dynamic content will go here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- News Section -->
            <div class="bg-theme-l-200 dark:bg-theme-d-200 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-4 dark:text-white">News</h2>
                    <div class="space-y-4">
                        <!-- This will be populated dynamically -->
                        <div class="news-items">
                            <!-- Example structure (will be replaced by dynamic data) -->
                            <div class="news-item">
                                <div class="text-sm text-gray-600 dark:text-gray-300">
                                    <!-- Dynamic content will go here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
