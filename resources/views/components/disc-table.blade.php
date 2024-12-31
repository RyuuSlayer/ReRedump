<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
        <div class="bg-theme-d-200 overflow-hidden rounded-lg">
            <!-- Search and Filter Bar -->
            <div class="space-y-2 p-6">
                <!-- Search and Main Filters -->
                <div class="flex flex-col gap-2">
                    <!-- Search Bar -->
                    <div class="flex gap-2">
                        <input type="text" 
                               placeholder="Search..." 
                               class="flex-1 bg-theme-d-100 text-gray-200 rounded-lg px-3 py-1.5 border-none focus:ring-2 focus:ring-indigo-500">
                        <button class="px-3 py-1.5 bg-theme-d-100 text-gray-200 rounded-lg hover:bg-theme-d-250">Filters</button>
                        <button class="px-3 py-1.5 bg-theme-d-100 text-gray-200 rounded-lg hover:bg-theme-d-250">Reset</button>
                    </div>

                    <!-- Filter Options -->
                    <div class="space-y-2">
                        <!-- Starts with -->
                        <div>
                            <label class="text-sm text-gray-400 mb-1">Starts with:</label>
                            <div class="flex flex-wrap gap-1">
                                <button class="px-2 py-1 bg-theme-d-100 text-gray-200 rounded hover:bg-theme-d-250">All</button>
                                <button class="px-2 py-1 bg-theme-d-100 text-gray-200 rounded hover:bg-theme-d-250">~</button>
                                @foreach (range('A', 'Z') as $letter)
                                    <button class="px-2 py-1 bg-theme-d-100 text-gray-200 rounded hover:bg-theme-d-250">{{ $letter }}</button>
                                @endforeach
                            </div>
                        </div>

                        <!-- Region -->
                        <div>
                            <label class="text-sm text-gray-400 mb-1">Region:</label>
                            <div class="flex flex-wrap gap-1">
                                <button class="px-2 py-1 bg-theme-d-100 text-gray-200 rounded hover:bg-theme-d-250">All</button>
                                <button class="px-2 py-1 bg-theme-d-100 text-gray-200 rounded hover:bg-theme-d-250">Twins</button>
                                <button class="px-2 py-1 bg-theme-d-100 text-gray-200 rounded hover:bg-theme-d-250">World</button>
                                <button class="px-2 py-1 bg-theme-d-100 text-gray-200 rounded hover:bg-theme-d-250">Europe</button>
                                <button class="px-2 py-1 bg-theme-d-100 text-gray-200 rounded hover:bg-theme-d-250">America</button>
                                <button class="px-2 py-1 bg-theme-d-100 text-gray-200 rounded hover:bg-theme-d-250">Asia</button>
                            </div>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="text-sm text-gray-400 mb-1">Status:</label>
                            <div class="flex gap-1">
                                <button class="px-2 py-1 bg-theme-d-100 text-gray-200 rounded hover:bg-theme-d-250 flex items-center gap-1">
                                    <span class="h-2 w-2 rounded-full bg-green-500"></span>
                                    Verified
                                </button>
                                <button class="px-2 py-1 bg-theme-d-100 text-gray-200 rounded hover:bg-theme-d-250 flex items-center gap-1">
                                    <span class="h-2 w-2 rounded-full bg-yellow-500"></span>
                                    Needs Review
                                </button>
                                <button class="px-2 py-1 bg-theme-d-100 text-gray-200 rounded hover:bg-theme-d-250 flex items-center gap-1">
                                    <span class="h-2 w-2 rounded-full bg-red-500"></span>
                                    Issue Found
                                </button>
                            </div>
                        </div>

                        <!-- Sort by -->
                        <div>
                            <label class="text-sm text-gray-400 mb-1">Sort by:</label>
                            <div class="flex gap-1">
                                <button class="px-2 py-1 bg-theme-d-100 text-gray-200 rounded hover:bg-theme-d-250">Added: Asc</button>
                                <button class="px-2 py-1 bg-theme-d-100 text-gray-200 rounded hover:bg-theme-d-250">Added: Desc</button>
                                <button class="px-2 py-1 bg-theme-d-100 text-gray-200 rounded hover:bg-theme-d-250">Modified: Asc</button>
                                <button class="px-2 py-1 bg-theme-d-100 text-gray-200 rounded hover:bg-theme-d-250">Modified: Desc</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-y border-theme-d-200 bg-theme-d-150">
                                <th scope="col" class="px-2 py-1 text-left">
                                    <button class="flex items-center gap-1 text-gray-200 hover:text-gray-100">
                                        Region
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                </th>
                                <th scope="col" class="px-2 py-1 text-left">
                                    <button class="flex items-center gap-1 text-gray-200 hover:text-gray-100">
                                        Title
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                </th>
                                <th scope="col" class="px-2 py-1 text-left">
                                    <button class="flex items-center gap-1 text-gray-200 hover:text-gray-100">
                                        System
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                </th>
                                <th scope="col" class="px-2 py-1 text-left">
                                    <button class="flex items-center gap-1 text-gray-200 hover:text-gray-100">
                                        Version
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                </th>
                                <th scope="col" class="px-2 py-1 text-left">
                                    <button class="flex items-center gap-1 text-gray-200 hover:text-gray-100">
                                        Edition
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                </th>
                                <th scope="col" class="px-2 py-1 text-left">
                                    <span class="text-gray-400 font-medium uppercase tracking-wider text-sm">Languages</span>
                                </th>
                                <th scope="col" class="px-2 py-1 text-left">
                                    <button class="flex items-center gap-1 text-gray-200 hover:text-gray-100">
                                        Serial
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                </th>
                                <th scope="col" class="px-2 py-1 text-left">
                                    <button class="flex items-center gap-1 text-gray-200 hover:text-gray-100">
                                        Status
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-theme-d-200">
                            <tr class="hover:bg-theme-d-150">
                                <td class="px-2 py-1 whitespace-nowrap">
                                    <img src="/images/regions/EU.svg" alt="Europe" class="h-4 w-6">
                                </td>
                                <td class="px-2 py-1">
                                    <div class="text-gray-200">Alone in the Dark: The New Nightmare</div>
                                    <div class="text-gray-400 text-sm">Infogrames</div>
                                </td>
                                <td class="px-2 py-1 whitespace-nowrap text-gray-200">PS1</td>
                                <td class="px-2 py-1 whitespace-nowrap text-gray-200">Original</td>
                                <td class="px-2 py-1 whitespace-nowrap text-gray-200">Collector's Edition</td>
                                <td class="px-2 py-1 whitespace-nowrap">
                                    <div class="flex gap-1">
                                        <img src="/images/regions/GB.svg" alt="English" class="h-4 w-6">
                                        <img src="/images/regions/FR.svg" alt="French" class="h-4 w-6">
                                        <img src="/images/regions/DE.svg" alt="German" class="h-4 w-6">
                                    </div>
                                </td>
                                <td class="px-2 py-1 whitespace-nowrap font-mono text-gray-200">SLES-50185</td>
                                <td class="px-2 py-1 whitespace-nowrap">
                                    <div class="flex gap-1">
                                        <span class="h-4 w-4 rounded-full bg-green-500" title="Verified"></span>
                                    </div>
                                </td>
                            </tr>

                            <tr class="hover:bg-theme-d-150">
                                <td class="px-2 py-1 whitespace-nowrap">
                                    <img src="/images/regions/JP.svg" alt="Japan" class="h-4 w-6">
                                </td>
                                <td class="px-2 py-1">
                                    <div class="text-gray-200">Biohazard 2</div>
                                    <div class="text-gray-400 text-sm">Capcom</div>
                                </td>
                                <td class="px-2 py-1 whitespace-nowrap text-gray-200">PS1</td>
                                <td class="px-2 py-1 whitespace-nowrap text-gray-200">DualShock</td>
                                <td class="px-2 py-1 whitespace-nowrap text-gray-200">Standard</td>
                                <td class="px-2 py-1 whitespace-nowrap">
                                    <div class="flex gap-1">
                                        <img src="/images/regions/JP.svg" alt="Japanese" class="h-4 w-6">
                                    </div>
                                </td>
                                <td class="px-2 py-1 whitespace-nowrap font-mono text-gray-200">SLPS-01222</td>
                                <td class="px-2 py-1 whitespace-nowrap">
                                    <div class="flex gap-1">
                                        <span class="h-4 w-4 rounded-full bg-yellow-500" title="Needs Review"></span>
                                    </div>
                                </td>
                            </tr>

                            <tr class="hover:bg-theme-d-150">
                                <td class="px-2 py-1 whitespace-nowrap">
                                    <img src="/images/regions/US.svg" alt="USA" class="h-4 w-6">
                                </td>
                                <td class="px-2 py-1">
                                    <div class="text-gray-200">Final Fantasy VII</div>
                                    <div class="text-gray-400 text-sm">Square</div>
                                </td>
                                <td class="px-2 py-1 whitespace-nowrap text-gray-200">PS1</td>
                                <td class="px-2 py-1 whitespace-nowrap text-gray-200">Greatest Hits</td>
                                <td class="px-2 py-1 whitespace-nowrap text-gray-200">Standard</td>
                                <td class="px-2 py-1 whitespace-nowrap">
                                    <div class="flex gap-1">
                                        <img src="/images/regions/US.svg" alt="English" class="h-4 w-6">
                                    </div>
                                </td>
                                <td class="px-2 py-1 whitespace-nowrap font-mono text-gray-200">SCUS-94163</td>
                                <td class="px-2 py-1 whitespace-nowrap">
                                    <div class="flex gap-1">
                                        <span class="h-4 w-4 rounded-full bg-red-500" title="Issue Found"></span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="px-4 py-2 flex items-center justify-between">
                <div class="flex-1 flex justify-between sm:hidden">
                    <div class="flex items-center gap-2 flex-1 justify-between">
                        <button class="relative inline-flex items-center px-2 py-1 bg-theme-d-100 text-sm font-medium text-gray-200 hover:bg-theme-d-250 rounded-lg">
                            Previous
                        </button>
                        <div class="flex items-center gap-2">
                            <select class="bg-theme-d-100 text-gray-200 text-sm rounded-lg px-2 py-1 border-none focus:ring-1 focus:ring-indigo-500 appearance-none bg-[url('data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20fill%3D%22none%22%20viewBox%3D%220%200%2020%2020%22%3E%3Cpath%20stroke%3D%22%239ca3af%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%20stroke-width%3D%221.5%22%20d%3D%22M6%208l4%204%204-4%22%2F%3E%3C%2Fsvg%3E')] bg-[length:1.25em_1.25em] bg-[right_0.5rem_center] bg-no-repeat pr-6">
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="500">500</option>
                            </select>
                        </div>
                        <button class="relative inline-flex items-center px-2 py-1 bg-theme-d-100 text-sm font-medium text-gray-200 hover:bg-theme-d-250 rounded-lg">
                            Next
                        </button>
                    </div>
                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div class="flex items-center gap-4">
                        <p class="text-sm text-gray-400">
                            Showing <span class="font-medium text-gray-200">1</span> to <span class="font-medium text-gray-200">20</span> of <span class="font-medium text-gray-200">100</span> results
                        </p>
                        <div class="flex items-center gap-2">
                            <label class="text-sm text-gray-400">Show:</label>
                            <select class="bg-theme-d-100 text-gray-200 text-sm rounded-lg px-2 py-1 border-none focus:ring-1 focus:ring-indigo-500 appearance-none bg-[url('data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20fill%3D%22none%22%20viewBox%3D%220%200%2020%2020%22%3E%3Cpath%20stroke%3D%22%239ca3af%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%20stroke-width%3D%221.5%22%20d%3D%22M6%208l4%204%204-4%22%2F%3E%3C%2Fsvg%3E')] bg-[length:1.25em_1.25em] bg-[right_0.5rem_center] bg-no-repeat pr-6">
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="500">500</option>
                            </select>
                            <span class="text-sm text-gray-400">per page</span>
                        </div>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex gap-2 -space-x-px">
                            <button class="relative inline-flex items-center px-1.5 py-0.5 rounded-lg bg-theme-d-100 text-sm font-medium text-gray-200 hover:bg-theme-d-250">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button class="relative inline-flex items-center px-2 py-0.5 bg-theme-d-100 text-sm font-medium text-gray-200 hover:bg-theme-d-250 rounded-lg">1</button>
                            <button class="relative inline-flex items-center px-2 py-0.5 bg-theme-d-100 text-sm font-medium text-gray-200 hover:bg-theme-d-250 rounded-lg">2</button>
                            <button class="relative inline-flex items-center px-2 py-0.5 bg-theme-d-100 text-sm font-medium text-gray-200 hover:bg-theme-d-250 rounded-lg">3</button>
                            <span class="relative inline-flex items-center px-2 py-0.5 bg-theme-d-100 text-sm font-medium text-gray-200 rounded-lg">...</span>
                            <button class="relative inline-flex items-center px-2 py-0.5 bg-theme-d-100 text-sm font-medium text-gray-200 hover:bg-theme-d-250 rounded-lg">10</button>
                            <button class="relative inline-flex items-center px-1.5 py-0.5 rounded-lg bg-theme-d-100 text-sm font-medium text-gray-200 hover:bg-theme-d-250">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
