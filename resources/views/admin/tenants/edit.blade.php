<!-- resources/views/admin/tenants/edit.blade.php -->
<x-app-layout>
    <div class="w-screen h-auto bg-slate-50 flex flex-col items-center py-20">
        <div class="w-full max-w-7xl mx-auto flex flex-col justify-between items-start">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Edit Tenant</h2>
            <div class="bg-white shadow-md rounded-lg p-6 w-full">
                <form action="{{ route('tenants.update', $tenant->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Tenant Name -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Tenant Name</label>
                        <input type="text" name="name_tenant" value="{{ $tenant->name_tenant }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Email</label>
                        <input type="email" name="email" value="{{ $tenant->email }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <!-- Phone -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Phone</label>
                        <input type="text" name="phone" value="{{ $tenant->phone }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <!-- Room Dropdown -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Room</label>
                        <select name="id_room" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}"
                                    {{ $tenant->id_room == $room->id ? 'selected' : '' }}
                                    data-floor="{{ $room->id_floor }}">
                                    {{ $room->name_room }} (Floor: {{ $room->floor->num_floor }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Floor (auto-updated based on room selection) -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Floor</label>
                        <input type="text" id="floor_display" value="{{ $tenant->floor->num_floor }}"
                            class="w-full px-4 py-2 border rounded-lg bg-gray-100" readonly>
                        <input type="hidden" name="id_floor" id="id_floor" value="{{ $tenant->id_floor }}">
                    </div>

                    <!-- Date Start -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Start Date</label>
                        <input type="date" name="date_start" value="{{ $tenant->date_start }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <!-- Date End -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">End Date</label>
                        <input type="date" name="date_end" value="{{ $tenant->date_end }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end">
                        <a href="{{ route('tenants.index') }}" class="px-4 py-2 bg-red-500 text-white rounded-lg mr-2 hover:bg-red-600 transition duration-300">
                            Cancel
                        </a>
                        <button type="submit" class="px-4 py-2 bg-[#EBF4F0] text-[#017B48] rounded-lg hover:bg-[#017B48] hover:text-[#EBF4F0] transition duration-300">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Auto-update floor when room changes
        document.querySelector('select[name="id_room"]').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const floorId = selectedOption.dataset.floor;
            const floorDisplay = selectedOption.text.match(/Floor: (\d+)/)[1];

            document.getElementById('id_floor').value = floorId;
            document.getElementById('floor_display').value = floorDisplay;
        });
    </script>
</x-app-layout>
