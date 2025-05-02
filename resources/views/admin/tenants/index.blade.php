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

        <!-- Modal and Dropdown Section -->
        <div class="max-w-7xl mx-auto w-full flex justify-between items-center mt-16 max-xl:px-5">
            <!-- Add Tenant Button -->
            <button data-modal-target="crud-modal-create" data-modal-toggle="crud-modal-create"
                class="flex items-center gap-2 px-5 py-4 bg-[#EBF4F0] text-[#017B48] hover:bg-[#017B48] hover:text-white transition-colors font-medium text-lg rounded-lg whitespace-nowrap"
                type="button">
                <span>Tambah Tenants</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
            </button>
        </div>

        <!-- Tenant Creation Modal -->
        <div id="crud-modal-create" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full bg-white rounded-lg shadow-lg">
                <!-- Modal Header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-[#EEEEEE]">
                    <h3 class="text-lg font-medium text-black">
                        Tambah Tenant Baru
                    </h3>
                    <button type="button"
                        class="text-[#646464] bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="crud-modal-create">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal Body -->
                <form class="p-4 md:p-5" method="POST" action="{{ route('tenants.store') }}" id="createForm">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <!-- Tenant Name -->
                        <div class="col-span-2">
                            <label for="name_tenant" class="block mb-2 text-sm font-medium text-[#646464]">Nama
                                Tenant</label>
                            <input type="text" name="name_tenant" id="name_tenant"
                                class="border border-[#EEEEEE] text-[#646464] text-sm font-medium rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Ketik Nama Tenant" required>
                            <span id="name_tenant-error" class="text-red-500 text-sm hidden">Nama tenant harus
                                diisi.</span>
                        </div>

                        <!-- Email -->
                        <div class="col-span-2">
                            <label for="email" class="block mb-2 text-sm font-medium text-[#646464]">Email</label>
                            <input type="email" name="email" id="email"
                                class="border border-[#EEEEEE] text-[#646464] text-sm font-medium rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Ketik Email Tenant" required>
                            <span id="email-error" class="text-red-500 text-sm hidden">Email harus valid.</span>
                        </div>

                        <!-- Phone -->
                        <div class="col-span-2">
                            <label for="phone" class="block mb-2 text-sm font-medium text-[#646464]">Nomor
                                Telepon</label>
                            <input type="tel" name="phone" id="phone"
                                class="border border-[#EEEEEE] text-[#646464] text-sm font-medium rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Ketik Nomor Telepon" required>
                            <span id="phone-error" class="text-red-500 text-sm hidden">Nomor telepon harus diisi.</span>
                        </div>

                        <!-- Room Selection with Search -->
                        <div class="col-span-2">
                            <label for="room_search" class="block mb-2 text-sm font-medium text-[#646464]">Cari
                                Ruangan</label>
                            <div class="relative">
                                <input type="text" id="room_search"
                                    class="border border-[#EEEEEE] text-[#646464] text-sm font-medium rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="Ketik nama ruangan..." autocomplete="off">
                                <div id="room_results"
                                    class="absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg hidden max-h-60 overflow-y-auto">
                                    <!-- Options will appear here dynamically -->
                                </div>
                            </div>
                            <input type="hidden" name="id_room" id="id_room" required>
                            <input type="hidden" name="id_floor" id="id_floor" required>
                            <div id="selected_room_info" class="mt-2 p-2 bg-gray-50 rounded-lg hidden">
                                <p class="text-sm font-medium" id="selected_room_name"></p>
                                <p class="text-xs text-gray-500" id="selected_floor_name"></p>
                            </div>
                            <span id="room-error" class="text-red-500 text-sm hidden">Ruangan harus dipilih.</span>
                        </div>

                        <!-- Date Start -->
                        <div class="col-span-1">
                            <label for="date_start" class="block mb-2 text-sm font-medium text-[#646464]">Tanggal
                                Mulai</label>
                            <input type="date" name="date_start" id="date_start"
                                class="border border-[#EEEEEE] text-[#646464] text-sm font-medium rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                required>
                            <span id="date_start-error" class="text-red-500 text-sm hidden">Tanggal mulai harus
                                diisi.</span>
                        </div>

                        <!-- Date End -->
                        <div class="col-span-1">
                            <label for="date_end" class="block mb-2 text-sm font-medium text-[#646464]">Tanggal
                                Selesai</label>
                            <input type="date" name="date_end" id="date_end"
                                class="border border-[#EEEEEE] text-[#646464] text-sm font-medium rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                required>
                            <span id="date_end-error" class="text-red-500 text-sm hidden">Tanggal selesai harus
                                diisi.</span>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" id="submitButton"
                            class="flex justify-end items-center bg-[#EBF4F0] text-[#017B48] font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:bg-[#017B48] hover:text-white transition disabled:opacity-50 disabled:cursor-not-allowed"
                            disabled>
                            Simpan Tenant
                            <svg class="ms-1 -me-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table Section -->
        <div class="max-w-7xl mx-auto w-full flex flex-col justify-between items-center py-2 mt-5">
            <div
                class="w-full h-auto bg-white rounded-lg border-[#eeeeee] border-2 flex justify-center items-center py-10">
                <div class="w-[90%] h-full flex flex-col justify-start">
                    <div class="flex flex-row w-full justify-between items-center">
                        <p class="font-medium text-2xl">List Tenants</p>
                        <!-- Dropdown Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="bg-[#EBF4F0] text-black border focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 text-center inline-flex items-center"
                            type="button">
                            <span class="mr-5 text-[#017B48]">{{ ucfirst($status) }}</span>
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
                                @foreach(['all', 'ongoing', 'waiting'] as $s)
                                <li>
                                    <a href="{{ route('tenants.index', ['status' => $s === 'all' ? null : $s]) }}"
                                        class="block px-4 py-2 hover:bg-gray-100 text-center
                                        {{ $status === $s ? 'bg-gray-200 font-bold' : '' }}">
                                        {{ ucfirst($s) }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Separator Line -->
                    <div class="mt-10 h-[1.5px] w-full bg-[#EEEEEE]"></div>

                    <!-- Table Section -->
                    <div class="w-full grid grid-cols-1 py-5 max-lg:px-5 max-lg:border-0 gap-5">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full border-collapse border border-gray-200">
                                <thead>
                                    <tr class="bg-[#017B48] text-white text-left text-xl">
                                        <th class="p-4 border">Nama Tenant</th>
                                        <th class="p-4 border">Ruangan</th>
                                        <th class="p-4 border">Periode</th>
                                        <th class="p-4 border">Status</th>
                                        <th class="p-4 border text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 text-lg">
                                    @foreach ($tenants as $item)
                                    <tr class="border-b">
                                        <td class="p-4 border">{{ $item->name_tenant }}</td>
                                        <td class="p-4 border">
                                            {{ $item->room->name_room }}<br>
                                            <span class="text-sm text-gray-500">{{ $item->floor->num_floor }}</span>
                                        </td>
                                        <td class="p-4 border">
                                            {{ \Carbon\Carbon::parse($item->date_start)->format('d M Y') }} -
                                            {{ \Carbon\Carbon::parse($item->date_end)->format('d M Y') }}
                                        </td>
                                        <td class="p-4 border">
                                            <span class="px-3 py-1 border 
                                            {{ $item->status == 'ongoing' ? 'border-green-500 text-green-500' : '' }}
                                            {{ $item->status == 'waiting' ? 'border-gray-500 text-gray-500' : '' }}
                                            {{ $item->status == 'finished' ? 'border-red-500 text-red-500' : '' }}
                                            rounded-lg">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>
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
                                                            <a href="{{ route('tenants.show', $item->id) }}"
                                                                class="block px-4 py-2 hover:bg-gray-100">Detail</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('tenants.edit', $item->id) }}"
                                                                class="block px-4 py-2 hover:bg-gray-100">Edit</a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('tenants.destroy', $item->id) }}"
                                                                method="POST" class="w-full">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="w-full text-left px-4 py-2 hover:bg-gray-100">Delete</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Validation and Room Search Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('createForm');
            const submitButton = document.getElementById('submitButton');
            const roomSearch = document.getElementById('room_search');
            const roomResults = document.getElementById('room_results');
            const idRoomInput = document.getElementById('id_room');
            const idFloorInput = document.getElementById('id_floor');
            const selectedRoomInfo = document.getElementById('selected_room_info');
            const selectedRoomName = document.getElementById('selected_room_name');
            const selectedFloorName = document.getElementById('selected_floor_name');
            const dateStart = document.getElementById('date_start');
            const dateEnd = document.getElementById('date_end');

            // Track if user has interacted with each field
            const fieldInteractions = {};

            // Initialize field interactions
            form.querySelectorAll('input, select').forEach(field => {
                fieldInteractions[field.id] = false;
            });

            // Available rooms data
            const availableRooms = [
                @foreach($availableRooms as $room) {
                    id: "{{ $room->id }}",
                    floor_id: "{{ $room->id_floor }}",
                    name: "{{ $room->name_room }}",
                    floor_name: "{{ $room->floor->num_floor ?? 'N/A' }}"
                },
                @endforeach
            ];

            // Room search functionality
            if (roomSearch) {
                roomSearch.addEventListener('input', function () {
                    fieldInteractions.room_search = true;
                    const query = this.value.toLowerCase();
                    roomResults.innerHTML = '';

                    if (query.length < 1) {
                        roomResults.classList.add('hidden');
                        return;
                    }

                    const filteredRooms = availableRooms.filter(room =>
                        room.name.toLowerCase().includes(query) ||
                        room.floor_name.toLowerCase().includes(query)
                    );

                    if (filteredRooms.length > 0) {
                        filteredRooms.forEach(room => {
                            const option = document.createElement('div');
                            option.className = 'p-2 hover:bg-gray-100 cursor-pointer';
                            option.innerHTML = `
                        <p class="font-medium">${room.name}</p>
                        <p class="text-xs text-gray-500">${room.floor_name}</p>
                    `;
                            option.addEventListener('click', function () {
                                idRoomInput.value = room.id;
                                idFloorInput.value = room.floor_id;
                                selectedRoomName.textContent = room.name;
                                selectedFloorName.textContent = `${room.floor_name}`;
                                selectedRoomInfo.classList.remove('hidden');
                                roomSearch.value = room.name;
                                roomResults.classList.add('hidden');
                                fieldInteractions.room_search = true;
                                validateForm();
                            });
                            roomResults.appendChild(option);
                        });
                        roomResults.classList.remove('hidden');
                    } else {
                        roomResults.classList.add('hidden');
                    }
                    validateForm();
                });

                roomSearch.addEventListener('focus', function () {
                    fieldInteractions.room_search = true;
                    if (this.value === '') {
                        this.dispatchEvent(new Event('input'));
                    }
                    validateForm();
                });

                document.addEventListener('click', function (e) {
                    if (!roomSearch.contains(e.target) && !roomResults.contains(e.target)) {
                        roomResults.classList.add('hidden');
                    }
                });
            }

            // Set up field interactions and validation
            form.querySelectorAll('input, select').forEach(field => {
                field.addEventListener('input', function () {
                    fieldInteractions[this.id] = true;
                    validateForm();
                });

                field.addEventListener('change', function () {
                    fieldInteractions[this.id] = true;
                    validateForm();
                });

                // Validate on blur (when leaving field)
                field.addEventListener('blur', function () {
                    if (this.value.trim() === '') {
                        fieldInteractions[this.id] = true;
                        validateForm();
                    }
                });
            });

            // Date validation
            if (dateStart && dateEnd) {
                dateStart.addEventListener('change', function () {
                    fieldInteractions.date_start = true;
                    validateForm();
                });

                dateEnd.addEventListener('change', function () {
                    fieldInteractions.date_end = true;
                    validateForm();
                });
            }

            function validateForm() {
                let isValid = true;

                // Validate each required field
                form.querySelectorAll('[required]').forEach(field => {
                    const errorElement = document.getElementById(`${field.id}-error`);

                    if (fieldInteractions[field.id] || field.value.trim()) {
                        if (!field.value.trim()) {
                            isValid = false;
                            if (errorElement) errorElement.classList.remove('hidden');
                        } else {
                            if (errorElement) errorElement.classList.add('hidden');
                        }
                    }
                });

                // Special validation for room selection
                if (fieldInteractions.room_search || idRoomInput.value) {
                    if (!idRoomInput.value) {
                        isValid = false;
                        document.getElementById('room-error').classList.remove('hidden');
                    } else {
                        document.getElementById('room-error').classList.add('hidden');
                    }
                }

                // Validate date range
                if (dateStart && dateEnd && (dateStart.value || dateEnd.value)) {
                    if (dateStart.value && dateEnd.value) {
                        const startDate = new Date(dateStart.value);
                        const endDate = new Date(dateEnd.value);

                        if (endDate < startDate) {
                            isValid = false;
                            document.getElementById('date_end-error').textContent =
                                'Tanggal selesai harus setelah tanggal mulai';
                            document.getElementById('date_end-error').classList.remove('hidden');
                        } else {
                            document.getElementById('date_end-error').classList.add('hidden');
                        }
                    }
                }

                // Enable/disable submit button based on validation
                submitButton.disabled = !isValid;

                // Visual feedback for button
                if (isValid) {
                    submitButton.classList.remove('opacity-50', 'cursor-not-allowed');
                    submitButton.classList.add('hover:bg-[#017B48]', 'hover:text-white');
                } else {
                    submitButton.classList.add('opacity-50', 'cursor-not-allowed');
                    submitButton.classList.remove('hover:bg-[#017B48]', 'hover:text-white');
                }
            }

            // Initial validation (disable button by default)
            submitButton.disabled = true;
            submitButton.classList.add('opacity-50', 'cursor-not-allowed');
            submitButton.classList.remove('hover:bg-[#017B48]', 'hover:text-white');
        });
    </script>
</x-app-layout>
