<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Create User') }}
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

                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf

                        <div class="space-y-6">
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Name:
                                </label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 sm:text-sm text-gray-900 dark:text-white bg-white dark:bg-theme-d-100 @error('name') border-red-500 dark:border-red-700 @enderror">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Email:
                                </label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 sm:text-sm text-gray-900 dark:text-white bg-white dark:bg-theme-d-100 @error('email') border-red-500 dark:border-red-700 @enderror">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Password:
                                </label>
                                <input type="password" name="password" id="password"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 sm:text-sm text-gray-900 dark:text-white bg-white dark:bg-theme-d-100 @error('password') border-red-500 dark:border-red-700 @enderror">
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Confirm Password:
                                </label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 sm:text-sm text-gray-900 dark:text-white bg-white dark:bg-theme-d-100">
                            </div>

                            <!-- Role -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Role:
                                </label>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <input type="radio" id="role_admin" name="role" value="admin"
                                            {{ old('role') == 'admin' ? 'checked' : '' }}
                                            class="h-4 w-4 bg-white dark:bg-theme-d-100 border-gray-300 dark:border-theme-d-300 text-theme-d-100 dark:text-theme-d-100 focus:ring-theme-d-100 dark:focus:ring-theme-d-100 dark:focus:ring-offset-theme-d-300">
                                        <label for="role_admin" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                                            Admin
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" id="role_moderator" name="role" value="moderator"
                                            {{ old('role') == 'moderator' ? 'checked' : '' }}
                                            class="h-4 w-4 bg-white dark:bg-theme-d-100 border-gray-300 dark:border-theme-d-300 text-theme-d-100 dark:text-theme-d-100 focus:ring-theme-d-100 dark:focus:ring-theme-d-100 dark:focus:ring-offset-theme-d-300">
                                        <label for="role_moderator" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                                            Moderator
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" id="role_submitter" name="role" value="submitter"
                                            {{ old('role') == 'submitter' ? 'checked' : '' }}
                                            class="h-4 w-4 bg-white dark:bg-theme-d-100 border-gray-300 dark:border-theme-d-300 text-theme-d-100 dark:text-theme-d-100 focus:ring-theme-d-100 dark:focus:ring-theme-d-100 dark:focus:ring-offset-theme-d-300">
                                        <label for="role_submitter" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                                            Submitter
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" id="role_user" name="role" value="user"
                                            {{ old('role') == 'user' ? 'checked' : '' }}
                                            class="h-4 w-4 bg-white dark:bg-theme-d-100 border-gray-300 dark:border-theme-d-300 text-theme-d-100 dark:text-theme-d-100 focus:ring-theme-d-100 dark:focus:ring-theme-d-100 dark:focus:ring-offset-theme-d-300">
                                        <label for="role_user" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                                            User
                                        </label>
                                    </div>
                                </div>
                                @error('role')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end space-x-3 mt-6">
                            <a href="{{ route('admin.users.index') }}" class="px-3 py-1.5 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded-lg hover:bg-theme-l-400 dark:hover:bg-theme-d-300">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit" class="px-3 py-1.5 bg-white dark:bg-gray-200 text-gray-900 dark:text-gray-800 rounded-lg hover:bg-gray-50 dark:hover:bg-white">
                                {{ __('Create User') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
