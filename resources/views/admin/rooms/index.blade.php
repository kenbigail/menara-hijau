<x-app-layout>
    <div class="w-screen bg-slate-50 flex flex-col justify-center items-center">
        <div class="max-w-7xl mx-auto w-full flex justify-between items-center mt-16">
            <button
                class="flex items-center gap-2 px-5 py-4 bg-[#EBF4F0] text-[#017B48] font-medium text-lg rounded-lg whitespace-nowrap">
                <span>Tambah Ruangan</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
            </button>
            <button
                class="flex items-center gap-2 px-5 py-4 bg-[#EBF4F0] text-[#017B48] font-medium text-lg rounded-lg whitespace-nowrap">
                <span>Tambah Lantai</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
            </button>
        </div>
        <div
            class="max-w-7xl mx-auto w-full flex justify-between mt-5 items-center max-md:justify-center max-md:flex-col max-xl:px-5">
            <div class="max-w-7xl mx-auto w-full flex flex-col justify-between items-center py-2 mt-5">
                <div
                    class="w-full h-auto bg-white rounded-lg border-[#eeeeee] border-2 flex justify-center items-center py-10">
                    <div class="w-[90%] h-full flex flex-col justify-start">
                        <div class="flex flex-row w-full justify-between items-center">
                            <p class="font-medium text-2xl">
                                Lantai Gedung
                            </p>
                            {{-- Dropdown Button --}}
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
                            {{-- Dropdown Selection --}}
                            <div id="dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-200 rounded-lg shadow-sm w-44 max-h-48 overflow-y-auto">
                                <ul class="py-2 text-lg text-gray-700" aria-labelledby="dropdownDefaultButton">
                                    @foreach($floors as $floor)
                                    <li>
                                        <a href="{{ route('ruang', ['id' => $floor->id]) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 text-center">
                                            {{ $floor->num_floor }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="mt-10 h-[1.5px] w-full bg-[#EEEEEE]"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
