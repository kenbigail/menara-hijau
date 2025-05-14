<x-app-layout>

    <div class="w-screen bg-white flex justify-center items-center">
        <div class="max-w-7xl mx-auto w-full flex justify-center items-center flex-col gap-5 max-md:justify-center max-md:flex-col py-16 max-md:w-full">
            <div class="w-full flex justify-between items-center py-10 max-md:justify-center max-md:flex-col max-md:gap-5 border-b max-lg:px-5">
                <h1 class="text-4xl font-bold max-md:text-center max-md:text-2xl">{{$floor->num_floor}} - {{$ruang->name_room}} </h1>

                <a class="bg-white text-black border font-medium rounded-lg text-lg px-5 py-2.5 text-center inline-flex items-center hover:bg-slate-50 cursor-pointer" onclick="window.history.back();">
                 Kembali
                </a>
             

            </div>
            <div class="w-full h-[550px] flex justify-center items-center">
                <div class="w-full h-full rounded-md border flex justify-center items-center overflow-hidden">
                    {{-- !! Image Masih Template !! --}}
                    <img class="h-full w-full object-contain" src="{{ asset('images/rooms/'.$ruang->images) }}" alt="">
                </div>
            </div>
            <div class="w-full h-[150px] grid grid-cols-2 py-5 border-b max-lg:px-5 max-md:grid-cols-1 max-lg:h-auto max-lg:border-0 max-lg:gap-5">
                <div class="flex justify-start items-start flex-col gap-4">
                    <h1 class="text-4xl font-bold">Ruang {{$ruang->name_room}}</h1>
                    <h1 class="text-xl">{{$formattedFacilities}}</h1>
                </div>
                <div class="w-full border hidden max-md:block"></div>
                <div class="flex justify-start items-end flex-col gap-4 max-lg:items-start">
                    <h1 class="text-xl text-slate-600">Tertarik menggunakan Ruangan ini?</h1>
                    <a class="px-16 text-xl font-bold py-3 bg-[#017B48] text-white rounded-md hover:bg-[#017b48de] flex justify-center items-center gap-4" target="_blank" href="{{$ruang->contact}}">
                        Hubungi Kami
                        <img class="h-6" src="{{url('https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/512px-WhatsApp.svg.png')}}" alt="">
                    </a>
                </div>
            </div>
            {{-- <div class="w-full grid grid-cols-1 py-5 border-b max-lg:px-5 max-lg:border-0 gap-5">
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
                            @foreach ($tenant as $item)
                            <tr class="border-b">
                                <td class="p-4 border">{{ $item->name_tenant }}</td>
                                <td class="p-4 border">{{ $item->formatted_date_start }}</td>
                                <td class="p-4 border">{{ $item->formatted_date_end }}</td>
                                <td class="p-4 border">
                                    <!-- Menampilkan status dengan warna yang sesuai -->
                                    <span class="px-3 py-1 border 
                                                {{ $item->status == 'ongoing' ? 'border-green-500 text-green-500' : '' }}
                                                {{ $item->status == 'waiting' ? 'border-yellow-400 text-yellow-500' : '' }}
                                                {{ $item->status == 'finished' ? 'border-gray-400 text-gray-500' : '' }}
                                                rounded-lg">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div> --}}
        </div>
    </div>

</x-app-layout>
