<x-app-layout>

    <div class="w-screen bg-white flex justify-center items-center">
        <div
            class="max-w-7xl mx-auto w-full flex justify-center items-center flex-col gap-10 max-md:justify-center max-md:flex-col py-16 max-md:w-full">
            <div
                class="w-full flex justify-between items-center py-12 px-10 bg-slate-50 rounded-xl max-md:rounded-none max-md:justify-center max-md:flex-col max-md:gap-5">
                <h1 class="text-3xl font-bold max-md:text-center max-md:text-2xl">Pilih Lantai Yang Kamu Inginkan</h1>

                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                    class="bg-white text-black border focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 text-center inline-flex items-center"
                    type="button">Dropdown button <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <div id="dropdown"
                    class="z-10 hidden bg-white divide-y divide-gray-200 rounded-lg shadow-sm w-44 ">
                    <ul class="py-2 text-lg text-gray-700 " aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="{{route('dashboard')}}"
                                class="block px-4 py-2 hover:bg-gray-100 text-center">Dashboard</a>
                        </li>
                    </ul>
                </div>

            </div>
            <div
                class="w-full flex justify-center items-center py-60 px-10 border rounded-xl text-slate-500 max-md:rounded-none">
                <h1 class="text-xl ">Denah Lantai Akan Ditampilkan di Sini.</h1>
            </div>
        </div>
    </div>

</x-app-layout>
