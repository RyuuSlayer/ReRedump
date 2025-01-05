<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Create Role') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-theme-l-100 dark:bg-theme-d-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-theme-l-200 dark:bg-theme-d-200 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @if (session('error'))
                        <div class="mb-6 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-300 px-4 py-3 rounded relative" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.roles.store') }}">
                        @csrf

                        <div class="space-y-6">
                            <!-- Role Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Role Name:
                                </label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 sm:text-sm text-gray-900 dark:text-white bg-white dark:bg-theme-d-100 @error('name') border-red-500 dark:border-red-700 @enderror">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Permissions -->
                            <div class="mt-4">
                                <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-4">{{ __('Permissions') }}</h4>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <!-- User Management -->
                                    <div>
                                        <h5 class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-3">User Management</h5>
                                        <div class="space-y-2">
                                            @foreach(['view_users', 'edit_users', 'delete_users', 'create_users', 'edit_users_permissions'] as $permission)
                                                <label class="flex items-center">
                                                    <input type="checkbox" 
                                                        id="permission_{{ $permission }}" 
                                                        name="permissions[]" 
                                                        value="{{ $permission }}"
                                                        {{ old('permissions') && in_array($permission, old('permissions')) ? 'checked' : '' }}
                                                        class="rounded dark:bg-theme-d-100 border-theme-l-300 dark:border-theme-d-300 text-theme-d-100 shadow-sm focus:ring-theme-d-100 dark:focus:ring-theme-d-100 dark:focus:ring-offset-theme-d-300">
                                                    <span class="ms-2 text-gray-600 dark:text-gray-400">{{ ucwords(str_replace('_', ' ', $permission)) }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Role Management -->
                                    <div>
                                        <h5 class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-3">Role Management</h5>
                                        <div class="space-y-2">
                                            @foreach(['view_roles', 'create_roles', 'edit_roles', 'delete_roles'] as $permission)
                                                <label class="flex items-center">
                                                    <input type="checkbox" 
                                                        id="permission_{{ $permission }}" 
                                                        name="permissions[]" 
                                                        value="{{ $permission }}"
                                                        {{ old('permissions') && in_array($permission, old('permissions')) ? 'checked' : '' }}
                                                        class="rounded dark:bg-theme-d-100 border-theme-l-300 dark:border-theme-d-300 text-theme-d-100 shadow-sm focus:ring-theme-d-100 dark:focus:ring-theme-d-100 dark:focus:ring-offset-theme-d-300">
                                                    <span class="ms-2 text-gray-600 dark:text-gray-400">{{ ucwords(str_replace('_', ' ', $permission)) }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Permission Management -->
                                    <div>
                                        <h5 class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-3">Permission Management</h5>
                                        <div class="space-y-2">
                                            @foreach(['view_permissions', 'create_permissions', 'edit_permissions', 'delete_permissions'] as $permission)
                                                <label class="flex items-center">
                                                    <input type="checkbox" 
                                                        id="permission_{{ $permission }}" 
                                                        name="permissions[]" 
                                                        value="{{ $permission }}"
                                                        {{ old('permissions') && in_array($permission, old('permissions')) ? 'checked' : '' }}
                                                        class="rounded dark:bg-theme-d-100 border-theme-l-300 dark:border-theme-d-300 text-theme-d-100 shadow-sm focus:ring-theme-d-100 dark:focus:ring-theme-d-100 dark:focus:ring-offset-theme-d-300">
                                                    <span class="ms-2 text-gray-600 dark:text-gray-400">{{ ucwords(str_replace('_', ' ', $permission)) }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Disc Submission -->
                                    <div>
                                        <h5 class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-3">Disc Submission</h5>
                                        <div class="space-y-2">
                                            @foreach(['submit_new_discs', 'submit_new_discs_all', 'approve_new_disc_submissions', 'approve_new_disc_submissions_all'] as $permission)
                                                <label class="flex items-center">
                                                    <input type="checkbox" 
                                                        id="permission_{{ $permission }}" 
                                                        name="permissions[]" 
                                                        value="{{ $permission }}"
                                                        {{ old('permissions') && in_array($permission, old('permissions')) ? 'checked' : '' }}
                                                        class="rounded dark:bg-theme-d-100 border-theme-l-300 dark:border-theme-d-300 text-theme-d-100 shadow-sm focus:ring-theme-d-100 dark:focus:ring-theme-d-100 dark:focus:ring-offset-theme-d-300">
                                                    <span class="ms-2 text-gray-600 dark:text-gray-400">{{ ucwords(str_replace('_', ' ', $permission)) }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Disc Verification -->
                                    <div>
                                        <h5 class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-3">Disc Verification</h5>
                                        <div class="space-y-2">
                                            @foreach(['submit_disc_verifications', 'submit_disc_verifications_all', 'approve_disc_verifications', 'approve_disc_verifications_all'] as $permission)
                                                <label class="flex items-center">
                                                    <input type="checkbox" 
                                                        id="permission_{{ $permission }}" 
                                                        name="permissions[]" 
                                                        value="{{ $permission }}"
                                                        {{ old('permissions') && in_array($permission, old('permissions')) ? 'checked' : '' }}
                                                        class="rounded dark:bg-theme-d-100 border-theme-l-300 dark:border-theme-d-300 text-theme-d-100 shadow-sm focus:ring-theme-d-100 dark:focus:ring-theme-d-100 dark:focus:ring-offset-theme-d-300">
                                                    <span class="ms-2 text-gray-600 dark:text-gray-400">{{ ucwords(str_replace('_', ' ', $permission)) }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @error('permissions')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 space-x-3">
                            <a href="{{ route('admin.roles.index') }}" class="px-3 py-1.5 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded-lg hover:bg-theme-l-400 dark:hover:bg-theme-d-300">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit" class="px-3 py-1.5 bg-white dark:bg-gray-200 text-gray-900 dark:text-gray-800 rounded-lg hover:bg-gray-50 dark:hover:bg-white">
                                {{ __('Create Role') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
