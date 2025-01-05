<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                {{ __('Edit User Permissions') }} - {{ $user->name }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.users.permissions.update', $user) }}" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <div class="space-y-6">
                            <!-- Disc Management Permissions -->
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('Disc Management') }}</h3>

                                <!-- Global Permissions Section -->
                                <div class="mb-8">
                                    <h4 class="text-md font-medium text-gray-700 mb-4">Global Permissions</h4>
                                    <div class="space-y-4">
                                        @foreach($groupedPermissions as $basePermission => $group)
                                            <div class="flex items-start">
                                                <div class="flex items-center h-5">
                                                    <input type="checkbox"
                                                        name="permissions[]"
                                                        value="{{ $group['all']['permission']->name }}"
                                                        id="{{ $group['all']['permission']->name }}"
                                                        {{ $group['all']['checked'] ? 'checked' : '' }}
                                                        class="permission-checkbox focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                                        data-base-permission="{{ $basePermission }}">
                                                </div>
                                                <div class="ml-3 text-sm">
                                                    <label for="{{ $group['all']['permission']->name }}" class="font-medium text-gray-700">
                                                        {{ $group['all']['label'] }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- System-Specific Permissions Section -->
                                <div>
                                    <h4 class="text-md font-medium text-gray-700 mb-4">System-Specific Permissions</h4>
                                    <div class="space-y-6">
                                        @foreach($groupedPermissions as $basePermission => $group)
                                            <div class="border-t border-gray-200 pt-4">
                                                <h5 class="text-sm font-medium text-gray-900 mb-3">{{ $group['specific']['label'] }}</h5>
                                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                                    @foreach($systems as $system)
                                                        <div class="flex items-start">
                                                            <div class="flex items-center h-5">
                                                                <input type="checkbox"
                                                                    name="system_permissions[{{ $system->id }}][]"
                                                                    value="{{ $group['specific']['permission']->id }}"
                                                                    id="{{ $group['specific']['permission']->name }}_system_{{ $system->id }}"
                                                                    {{ isset($userSystemPermissions[$group['specific']['permission']->id]) && in_array($system->id, $userSystemPermissions[$group['specific']['permission']->id]) ? 'checked' : '' }}
                                                                    class="system-checkbox focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                                                    data-base-permission="{{ $basePermission }}" 
                                                                    data-system-id="{{ $system->id }}"
                                                                    {{ $group['all']['checked'] ? 'disabled' : '' }}>
                                                            </div>
                                                            <div class="ml-3 text-sm">
                                                                <label for="{{ $group['specific']['permission']->name }}_system_{{ $system->id }}" class="text-gray-700">
                                                                    {{ $system->name }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-5">
                            <div class="flex justify-end">
                                <a href="{{ route('admin.users.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Cancel') }}
                                </a>
                                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Save Changes') }}
                                </button>
                            </div>
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
