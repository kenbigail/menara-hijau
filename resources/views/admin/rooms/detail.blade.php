<x-app-layout>
    <div class="w-screen h-auto bg-slate-50 flex flex-col items-center py-20">
        <div class="w-full max-w-7xl mx-auto flex flex-col justify-between items-start">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Room Details</h2>
            <div class="bg-white shadow-md rounded-lg p-6 w-full">
                <!-- Basic Information Section -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Basic Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Column 1 -->
                        <div class="space-y-4">
                            <!-- Room Name -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Room Name</label>
                                <p class="text-gray-900">{{ $room->name_room }}</p>
                            </div>

                            <!-- Floor -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Floor</label>
                                <p class="text-gray-900">{{ $room->floor->num_floor }}</p>
                            </div>
                        </div>

                        <!-- Column 2 -->
                        <div class="space-y-4">
                            <!-- Category -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Category</label>
                                <p class="text-gray-900">{{ ucfirst($room->categories) }}</p>
                            </div>

                            <!-- Availability -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Availability</label>
                                <span class="px-3 py-1 border 
                                    {{ $room->availability == 'available' ? 'border-green-500 text-green-500' : 'border-red-500 text-red-500' }}
                                    rounded-lg">
                                    {{ ucfirst($room->availability) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Facilities Section -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Facilities</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Column 1 -->
                        <div class="space-y-4">
                            <!-- Facilities List -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Facilities</label>
                                <p class="text-gray-900">
                                    @if(is_array($room->facilities))
                                        {{ implode(', ', $room->facilities) }}
                                    @else
                                        {{ $room->facilities }}
                                    @endif
                                </p>
                            </div>

                            <!-- Size -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Size</label>
                                <p class="text-gray-900">{{ $room->size }}</p>
                            </div>
                        </div>

                        <!-- Column 2 -->
                        <div class="space-y-4">
                            <!-- Contact -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Contact</label>
                                <p class="text-gray-900">{{ $room->contact }}</p>
                            </div>

                            <!-- Corner -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Corner</label>
                                <p class="text-gray-900">{{ ucfirst($room->corner) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Location Information -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Location Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Column 1 -->
                        <div class="space-y-4">
                            <!-- Grid Column -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Grid Column</label>
                                <p class="text-gray-900">{{ $room->grid_col }}</p>
                            </div>
                        </div>

                        <!-- Column 2 -->
                        <div class="space-y-4">
                            <!-- Grid Row -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Grid Row</label>
                                <p class="text-gray-900">{{ $room->grid_row }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Information -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">System Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Column 1 -->
                        <div class="space-y-4">
                            <!-- Created At -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Created At</label>
                                <p class="text-gray-900">{{ $room->created_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>

                        <!-- Column 2 -->
                        <div class="space-y-4">
                            <!-- Updated At -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Last Updated</label>
                                <p class="text-gray-900">{{ $room->updated_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="flex justify-end mt-8">
                    <a href="{{ route('rooms.index') }}" class="px-4 py-2 bg-[#017B48] text-white rounded-lg hover:bg-[#016138] transition duration-300">
                        Back to Rooms
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
