<x-app-layout>
    <div class="w-screen bg-white flex justify-center items-center grow">
        <div class="max-w-7xl mx-auto w-full flex justify-center items-center flex-col gap-10 max-md:justify-center max-md:flex-col py-16 max-md:w-full h-full">

            <!-- Header Pilih Lantai -->
            <div class="w-full flex justify-between items-center py-12 px-10 bg-slate-50 rounded-xl max-md:rounded-none max-md:justify-center max-md:flex-col max-md:gap-5 relative">
                <h1 class="text-3xl font-bold max-md:text-center max-md:text-2xl">Pilih Lantai Yang Kamu Inginkan</h1>

                <!-- Button Dropdown -->
                <div class="relative">
                    <button id="floorDropdownBtn"
                        class="bg-white text-black border focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 text-center inline-flex items-center"
                        type="button">
                        <span id="selectedFloor">Pilih Lantai</span>
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
                                   data-id="{{$item->id}}" data-floor="{{$item->num_floor}}" data-image="{{$item->images}}">
                                    {{$item->num_floor}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Container untuk Menampilkan Nama Lantai dan Ruangan -->
            <div id="roomsContainer" class="grid grid-cols-[repeat(100,1fr)] grid-rows-[repeat(100,1fr)] w-full h-[800px] max-md:h-[300px] border relative max-md:w-[95%]">
                <p id="noRoomsMessage" class="text-gray-400 italic mt-5 hidden">Tidak ada ruangan untuk lantai ini.</p>
            </div>

        </div>
    </div>

    <style>
        .hover-text-shadow:hover {
          text-shadow: 0px 3px 15px rgba(115, 115, 115, 0.794);
        }
      </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var defaultFloor = $('.select-floor[data-id="1"]');
            if (defaultFloor.length) {
                var floorId = defaultFloor.data('id');
                var floorName = defaultFloor.data('floor');
                var floorImage = defaultFloor.data('image'); // Ambil gambar dari data lantai

                $('#selectedFloor').text(floorName); // Menampilkan lantai yang dipilih
                setBackgroundImage(floorImage); // Set background untuk lantai default
                fetchRooms(floorId);
            }
        });

        // Menampilkan dropdown saat tombol diklik
        $('#floorDropdownBtn').click(function() {
            $('#floorDropdownMenu').toggleClass('hidden');
        });

        // Menangani pemilihan lantai
        $('.select-floor').click(function() {
            var floorId = $(this).data('id');
            var floorName = $(this).data('floor');
            var floorImage = $(this).data('image'); // Ambil gambar dari data lantai yang dipilih

            $('#selectedFloor').text(floorName);
            setBackgroundImage(floorImage); // Set background dengan gambar yang sesuai
            fetchRooms(floorId);
            $('#floorDropdownMenu').addClass('hidden');
        });

        // Fungsi untuk mengatur background image
        function setBackgroundImage(imageUrl) {
            $('#roomsContainer').css({
                'background-image': "url('" + imageUrl + "')",
                'background-size': 'cover',
                'background-position': 'center'
            });
        }

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
                            let bgColor;

                            if (availability === 'available') {
                                bgColor = 'bg-green-200 hover:bg-green-300';
                            } else if (availability === 'unavailable') {
                                bgColor = 'bg-red-200 hover:bg-red-300';
                            } else {
                                bgColor = 'bg-gray-500 hover:bg-gray-600';
                            }

                            var roomButton = `
                                <a href="/ruang/${room.id}" class="flex flex-col items-center justify-center text-black text-lg font-bold transition-all p-6 hover:text-xl hover-text-shadow"
                                    style="grid-column: ${room.grid_col}; grid-row: ${room.grid_row};">
                                    ${room.nama_ruang}
                                    <span class="text-xs font-medium">${room.size} m2</span>
                                </a>
                            `;
                            $('#roomsContainer').append(roomButton);
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
