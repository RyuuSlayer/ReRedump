<nav x-data="{ open: false }" class="bg-theme-l-200 dark:bg-theme-d-400 border-b border-theme-l-300 dark:border-theme-d-300">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('main') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 lg:-my-px lg:ms-10 lg:flex items-center">
                    <div class="relative inline-flex items-center" x-data="{ open: false, commodore: false, multimedia: false, nintendo: false, sega: false, sony: false, konami: false }" @mouseleave="open = false">
                        <x-nav-link href="{{ route('discs') }}" :active="request()->routeIs('discs')" @mouseover="open = true" class="inline-flex items-center">
                            {{ __('Game Discs') }}
                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </x-nav-link>
                        
                        <!-- Main Dropdown -->
                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute left-0 top-full -mt-1 w-48 rounded-md shadow-lg bg-theme-l-100 dark:bg-theme-d-200 ring-1 ring-black ring-opacity-5"
                             style="display: none;">
                            <!-- Invisible hover bridge to prevent gap -->
                            <div class="absolute top-0 h-2 -translate-y-full w-full"></div>
                            {{-- TODO: These menu items are placeholders and will need to be dynamically generated from the database.
                                     Each category and its subcategories should be pulled from the systems table with its relation to a manufacturer in the database.
                                     The current structure serves as a template for the dynamic menu generation. --}}
                            <!-- Main Categories -->
                            <div class="py-1">
                                <!-- Commodore -->
                                <div class="relative" @mouseleave="commodore = false">
                                    <a @mouseover="commodore = true; multimedia = false; nintendo = false; sega = false; sony = false; konami = false" 
                                       href="#" 
                                       class="flex justify-between items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">
                                        Commodore
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                    <!-- Commodore Submenu -->
                                    <div x-show="commodore"
                                         class="absolute left-full top-0 w-48 rounded-md shadow-lg bg-theme-l-100 dark:bg-theme-d-200 ring-1 ring-black ring-opacity-5">
                                        <div class="py-1">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">Amiga CD</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">Amiga CDTV</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">Amiga CD32</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Multimedia -->
                                <div class="relative" @mouseleave="multimedia = false">
                                    <a @mouseover="multimedia = true; commodore = false; nintendo = false; sega = false; sony = false; konami = false"
                                       href="#"
                                       class="flex justify-between items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">
                                        Multimedia
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                    <!-- Multimedia Submenu -->
                                    <div x-show="multimedia"
                                         class="absolute left-full top-0 w-48 rounded-md shadow-lg bg-theme-l-100 dark:bg-theme-d-200 ring-1 ring-black ring-opacity-5">
                                        <div class="py-1">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">Video CD</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">Audio CD</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">DVD-Video</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Nintendo -->
                                <div class="relative" @mouseleave="nintendo = false">
                                    <a @mouseover="nintendo = true; commodore = false; multimedia = false; sega = false; sony = false; konami = false"
                                       href="#"
                                       class="flex justify-between items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">
                                        Nintendo
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                    <!-- Nintendo Submenu -->
                                    <div x-show="nintendo"
                                         class="absolute left-full top-0 w-48 rounded-md shadow-lg bg-theme-l-100 dark:bg-theme-d-200 ring-1 ring-black ring-opacity-5">
                                        <div class="py-1">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">Gamecube</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">Wii</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">Wii-U</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sega -->
                                <div class="relative" @mouseleave="sega = false">
                                    <a @mouseover="sega = true; commodore = false; multimedia = false; nintendo = false; sony = false; konami = false"
                                       href="#"
                                       class="flex justify-between items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">
                                        Sega
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                    <!-- Sega Submenu -->
                                    <div x-show="sega"
                                         class="absolute left-full top-0 w-48 rounded-md shadow-lg bg-theme-l-100 dark:bg-theme-d-200 ring-1 ring-black ring-opacity-5">
                                        <div class="py-1">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">Dreamcast</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">Sega CD / Mega CD</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">Saturn</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sony -->
                                <div class="relative" @mouseleave="sony = false">
                                    <a @mouseover="sony = true; commodore = false; multimedia = false; nintendo = false; sega = false; konami = false"
                                       href="#"
                                       class="flex justify-between items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">
                                        Sony
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                    <!-- Sony Submenu -->
                                    <div x-show="sony"
                                         class="absolute left-full top-0 w-48 rounded-md shadow-lg bg-theme-l-100 dark:bg-theme-d-200 ring-1 ring-black ring-opacity-5">
                                        <div class="py-1">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">PlayStation</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">PlayStation 2</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">PlayStation 3</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">PlayStation 4</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">PlayStation Portable</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Konami -->
                                <div class="relative" @mouseleave="konami = false">
                                    <a @mouseover="konami = true; commodore = false; multimedia = false; nintendo = false; sega = false; sony = false"
                                       href="#"
                                       class="flex justify-between items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">
                                        Konami
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                    <!-- Konami Submenu -->
                                    <div x-show="konami"
                                         class="absolute left-full top-0 w-48 rounded-md shadow-lg bg-theme-l-100 dark:bg-theme-d-200 ring-1 ring-black ring-opacity-5">
                                        <div class="py-1">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">Firebeat</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-theme-l-200 dark:hover:bg-theme-d-300">M2</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-nav-link href="{{ route('nongame-discs') }}" :active="request()->routeIs('nongame-discs')">
                        {{ __('NonGame Discs') }}
                    </x-nav-link>
                    <div class="border-l border-gray-400 dark:border-gray-600 h-4 my-auto mx-3 opacity-50"></div>
                    <x-nav-link href="{{ route('downloads') }}" :active="request()->routeIs('downloads')" class="inline-flex items-center" title="{{ __('Downloads') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                    </x-nav-link>
                    <x-nav-link href="http://wiki.redump.org/index.php?title=Dumping_Guides" target="_blank" rel="noopener noreferrer" class="inline-flex items-center" title="{{ __('Dumping Guide') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="8" stroke-width="2"/>
                            <circle cx="12" cy="12" r="2" stroke-width="2"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v2m0 12v2m-8-10h2m12 0h2"/>
                        </svg>
                    </x-nav-link>
                    <x-nav-link href="http://wiki.redump.org/index.php?title=Main_Page" target="_blank" rel="noopener noreferrer" class="inline-flex items-center" title="{{ __('Wiki') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z"></path>
                        </svg>
                    </x-nav-link>
                    <x-nav-link href="http://forum.redump.org/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center" title="{{ __('Forum') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                        </svg>
                    </x-nav-link>
                    @auth
                        @role('admin')
                            <!-- Users Management -->
                            <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.*')" class="inline-flex items-center" title="{{ __('Users') }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </x-nav-link>

                            <!-- Roles Management -->
                            <x-nav-link href="{{ route('roles.index') }}" :active="request()->routeIs('roles.*')" class="inline-flex items-center" title="{{ __('Roles') }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </x-nav-link>
                        @endrole

                        @role('moderator')
                            <!-- Users Management for Moderators -->
                            <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.*')" class="inline-flex items-center" title="{{ __('Users') }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </x-nav-link>
                        @endrole
                    @endauth
                </div>
            </div>

            <div class="hidden lg:flex lg:items-center lg:ms-6">
                @auth
                    <div class="lg:ms-3 relative flex items-center">
                        <a href="https://github.com/RyuuSlayer/ReRedump" target="_blank" rel="noopener noreferrer" class="inline-flex items-center px-3 py-2 text-sm text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-200 transition">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <!-- Teams Dropdown -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="lg:ms-3 relative">
                                <x-dropdown align="right" width="60">
                                    <x-slot name="trigger">
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-300 bg-white dark:bg-theme-d-400 hover:text-gray-700 dark:hover:text-gray-200 focus:outline-none focus:bg-gray-50 dark:hover:bg-theme-d-300 dark:focus:bg-theme-d-300 active:bg-gray-50 dark:active:bg-theme-d-300 transition ease-in-out duration-150">
                                                {{ Auth::user()->currentTeam->name }}

                                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                                </svg>
                                            </button>
                                        </span>
                                    </x-slot>

                                    <x-slot name="content">
                                        <!-- Team Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400 dark:text-gray-300">
                                            {{ __('Manage Team') }}
                                        </div>

                                        <!-- Team Settings -->
                                        <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                            {{ __('Team Settings') }}
                                        </x-dropdown-link>

                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-dropdown-link href="{{ route('teams.create') }}">
                                                {{ __('Create New Team') }}
                                            </x-dropdown-link>
                                        @endcan

                                        <!-- Team Switcher -->
                                        @if (Auth::user()->allTeams()->count() > 1)
                                            <div class="border-t border-gray-200 dark:border-theme-d-400"></div>

                                            <div class="block px-4 py-2 text-xs text-gray-400 dark:text-gray-300">
                                                {{ __('Switch Teams') }}
                                            </div>

                                            @foreach (Auth::user()->allTeams() as $team)
                                                <x-switchable-team :team="$team" />
                                            @endforeach
                                        @endif
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        @endif

                        <!-- Settings Dropdown -->
                        <div class="lg:ms-3 relative">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-theme-l-300 dark:focus:border-theme-d-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                        </button>
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-300 bg-theme-l-100 dark:bg-theme-d-200 hover:text-gray-700 dark:hover:text-gray-200 hover:bg-theme-l-200 dark:hover:bg-theme-d-100 focus:outline-none focus:bg-theme-l-200 dark:focus:bg-theme-d-100 active:bg-theme-l-300 dark:active:bg-theme-d-300 transition ease-in-out duration-150">
                                                {{ Auth::user()->name }}

                                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </button>
                                        </span>
                                    @endif
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400 dark:text-gray-300">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-dropdown-link>
                                    @endif

                                    <div class="border-t border-gray-200 dark:border-theme-d-400"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <x-dropdown-link href="{{ route('logout') }}"
                                                     @click.prevent="$root.submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                @else
                    <div class="lg:ms-3 relative">
                        <a href="https://github.com/RyuuSlayer/ReRedump" target="_blank" rel="noopener noreferrer" class="inline-flex items-center px-3 py-2 text-sm text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-200 transition">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="{{ route('login') }}" class="text-sm text-gray-500 dark:text-gray-300 underline">Log in</a>
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-500 dark:text-gray-300 underline">Register</a>
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center lg:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-theme-l-200 dark:hover:bg-theme-d-200 focus:outline-none focus:bg-theme-l-200 dark:focus:bg-theme-d-200 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('discs') }}" :active="request()->routeIs('discs')">
                {{ __('Game Discs') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('nongame-discs') }}" :active="request()->routeIs('nongame-discs')">
                {{ __('NonGame Discs') }}
            </x-responsive-nav-link>
            <div class="border-t border-gray-400 dark:border-gray-600 my-1"></div>
            <x-responsive-nav-link href="{{ route('downloads') }}" :active="request()->routeIs('downloads')" class="inline-flex items-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                {{ __('Downloads') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="http://wiki.redump.org/index.php?title=Dumping_Guides" target="_blank" rel="noopener noreferrer" class="inline-flex items-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="8" stroke-width="2"/>
                    <circle cx="12" cy="12" r="2" stroke-width="2"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v2m0 12v2m-8-10h2m12 0h2"/>
                </svg>
                {{ __('Guide') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="http://wiki.redump.org/index.php?title=Main_Page" target="_blank" rel="noopener noreferrer" class="inline-flex items-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z"></path>
                </svg>
                {{ __('Wiki') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="http://forum.redump.org/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                </svg>
                {{ __('Forum') }}
            </x-responsive-nav-link>
            @auth
                @role('admin')
                    <x-responsive-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
                        {{ __('Users') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('roles.index') }}" :active="request()->routeIs('roles.*')">
                        {{ __('Roles') }}
                    </x-responsive-nav-link>
                @endrole

                @role('moderator')
                    <x-responsive-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
                        {{ __('Users') }}
                    </x-responsive-nav-link>
                @endrole
            @endauth
        </div>

        <!-- Rest of responsive menu -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-400 dark:border-gray-600">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500 dark:text-gray-300">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <div class="py-1 border-t border-gray-400 dark:border-gray-600">
                <x-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            </div>
        @endauth
    </div>
</nav>
