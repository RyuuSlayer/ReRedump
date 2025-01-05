<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                {{ __('Edit User Permissions') }} - {{ $user->name }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-theme-l-100 dark:bg-theme-d-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-theme-l-200 dark:bg-theme-d-200 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @if (session('success'))
                        <div class="mb-6 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-300 px-4 py-3 rounded relative" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-6 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-300 px-4 py-3 rounded relative" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.users.permissions.update', $user) }}">
                        @csrf
                        @method('PUT')

                        <div class="space-y-8">
                            <!-- Disc Management Section -->
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Disc Management</h3>
                                
                                <!-- Global Permissions -->
                                <div class="mb-6">
                                    <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-4">{{ __('Global Permissions') }}</h4>
                                    <div class="space-y-3">
                                        @foreach($groupedPermissions as $basePermission => $group)
                                            <label class="flex items-center">
                                                <input type="checkbox" 
                                                    id="permission_{{ $group['all']['permission']->name }}" 
                                                    name="permissions[]" 
                                                    value="{{ $group['all']['permission']->name }}"
                                                    {{ $group['all']['checked'] ? 'checked' : '' }}
                                                    class="rounded bg-white dark:bg-theme-d-100 border-gray-300 dark:border-theme-d-300 text-theme-d-100 dark:text-theme-d-100 shadow-sm focus:ring-theme-d-100 dark:focus:ring-theme-d-100 dark:focus:ring-offset-theme-d-300">
                                                <span class="ms-2 text-gray-600 dark:text-gray-400">{{ $group['all']['label'] }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- System-Specific Permissions -->
                                <div>
                                    <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-4">{{ __('System-Specific Permissions') }}</h4>

                                    @foreach($groupedPermissions as $basePermission => $group)
                                        <div class="mb-6">
                                            <h5 class="text-md font-medium text-gray-600 dark:text-gray-400 mb-3">{{ $group['specific']['label'] }}</h5>
                                            <div class="mt-2 grid grid-cols-1 md:grid-cols-3 gap-4">
                                                @foreach($systems as $system)
                                                    <label class="flex items-center">
                                                        <input type="checkbox" 
                                                            id="permission_{{ $group['specific']['permission']->name }}_{{ $system->id }}" 
                                                            name="system_permissions[{{ $system->id }}][]" 
                                                            value="{{ $group['specific']['permission']->id }}"
                                                            {{ isset($userSystemPermissions[$group['specific']['permission']->id]) && in_array($system->id, $userSystemPermissions[$group['specific']['permission']->id]) ? 'checked' : '' }}
                                                            class="rounded bg-white dark:bg-theme-d-100 border-gray-300 dark:border-theme-d-300 text-theme-d-100 dark:text-theme-d-100 shadow-sm focus:ring-theme-d-100 dark:focus:ring-theme-d-100 dark:focus:ring-offset-theme-d-300">
                                                        <span class="ms-2 text-gray-600 dark:text-gray-400">{{ $system->name }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 space-x-3">
                            <a href="{{ route('admin.users.index') }}" class="px-3 py-1.5 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded-lg hover:bg-theme-l-400 dark:hover:bg-theme-d-300">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit" class="px-3 py-1.5 bg-white dark:bg-gray-200 text-gray-900 dark:text-gray-800 rounded-lg hover:bg-gray-50 dark:hover:bg-white">
                                {{ __('Save Changes') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to handle global permission changes
        function handleGlobalPermissionChange(basePermission, checked) {
            // Get all system-specific checkboxes for this permission type
            const systemCheckboxes = document.querySelectorAll(`input[data-base-permission="${basePermission}"][data-system-id]`);
            
            // If global permission is checked, uncheck and disable all system-specific ones
            systemCheckboxes.forEach(checkbox => {
                if (checked) {
                    checkbox.checked = false;
                    checkbox.disabled = true;
                } else {
                    checkbox.disabled = false;
                }
            });
        }

        // Add event listeners to all global permission checkboxes
        document.querySelectorAll('.permission-checkbox:not([data-system-id])').forEach(checkbox => {
            const basePermission = checkbox.dataset.basePermission;
            
            // Set initial state
            handleGlobalPermissionChange(basePermission, checkbox.checked);
            
            // Handle changes
            checkbox.addEventListener('change', (e) => {
                handleGlobalPermissionChange(basePermission, e.target.checked);
            });
        });
    });
    </script>
    @endpush
</x-app-layout>
