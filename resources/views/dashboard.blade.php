<x-app-layout>
    <div class="w-screen bg-slate-50 flex flex-col justify-center items-center px-10">
        <div class="max-w-7xl mx-auto w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 py-5 mt-5">
            <!-- Container 1: Total Lantai -->
            <div
                class="w-full h-[180px] bg-white rounded-lg border-[#eeeeee] border-2 flex justify-center items-center py-6">
                <div class="w-[80%] h-full flex flex-col justify-start">
                    <div class="flex flex-row w-full justify-between items-center">
                        <p class="font-medium text-xl sm:text-lg lg:text-base">
                            Total Lantai
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
                            Total Ruangan
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
                                class="font-medium text-sm sm:text-xs lg:text-[10px] text-[#AAAAAA]">/ Unit</span>
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
                                class="font-medium text-sm sm:text-xs lg:text-[10px] text-[#AAAAAA]">/ Item</span>
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
                            Available Ruangan
                        </p>
                        <p class="font-medium text-base text-[#AAAAAA]">
                            Menara Hijau
                        </p>
                    </div>
                    <div class="mt-10 h-[1.5px] w-full bg-[#EEEEEE]"></div>
                </div>
            </div>
        </div>
        <!-- Table Ruangan Reserved -->
        <div class="max-w-7xl mx-auto w-full flex flex-col justify-between items-center py-5 mb-5">
            <div
                class="w-full h-auto bg-white rounded-lg border-[#eeeeee] border-2 flex justify-center items-center py-10">
                <div class="w-[90%] h-full flex flex-col justify-start">
                    <div class="flex flex-row w-full justify-between items-center">
                        <p class="font-medium text-2xl">
                            Ruangan Reserved
                        </p>
                        <p class="font-medium text-base text-[#AAAAAA]">
                            Menara Hijau
                        </p>
                    </div>
                    <div class="mt-10 h-[1.5px] w-full bg-[#EEEEEE]"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
