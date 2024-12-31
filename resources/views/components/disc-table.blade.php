<div class="bg-theme-l-100 dark:bg-theme-d-400">
    <div class="bg-theme-l-300 dark:bg-theme-d-200 overflow-hidden rounded-lg p-4">
        <!-- Search Bar -->
        <div class="flex gap-2 mb-6">
            <input type="text" 
                   placeholder="Search..." 
                   class="flex-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded-md px-3 py-1.5 border-none focus:ring-2 focus:ring-indigo-500">
            <button class="px-3 py-1.5 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded-lg hover:bg-theme-l-400 dark:hover:bg-theme-d-250">Filters</button>
            <button class="px-3 py-1.5 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded-lg hover:bg-theme-l-400 dark:hover:bg-theme-d-250">Reset</button>
        </div>

        <!-- Filter Options -->
        <div class="space-y-4">
            <!-- Starts with -->
            <div>
                <label class="text-sm text-gray-600 dark:text-gray-400 mb-2 block">Starts with:</label>
                <div class="flex flex-wrap gap-1">
                    <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">All</button>
                    <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">~</button>
                    @foreach (range('A', 'Z') as $letter)
                        <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">{{ $letter }}</button>
                    @endforeach
                </div>
            </div>

            <!-- Region -->
            <div>
                <label class="text-sm text-gray-600 dark:text-gray-400 mb-2 block">Region:</label>
                <div class="flex flex-wrap gap-1">
                    <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">All</button>
                    <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">Twins</button>
                    <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">World</button>
                    <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">Europe</button>
                    <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">America</button>
                    <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">Asia</button>
                </div>
            </div>

            <!-- Status -->
            <div>
                <label class="text-sm text-gray-600 dark:text-gray-400 mb-2 block">Status:</label>
                <div class="flex flex-wrap gap-1">
                    <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">
                        <span class="inline-block w-2 h-2 rounded-full bg-green-500 mr-1"></span>
                        Verified
                    </button>
                    <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">
                        <span class="inline-block w-2 h-2 rounded-full bg-yellow-500 mr-1"></span>
                        Needs Review
                    </button>
                    <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">
                        <span class="inline-block w-2 h-2 rounded-full bg-red-500 mr-1"></span>
                        Issue Found
                    </button>
                </div>
            </div>

            <!-- Sort by -->
            <div>
                <label class="text-sm text-gray-600 dark:text-gray-400 mb-2 block">Sort by:</label>
                <div class="flex flex-wrap gap-1">
                    <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">Added: Asc</button>
                    <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">Added: Desc</button>
                    <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">Modified: Asc</button>
                    <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">Modified: Desc</button>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="mt-6">
            <table class="min-w-full">
                <thead>
                    <tr class="border-y border-theme-l-400 dark:border-theme-d-100">
                        <th scope="col" class="px-2 py-1 text-left">
                            <button class="flex items-center gap-1 text-gray-900 dark:text-white hover:text-gray-700 dark:hover:text-gray-200">
                                Region
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </th>
                        <th scope="col" class="px-2 py-1 text-left">
                            <button class="flex items-center gap-1 text-gray-900 dark:text-white hover:text-gray-700 dark:hover:text-gray-200">
                                Title
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </th>
                        <th scope="col" class="px-2 py-1 text-left">
                            <button class="flex items-center gap-1 text-gray-900 dark:text-white hover:text-gray-700 dark:hover:text-gray-200">
                                System
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </th>
                        <th scope="col" class="px-2 py-1 text-left">
                            <button class="flex items-center gap-1 text-gray-900 dark:text-white hover:text-gray-700 dark:hover:text-gray-200">
                                Version
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </th>
                        <th scope="col" class="px-2 py-1 text-left">
                            <button class="flex items-center gap-1 text-gray-900 dark:text-white hover:text-gray-700 dark:hover:text-gray-200">
                                Edition
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </th>
                        <th scope="col" class="px-2 py-1 text-left">
                            <span class="text-gray-600 dark:text-gray-400 font-medium uppercase tracking-wider text-sm">Languages</span>
                        </th>
                        <th scope="col" class="px-2 py-1 text-left">
                            <button class="flex items-center gap-1 text-gray-900 dark:text-white hover:text-gray-700 dark:hover:text-gray-200">
                                Serial
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </th>
                        <th scope="col" class="px-2 py-1 text-left">
                            <button class="flex items-center gap-1 text-gray-900 dark:text-white hover:text-gray-700 dark:hover:text-gray-200">
                                Status
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-theme-l-400 dark:divide-theme-d-100">
                    <tr class="hover:bg-theme-l-400 dark:hover:bg-theme-d-250">
                        <td class="px-2 py-1 whitespace-nowrap">
                            <img src="/images/regions/EU.svg" alt="Europe" class="h-4 w-6">
                        </td>
                        <td class="px-2 py-1">
                            <div class="text-gray-900 dark:text-white">Alone in the Dark: The New Nightmare</div>
                            <div class="text-gray-600 dark:text-gray-400 text-sm">Infogrames</div>
                        </td>
                        <td class="px-2 py-1 whitespace-nowrap text-gray-900 dark:text-white">PS1</td>
                        <td class="px-2 py-1 whitespace-nowrap text-gray-900 dark:text-white">Original</td>
                        <td class="px-2 py-1 whitespace-nowrap text-gray-900 dark:text-white">Collector's Edition</td>
                        <td class="px-2 py-1 whitespace-nowrap">
                            <div class="flex gap-1">
                                <img src="/images/regions/GB.svg" alt="English" class="h-4 w-6">
                                <img src="/images/regions/FR.svg" alt="French" class="h-4 w-6">
                                <img src="/images/regions/DE.svg" alt="German" class="h-4 w-6">
                            </div>
                        </td>
                        <td class="px-2 py-1 whitespace-nowrap font-mono text-gray-900 dark:text-white">SLES-50185</td>
                        <td class="px-2 py-1 whitespace-nowrap">
                            <span class="h-4 w-4 rounded-full bg-green-500" title="Verified"></span>
                        </td>
                    </tr>

                    <tr class="hover:bg-theme-l-400 dark:hover:bg-theme-d-250">
                        <td class="px-2 py-1 whitespace-nowrap">
                            <img src="/images/regions/JP.svg" alt="Japan" class="h-4 w-6">
                        </td>
                        <td class="px-2 py-1">
                            <div class="text-gray-900 dark:text-white">Biohazard 2</div>
                            <div class="text-gray-600 dark:text-gray-400 text-sm">Capcom</div>
                        </td>
                        <td class="px-2 py-1 whitespace-nowrap text-gray-900 dark:text-white">PS1</td>
                        <td class="px-2 py-1 whitespace-nowrap text-gray-900 dark:text-white">DualShock</td>
                        <td class="px-2 py-1 whitespace-nowrap text-gray-900 dark:text-white">Standard</td>
                        <td class="px-2 py-1 whitespace-nowrap">
                            <div class="flex gap-1">
                                <img src="/images/regions/JP.svg" alt="Japanese" class="h-4 w-6">
                            </div>
                        </td>
                        <td class="px-2 py-1 whitespace-nowrap font-mono text-gray-900 dark:text-white">SLPS-01222</td>
                        <td class="px-2 py-1 whitespace-nowrap">
                            <span class="h-4 w-4 rounded-full bg-yellow-500" title="Needs Review"></span>
                        </td>
                    </tr>

                    <tr class="hover:bg-theme-l-400 dark:hover:bg-theme-d-250">
                        <td class="px-2 py-1 whitespace-nowrap">
                            <img src="/images/regions/US.svg" alt="USA" class="h-4 w-6">
                        </td>
                        <td class="px-2 py-1">
                            <div class="text-gray-900 dark:text-white">Final Fantasy VII</div>
                            <div class="text-gray-600 dark:text-gray-400 text-sm">Square</div>
                        </td>
                        <td class="px-2 py-1 whitespace-nowrap text-gray-900 dark:text-white">PS1</td>
                        <td class="px-2 py-1 whitespace-nowrap text-gray-900 dark:text-white">Greatest Hits</td>
                        <td class="px-2 py-1 whitespace-nowrap text-gray-900 dark:text-white">Standard</td>
                        <td class="px-2 py-1 whitespace-nowrap">
                            <div class="flex gap-1">
                                <img src="/images/regions/US.svg" alt="English" class="h-4 w-6">
                            </div>
                        </td>
                        <td class="px-2 py-1 whitespace-nowrap font-mono text-gray-900 dark:text-white">SCUS-94163</td>
                        <td class="px-2 py-1 whitespace-nowrap">
                            <span class="h-4 w-4 rounded-full bg-red-500" title="Issue Found"></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 flex items-center justify-between text-sm">
            <div class="text-gray-600 dark:text-gray-400">
                Showing <span class="text-gray-900 dark:text-white">1</span> to <span class="text-gray-900 dark:text-white">20</span> of <span class="text-gray-900 dark:text-white">100</span> results
            </div>
            <div class="flex items-center gap-2">
                <span class="text-gray-600 dark:text-gray-400">Show:</span>
                <select class="bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded px-2 py-1 border-none focus:ring-2 focus:ring-indigo-500 appearance-none bg-[url('data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20fill%3D%22none%22%20viewBox%3D%220%200%2020%2020%22%3E%3Cpath%20stroke%3D%22%236b7280%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%20stroke-width%3D%221.5%22%20d%3D%22M6%208l4%204%204-4%22%2F%3E%3C%2Fsvg%3E')] bg-[length:1.25rem_1.25rem] bg-no-repeat bg-[right_0.3rem_center] pr-8">
                    <option>20</option>
                    <option>50</option>
                    <option>100</option>
                </select>
                <span class="text-gray-600 dark:text-gray-400">per page</span>
            </div>
            <nav class="flex gap-1">
                <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">
                    <span class="sr-only">Previous</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
                <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">1</button>
                <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">2</button>
                <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">3</button>
                <span class="px-2 py-1 text-gray-900 dark:text-white">...</span>
                <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">10</button>
                <button class="px-2 py-1 bg-theme-l-100 dark:bg-theme-d-100 text-gray-900 dark:text-white rounded hover:bg-theme-l-400 dark:hover:bg-theme-d-250">
                    <span class="sr-only">Next</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            </nav>
        </div>
    </div>
</div>
