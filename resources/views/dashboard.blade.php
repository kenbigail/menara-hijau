<x-app-layout>
    <div class="w-screen bg-slate-50 flex flex-col justify-center items-center px-10">
        <div class="max-w-7xl mx-auto w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 py-5 mt-5">
            <!-- Container 1: Total Lantai -->
            <div
                class="w-full h-[180px] bg-white rounded-lg border-[#eeeeee] border-2 flex justify-center items-center py-6">
                <div class="w-[80%] h-full flex flex-col justify-start">
                    <div class="flex flex-row w-full justify-between items-center">
                        <p class="font-medium text-xl sm:text-lg lg:text-base">
                            Total Floors
                        </p>
                        <p class="font-medium text-sm sm:text-xs lg:text-[10px] text-[#AAAAAA]">
                            Menara Hijau
                        </p>
                    </div>
                    <div class="mt-3 h-[1px] w-full bg-[#EEEEEE]"></div>
                    <div class="flex flex-row w-full justify-start items-center pt-2">
                        <p class="font-semibold text-6xl sm:text-5xl lg:text-6xl">
                            {{ $floorsCount }} <span
                                class="font-medium text-sm sm:text-xs lg:text-[10px] text-[#AAAAAA]">/ Lantai</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Container 2: Total Ruangan -->
            <div
                class="w-full h-[180px] bg-white rounded-lg border-[#eeeeee] border-2 flex justify-center items-center py-6">
                <div class="w-[80%] h-full flex flex-col justify-start">
                    <div class="flex flex-row w-full justify-between items-center">
                        <p class="font-medium text-xl sm:text-lg lg:text-base">
                            Total Rooms
                        </p>
                        <p class="font-medium text-sm sm:text-xs lg:text-[10px] text-[#AAAAAA]">
                            Menara Hijau
                        </p>
                    </div>
                    <div class="mt-3 h-[1px] w-full bg-[#EEEEEE]"></div>
                    <div class="flex flex-row w-full justify-start items-center pt-2">
                        <p class="font-semibold text-6xl sm:text-5xl lg:text-6xl">
                            {{ $roomsCount }} <span
                                class="font-medium text-sm sm:text-xs lg:text-[10px] text-[#AAAAAA]">/ Ruangan</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Container 3: Total Available -->
            <div
                class="w-full h-[180px] bg-white rounded-lg border-[#eeeeee] border-2 flex justify-center items-center py-6">
                <div class="w-[80%] h-full flex flex-col justify-start">
                    <div class="flex flex-row w-full justify-between items-center">
                        <p class="font-medium text-xl sm:text-lg lg:text-base">
                            Total Available
                        </p>
                        <p class="font-medium text-sm sm:text-xs lg:text-[10px] text-[#AAAAAA]">
                            Menara Hijau
                        </p>
                    </div>
                    <div class="mt-3 h-[1px] w-full bg-[#EEEEEE]"></div>
                    <div class="flex flex-row w-full justify-start items-center pt-2">
                        <p class="font-semibold text-6xl sm:text-5xl lg:text-6xl">
                            {{ $availableRooms }} <span
                                class="font-medium text-sm sm:text-xs lg:text-[10px] text-[#AAAAAA]">/ Ruangan</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Container 4: Total Booked -->
            <div
                class="w-full h-[180px] bg-white rounded-lg border-[#eeeeee] border-2 flex justify-center items-center py-6">
                <div class="w-[80%] h-full flex flex-col justify-start">
                    <div class="flex flex-row w-full justify-between items-center">
                        <p class="font-medium text-xl sm:text-lg lg:text-base">
                            Total Booked
                        </p>
                        <p class="font-medium text-sm sm:text-xs lg:text-[10px] text-[#AAAAAA]">
                            Menara Hijau
                        </p>
                    </div>
                    <div class="mt-3 h-[1px] w-full bg-[#EEEEEE]"></div>
                    <div class="flex flex-row w-full justify-start items-center pt-2">
                        <p class="font-semibold text-6xl sm:text-5xl lg:text-6xl">
                            {{ $bookedRooms }} <span
                                class="font-medium text-sm sm:text-xs lg:text-[10px] text-[#AAAAAA]">/ Ruangan</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table Ruangan Available -->
        <div class="max-w-7xl mx-auto w-full flex flex-col justify-between items-center py-5 mb-5">
            <div
                class="w-full h-auto bg-white rounded-lg border-[#eeeeee] border-2 flex justify-center items-center py-10">
                <div class="w-[90%] h-full flex flex-col justify-start">
                    <div class="flex flex-row w-full justify-between items-center">
                        <p class="font-medium text-2xl">
                            Available Rooms
                        </p>
                        <p class="font-medium text-base text-[#AAAAAA]">
                            Menara Hijau
                        </p>
                    </div>
                    <div class="mt-10 h-[1.5px] w-full bg-[#EEEEEE]"></div>

                    <!-- "Lihat Semua" Button (Conditional) -->
                    @if (!$availableRoomsData->isEmpty())
                    <div class="w-full flex justify-end mt-5">
                        <a href="{{ route('rooms.index') }}"
                            class="flex items-center px-4 py-2 bg-[#017B48] text-white rounded-lg hover:bg-[#016138] transition">
                            <span>Lihat Semua</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    @endif

                    <!-- Available Rooms Table -->
                    <div class="w-full grid grid-cols-1 py-5 max-lg:px-5 max-lg:border-0 gap-5">
                        <div class="w-full overflow-x-auto">
                            @if ($availableRoomsData->isEmpty())
                            <!-- Empty State -->
                            <div class="text-center text-gray-500 py-5">
                                No available rooms found.
                            </div>
                            @else
                            <table class="w-full border-collapse border border-gray-200">
                                <thead>
                                    <tr class="bg-[#017B48] text-white text-left text-xl">
                                        <th class="p-4 border">Lantai</th>
                                        <th class="p-4 border">Rooms</th>
                                        <th class="p-4 border">Availability</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 text-lg">
                                    @foreach ($availableRoomsData as $room)
                                    <tr class="border-b">
                                        <!-- Lantai -->
                                        <td class="p-4 border">{{ $room->floor->num_floor }}</td>
                                        <!-- Rooms -->
                                        <td class="p-4 border">{{ $room->name_room }}</td>
                                        <!-- Availability -->
                                        <td class="p-4 border">
                                            <span class="px-3 py-1 border border-green-500 text-green-500 rounded-lg">
                                                Available
                                            </span>
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

        <!-- Table Ruangan Reserved -->
        <div class="max-w-7xl mx-auto w-full flex flex-col justify-between items-center py-5 mb-5">
            <div class="w-full h-auto bg-white rounded-lg border-[#eeeeee] border-2 flex justify-center items-center py-10">
                <div class="w-[90%] h-full flex flex-col justify-start">
                    <div class="flex flex-row w-full justify-between items-center">
                        <p class="font-medium text-2xl">
                            Reserved Rooms
                        </p>
                        <p class="font-medium text-base text-[#AAAAAA]">
                            Menara Hijau
                        </p>
                    </div>
                    <div class="mt-10 h-[1.5px] w-full bg-[#EEEEEE]"></div>

                    @if (!$tenants->isEmpty())
                    <div class="w-full flex justify-end mt-5">
                        <a href="{{ route('tenants.index') }}"
                            class="flex items-center px-4 py-2 bg-[#017B48] text-white rounded-lg hover:bg-[#016138] transition">
                            <span>Lihat Semua</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    @endif

                    <div class="w-full grid grid-cols-1 py-5 max-lg:px-5 max-lg:border-0 gap-5">
                        <div class="w-full overflow-x-auto">
                            @if ($tenants->isEmpty())
                            <div class="text-center text-gray-500 py-5">
                                No reserved rooms found.
                            </div>
                            @else
                            <table class="w-full border-collapse border border-gray-200">
                                <thead>
                                    <tr class="bg-[#017B48] text-white text-left text-xl">
                                        <th class="p-4 border">Lantai</th>
                                        <th class="p-4 border">Ruangan</th>
                                        <th class="p-4 border">Tenant</th>
                                        <th class="p-4 border">Period</th>
                                        <th class="p-4 border">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 text-lg">
                                    @foreach ($tenants as $tenant)
                                    <tr class="border-b">
                                        <td class="p-4 border">{{ $tenant->floor->num_floor ?? 'N/A' }}</td>
                                        <td class="p-4 border">{{ $tenant->room->name_room ?? 'N/A' }}</td>
                                        <td class="p-4 border">{{ $tenant->name_tenant }}</td>
                                        <td class="p-4 border">
                                            {{ \Carbon\Carbon::parse($tenant->date_start)->format('d M Y') }} -
                                            {{ \Carbon\Carbon::parse($tenant->date_end)->format('d M Y') }}
                                        </td>
                                        <td class="p-4 border">
                                            @php
                                                $statusClasses = [
                                                    'ongoing' => 'bg-green-100 text-green-800 border-green-300',
                                                    'waiting' => 'bg-yellow-100 text-yellow-800 border-yellow-300',
                                                    'finished' => 'bg-red-100 text-red-800 border-red-300'
                                                ];
                                            @endphp
                                            <span class="px-3 py-1 rounded-lg border {{ $statusClasses[$tenant->status] ?? '' }}">
                                                {{ ucfirst($tenant->status) }}
                                            </span>
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
</x-app-layout>
