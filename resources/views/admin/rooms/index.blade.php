<x-app-layout>
    <div class="w-screen bg-slate-50 flex flex-col justify-center items-center">
        <!-- Alert Section -->
        @if(session('success'))
        <div class="w-full max-w-7xl mx-auto mt-5">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="w-full max-w-7xl mx-auto mt-5">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                {{ session('error') }}
            </div>
        </div>
        @endif
        <div class="max-w-7xl mx-auto w-full flex justify-between items-center mt-16 max-xl:px-5">
            <button onclick="window.location.href='{{ route('tenants.index') }}'"
                class="flex items-center gap-2 px-5 py-4 bg-[#EBF4F0] text-[#017B48] hover:bg-[#017B48] hover:text-white transition-colors font-medium text-lg rounded-lg whitespace-nowrap"
                type="button">
                <span>Tambah Tenants</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
            </button>
            <div class="relative inline-block text-left">
                <button id="exportDropdownButton" data-dropdown-toggle="exportDropdownMenu"
                    class="flex items-center gap-2 px-5 py-4 bg-[#EBF4F0] text-[#017B48] hover:bg-[#017B48] hover:text-white transition-colors font-medium text-lg rounded-lg whitespace-nowrap"
                    type="button">
                    <span>Export / Import</span>
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown Menu -->
                <div id="exportDropdownMenu" class="z-10 hidden bg-white divide-y divide-gray-200 rounded-lg shadow-sm w-56 absolute right-0 mt-2">
                    <ul class="py-2 text-lg text-gray-700">
                        <li>
                            <a href="{{ route('rooms.export-pdf') }}" class="block px-4 py-2 hover:bg-gray-100">Export PDF (Available)</a>
                        </li>
                        <li>
                            <a href="{{ route('rooms.export-excel') }}" class="block px-4 py-2 hover:bg-gray-100">Export Excel</a>
                        </li>
                        <li>
                            <a href="#" onclick="document.getElementById('importForm').style.display='block'; document.querySelector('#importForm input[type=file]').click(); return false;" class="block px-4 py-2 hover:bg-gray-100">Import Excel</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto w-full flex flex-col justify-between items-center py-5 mb-5">
            <div
                class="w-full h-auto bg-white rounded-lg border-[#eeeeee] border-2 flex justify-center items-center py-10">
                <div class="w-[90%] h-full flex flex-col justify-start">
                    <!-- Floors Dropdown -->
                    <div class="flex flex-row w-full justify-between items-center">
                        <p class="font-medium text-2xl">
                            Lantai Gedung
                        </p>
                        <div>
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                class="bg-[#EBF4F0] text-black border focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 text-center inline-flex items-center"
                                type="button">
                                <span
                                    class="mr-5 text-[#017B48]">{{ $defaultFloor ? $defaultFloor->num_floor : 'Pilih Lantai' }}</span>
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown Selection -->
                            <div id="dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-200 rounded-lg shadow-sm w-44 max-h-48 overflow-y-auto">
                                <ul class="py-2 text-lg text-gray-700" aria-labelledby="dropdownDefaultButton">
                                    @foreach($floors as $floor)
                                    <li>
                                        <a href="{{ route('rooms.index', ['floor_id' => $floor->id]) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 text-center">
                                            {{ $floor->num_floor }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 h-[1.5px] w-full bg-[#EEEEEE]"></div>

                    <!-- Rooms Table -->
                    <div class="w-full grid grid-cols-1 py-5 max-lg:px-5 max-lg:border-0 gap-5">
                        <div class="w-full overflow-x-auto">
                            @if ($rooms->isEmpty())
                            <!-- Empty State -->
                            <div class="text-center text-gray-500 py-5">
                                No rooms found for this floor.
                            </div>
                            @else
                            <table class="w-full border-collapse border border-gray-200">
                                <thead>
                                    <tr class="bg-[#017B48] text-white text-left text-xl">
                                        <th class="p-4 border">Room Name</th>
                                        <th class="p-4 border">Category</th>
                                        <th class="p-4 border">Availability</th>
                                        <th class="p-4 border">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 text-lg">
                                    @foreach ($rooms as $item)
                                    <tr class="border-b">
                                        <!-- Room Name -->
                                        <td class="p-4 border">{{ $item->name_room }}</td>
                                        <!-- Category -->
                                        <td class="p-4 border">{{ ucfirst($item->categories) }}</td>
                                        <!-- Availability -->
                                        <td class="p-4 border">
                                            <span class="px-3 py-1 border 
                                                        {{ $item->availability == 'available' ? 'border-green-500 text-green-500' : 'border-red-500 text-red-500' }}
                                                        rounded-lg">
                                                {{ ucfirst($item->availability) }}
                                            </span>
                                        </td>
                                        <!-- Actions Dropdown -->
                                        <td class="p-4 border">
                                            <div class="relative">
                                                <button id="actionsDropdown{{ $item->id }}"
                                                    data-dropdown-toggle="dropdownActions{{ $item->id }}"
                                                    class="bg-[#EBF4F0] text-black border focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 text-center inline-flex items-center"
                                                    type="button">
                                                    Actions
                                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 10 6">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                    </svg>
                                                </button>
                                                <!-- Dropdown Menu -->
                                                <div id="dropdownActions{{ $item->id }}"
                                                    class="z-10 hidden bg-white divide-y divide-gray-200 rounded-lg shadow-sm w-44">
                                                    <ul class="py-2 text-lg text-gray-700">
                                                        <li>
                                                            <a href="{{ route('rooms.show', $item->id) }}"
                                                                class="block px-4 py-2 hover:bg-gray-100">Detail</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('rooms.edit', $item->id) }}"
                                                                class="block px-4 py-2 hover:bg-gray-100">Edit</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="importForm" action="{{ route('rooms.import-excel') }}" method="POST" enctype="multipart/form-data" style="display:none;">
        @csrf
        <input type="file" name="import_file" accept=".xlsx,.xls,.csv" required onchange="document.getElementById('importForm').submit();">
    </form>
</x-app-layout>
