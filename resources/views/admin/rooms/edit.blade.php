<x-app-layout>
    <div class="w-screen h-auto bg-slate-50 flex flex-col items-center py-20">
        <div class="w-full max-w-7xl mx-auto flex flex-col justify-between items-start">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Edit Room</h2>
            <div class="bg-white shadow-md rounded-lg p-6 w-full">
                <form action="{{ route('rooms.update', $room->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Room Name -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Room Name</label>
                        <input type="text" name="name_room" value="{{ $room->name_room }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <!-- Floor Dropdown -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Floor</label>
                        <select name="id_floor" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
                            @foreach($floors as $floor)
                                <option value="{{ $floor->id }}" {{ $room->id_floor == $floor->id ? 'selected' : '' }}>
                                    {{ $floor->num_floor }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Category Dropdown -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Category</label>
                        <select name="categories" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
                            <option value="ballroom" {{ $room->categories == 'ballroom' ? 'selected' : '' }}>Ballroom</option>
                            <option value="office room" {{ $room->categories == 'office room' ? 'selected' : '' }}>Office Room</option>
                            <option value="working space" {{ $room->categories == 'working space' ? 'selected' : '' }}>Working Space</option>
                        </select>
                    </div>

                    <!-- Availability Dropdown -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Availability</label>
                        <select name="availability" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
                            <option value="available" {{ $room->availability == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="unavailable" {{ $room->availability == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                        </select>
                    </div>

                    <!-- Facilities -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Facilities</label>
                        <textarea name="facilities" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                            {{ is_array($room->facilities) ? implode(', ', $room->facilities) : $room->facilities }}
                        </textarea>
                    </div>

                    <!-- Contact -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Contact</label>
                        <input type="text" name="contact" value="{{ $room->contact }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                    </div>

                    <!-- Size -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Size</label>
                        <input type="text" name="size" value="{{ $room->size }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                    </div>

                    <!-- Corner Dropdown -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Corner</label>
                        <select name="corner" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                            <option value="south" {{ $room->corner == 'south' ? 'selected' : '' }}>South</option>
                            <option value="north" {{ $room->corner == 'north' ? 'selected' : '' }}>North</option>
                            <option value="east" {{ $room->corner == 'east' ? 'selected' : '' }}>East</option>
                            <option value="west" {{ $room->corner == 'west' ? 'selected' : '' }}>West</option>
                        </select>
                    </div>

                    <!-- Grid Column -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Grid Column</label>
                        <input type="text" name="grid_col" value="{{ $room->grid_col }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                    </div>

                    <!-- Grid Row -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Grid Row</label>
                        <input type="text" name="grid_row" value="{{ $room->grid_row }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end">
                        <a href="{{ route('rooms.index') }}" class="px-4 py-2 bg-red-500 text-white rounded-lg mr-2 hover:bg-red-600 transition duration-300">
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
</x-app-layout>
