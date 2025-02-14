<x-app-layout>
    <div class="w-screen bg-white flex justify-center items-center">
        <div class="max-w-7xl mx-auto w-full flex justify-center items-center flex-col gap-10 max-md:justify-center max-md:flex-col py-16 max-md:w-full">

            <!-- Header Pilih Lantai -->
            <div class="w-full flex justify-between items-center py-12 px-10 bg-slate-50 rounded-xl max-md:rounded-none max-md:justify-center max-md:flex-col max-md:gap-5 relative">
                <h1 class="text-3xl font-bold max-md:text-center max-md:text-2xl">Pilih Lantai Yang Kamu Inginkan</h1>

                <!-- Button Dropdown -->
                <div class="relative">
                    <button id="floorDropdownBtn"
                        class="bg-white text-black border focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 text-center inline-flex items-center"
                        type="button">
                        Pilih Lantai
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="floorDropdownMenu" class="absolute right-0 mt-2 bg-white divide-y divide-gray-200 rounded-lg shadow-md w-44 z-50 hidden">
                        <ul class="py-2 text-lg text-gray-700">
                            @foreach ($lantai as $item)
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-center select-floor"
                                   data-id="{{$item->id}}" data-floor="{{$item->num_floor}}">
                                    {{$item->num_floor}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Container untuk Menampilkan Nama Lantai dan Ruangan -->
            <div class="w-full flex flex-col justify-center items-center py-20 px-10 border rounded-xl text-slate-500 max-md:rounded-none text-center">
                <h1 id="selectedFloor" class="text-xl font-semibold mb-4">Pilih Lantai</h1>

                <!-- Daftar Ruangan -->
                <div id="roomsContainer" class="grid grid-cols-2 gap-4 w-full max-w-3xl mx-auto mt-6">
                    <!-- Ruangan akan dimuat disini setelah memilih lantai -->
                </div>

                <p id="noRoomsMessage" class="text-gray-400 italic mt-5 hidden">Tidak ada ruangan untuk lantai ini.</p>
            </div>

        </div>
    </div>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Menampilkan dropdown saat tombol diklik
        $('#floorDropdownBtn').click(function() {
            $('#floorDropdownMenu').toggleClass('hidden');
        });
    
        // Menangani pemilihan lantai
        $('.select-floor').click(function() {
            var floorId = $(this).data('id');
            var floorName = $(this).data('floor');
            $('#selectedFloor').text(floorName);
            fetchRooms(floorId);
            $('#floorDropdownMenu').addClass('hidden');
        });
    
        // Fungsi untuk mengambil dan menampilkan ruangan
        function fetchRooms(floorId) {
            $.ajax({
                url: '/lantai/' + floorId + '/ruangan',
                method: 'GET',
                success: function(data) {
                    if (data.length > 0) {
                        $('#noRoomsMessage').addClass('hidden');
                        $('#roomsContainer').html('');
    
                        data.forEach(function(room) {
                            let availability = room.availability ? room.availability.trim().toLowerCase() : "";
                            let statusText, statusColor;
    
                            // Validasi nilai availability
                            if (availability === 'available') {
                                statusText = 'Tersedia';
                                statusColor = 'text-green-500';
                            } else if (availability === 'unavailable') {
                                statusText = 'Tidak Tersedia';
                                statusColor = 'text-red-500';
                            } else {
                                statusText = 'Status Tidak Diketahui';
                                statusColor = 'text-gray-500';
                            }
    
                            var roomLink = `
                                <a href="/ruang/${room.id}" class="flex justify-between items-center px-6 py-4 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition-all">
                                    <span class="text-lg font-semibold">${room.nama_ruang}</span>
                                    <span class="text-sm font-medium ${statusColor}">${statusText}</span>
                                </a>
                            `;
                            $('#roomsContainer').append(roomLink);
                        });
                    } else {
                        $('#roomsContainer').html('');
                        $('#noRoomsMessage').removeClass('hidden');
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan saat mengambil data ruangan.');
                }
            });
        }
    </script>
    
    

</x-app-layout>
