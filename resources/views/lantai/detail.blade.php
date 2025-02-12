<x-app-layout>

    <div class="w-screen bg-white flex justify-center items-center">
        <div class="max-w-7xl mx-auto w-full flex justify-center items-center flex-col gap-5 max-md:justify-center max-md:flex-col py-16 max-md:w-full">
            <div class="w-full flex justify-between items-center py-10 max-md:justify-center max-md:flex-col max-md:gap-5 border-b max-lg:px-5">
                <h1 class="text-4xl font-bold max-md:text-center max-md:text-2xl">Lantai 1 - Kiani 1</h1>

                <a class="bg-white text-black border font-medium rounded-lg text-lg px-5 py-2.5 text-center inline-flex items-center hover:bg-slate-50" href="{{ route('lantai') }}">
                    Kembali
                </a>

            </div>
            <div class="w-full h-[550px] grid grid-cols-3 grid-rows-2 gap-5 max-lg:grid-cols-2 max-lg:px-5">
                <div class="rounded-md border col-span-2 row-span-2 flex justify-center items-center max-lg:row-span-1">
                    <h1 class="text-2xl">Foto Ruangan</h1>
                </div>
                <div class="rounded-md border flex justify-center items-center">
                    <h1 class="text-2xl">Foto Ruangan</h1>
                </div>
                <div class="rounded-md border flex justify-center items-center">
                    <h1 class="text-2xl">Foto Ruangan</h1>
                </div>
            </div>
            <div class="w-full h-[150px] grid grid-cols-2 py-5 border-b max-lg:px-5 max-md:grid-cols-1 max-lg:h-auto max-lg:border-0 max-lg:gap-5">
                <div class="flex justify-start items-start flex-col gap-4">
                    <h1 class="text-4xl font-bold">Ruang Kiani 1</h1>
                    <h1 class="text-xl">6 Guests · Meeting Room · 1 AC · 1 TV </h1>
                </div>
                <div class="w-full border hidden max-md:block"></div>
                <div class="flex justify-start items-end flex-col gap-4 max-lg:items-start">
                    <h1 class="text-xl text-slate-600">Tertarik menggunakan Ruangan ini?</h1>
                    <a class="px-16 text-xl font-bold py-3 bg-[#017B48] text-white rounded-md hover:bg-[#017b48de] flex justify-center items-center gap-4" href="">
                        Hubungi Kami
                        <img class="h-6" src="{{url('https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/512px-WhatsApp.svg.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="w-full grid grid-cols-1 py-5 border-b max-lg:px-5 max-lg:border-0 gap-5">
                <h1 class="text-4xl font-bold w-full text-left">Jadwal Ruangan</h1>
                <div class="w-full overflow-x-auto">
                    <table class="min-w-[800px] w-full border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-[#017B48] text-white text-left text-xl">
                                <th class="p-4 border">Tenant</th>
                                <th class="p-4 border">Tanggal Mulai</th>
                                <th class="p-4 border">Tanggal Selesai</th>
                                <th class="p-4 border">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-lg">
                            <tr class="border-b">
                                <td class="p-4 border">DigiTeam</td>
                                <td class="p-4 border">Minggu, 26 Januari 2025</td>
                                <td class="p-4 border">Selasa, 28 Januari 2025</td>
                                <td class="p-4 border">
                                    <span class="px-3 py-1 border border-yellow-400 text-yellow-500 rounded-lg">
                                        On-going
                                    </span>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-4 border">MJIT</td>
                                <td class="p-4 border">Jumat, 24 Januari 2025</td>
                                <td class="p-4 border">Selasa, 28 Januari 2025</td>
                                <td class="p-4 border">
                                    <span class="px-3 py-1 border border-gray-400 text-gray-500 rounded-lg">
                                        Waiting
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

</x-app-layout>
