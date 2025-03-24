<x-app-layout>
    <div class="w-screen h-auto bg-slate-50 flex flex-col items-center py-20">
        <div class="w-full max-w-7xl mx-auto flex flex-col justify-between items-start">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Room Details</h2>
            <div class="bg-white shadow-md rounded-lg p-6 w-full">
                <!-- Room Name -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Room Name</label>
                    <p class="text-gray-900">{{ $room->name_room }}</p>
                </div>

                <!-- Floor -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Floor</label>
                    <p class="text-gray-900">{{ $floor->num_floor }}</p>
                </div>

                <!-- Category -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Category</label>
                    <p class="text-gray-900">{{ ucfirst($room->categories) }}</p>
                </div>

                <!-- Availability -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Availability</label>
                    <p class="text-gray-900">{{ ucfirst($room->availability) }}</p>
                </div>

                <!-- Facilities -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Facilities</label>
                    <p class="text-gray-900">{{ is_array($room->facilities) ? implode(', ', $room->facilities) : $room->facilities }}</p>
                </div>

                <!-- Contact -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Contact</label>
                    <p class="text-gray-900">{{ $room->contact }}</p>
                </div>

                <!-- Size -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Size</label>
                    <p class="text-gray-900">{{ $room->size }}</p>
                </div>

                <!-- Corner -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Corner</label>
                    <p class="text-gray-900">{{ ucfirst($room->corner) }}</p>
                </div>

                <!-- Grid Column -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Grid Column</label>
                    <p class="text-gray-900">{{ $room->grid_col }}</p>
                </div>

                <!-- Grid Row -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Grid Row</label>
                    <p class="text-gray-900">{{ $room->grid_row }}</p>
                </div>

                <!-- Back Button -->
                <div class="flex justify-end">
                    <a href="{{ route('rooms.index') }}" class="px-4 py-2 bg-[#017B48] text-white rounded-lg hover:bg-[#016138] transition duration-300">
                        Back to Rooms
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
