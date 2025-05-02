<x-app-layout>
    <div class="w-screen bg-white flex justify-center items-center grow">
        <div class="max-w-7xl mx-auto w-full flex justify-center items-center flex-col gap-10 max-md:justify-center max-md:flex-col py-16 max-md:w-full h-full">

            <!-- Header available space -->
            <div class="w-full flex justify-between items-center py-12 px-10 bg-slate-50 rounded-xl max-md:rounded-none max-md:justify-center max-md:flex-col max-md:gap-5 relative">
                <h1 class="text-3xl font-bold max-md:text-center max-md:text-2xl">Available Space</h1>

            </div>

            <!-- Table available space -->
                <div class="w-full overflow-x-auto">
                    <table class="min-w-[800px] w-full border-collapse border border-gray-200 max-md:mx-3 max-md:min-w-[500px]">
                        <thead>
                            <tr class="bg-[#017B48] text-white text-left text-xl max-md:text-base">
                                <th class="p-4 border max-md:p-2">Floor</th>
                                <th class="p-4 border max-md:p-2">Size</th>
                                <th class="p-4 border max-md:p-2">Corner</th>
                                <th class="p-4 border max-md:p-2">Room</th>
                                <th class="p-4 border max-md:p-2">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-lg">
                            @foreach ($availableRooms as $room)
                                <tr class="border-b">
                                    <td class="p-4 border max-md:p-2">
                                        {{ $room->floor ? $room->floor->num_floor : 'N/A' }}
                                    </td>
                                    <td class="p-4 border max-md:p-2">{{ $room->size }} m2</td>
                                    <td class="p-4 border max-md:p-2">{{ ucfirst($room->corner) }}</td>
                                    <td class="p-4 border max-md:p-2">{{ $room->name_room ?? 'No Name' }}</td>
                                    <td class="p-4 border max-md:p-2">
                                        <a class="py-2 px-4 max-md:px-2 max-md:py-2 border text-[#017B48] border-[#017B48] rounded hover:bg-[#017B48] hover:text-white" href="{{ route('ruang.show', ['roomId' => $room->id]) }}">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div> 
        </div>
    </div>

</x-app-layout>
