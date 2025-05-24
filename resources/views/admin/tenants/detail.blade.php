<x-app-layout>
    <div class="w-screen h-auto bg-slate-50 flex flex-col items-center py-20">
        <div class="w-full max-w-7xl mx-auto flex flex-col justify-between items-start">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Tenant Details</h2>
            <div class="bg-white shadow-md rounded-lg p-6 w-full">
                <!-- Basic Information Section -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Basic Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Column 1 -->
                        <div class="space-y-4">
                            <!-- Tenant Name -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Tenant Name</label>
                                <p class="text-gray-900">{{ $tenant->name_tenant }}</p>
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Email</label>
                                <p class="text-gray-900">{{ $tenant->email }}</p>
                            </div>
                        </div>

                        <!-- Column 2 -->
                        <div class="space-y-4">
                            <!-- Phone -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                                <p class="text-gray-900">{{ $tenant->phone }}</p>
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Status</label>
                                <span class="px-3 py-1 border 
                                    {{ $tenant->status == 'ongoing' ? 'border-green-500 text-green-500' : '' }}
                                    {{ $tenant->status == 'waiting' ? 'border-gray-500 text-gray-500' : '' }}
                                    {{ $tenant->status == 'finished' ? 'border-red-500 text-red-500' : '' }}
                                    rounded-lg">
                                    {{ ucfirst($tenant->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Location Information Section -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Location Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Column 1 -->
                        <div class="space-y-4">
                            <!-- Room -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Room</label>
                                <p class="text-gray-900">{{ $tenant->room->name_room }}</p>
                            </div>
                        </div>

                        <!-- Column 2 -->
                        <div class="space-y-4">
                            <!-- Floor -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Floor</label>
                                <p class="text-gray-900">{{ $tenant->floor->num_floor }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rental Period Section -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Rental Period</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Column 1 -->
                        <div class="space-y-4">
                            <!-- Start Date -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Start Date</label>
                                <p class="text-gray-900">{{ \Carbon\Carbon::parse($tenant->date_start)->format('d M Y') }}</p>
                            </div>
                        </div>

                        <!-- Column 2 -->
                        <div class="space-y-4">
                            <!-- End Date -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">End Date</label>
                                <p class="text-gray-900">{{ \Carbon\Carbon::parse($tenant->date_end)->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Information Section -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">System Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Column 1 -->
                        <div class="space-y-4">
                            <!-- Created At -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Created At</label>
                                <p class="text-gray-900">{{ $tenant->created_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>

                        <!-- Column 2 -->
                        <div class="space-y-4">
                            <!-- Updated At -->
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Last Updated</label>
                                <p class="text-gray-900">{{ $tenant->updated_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="flex justify-end mt-8">
                    <a href="{{ route('tenants.index') }}" class="px-4 py-2 bg-[#017B48] text-white rounded-lg hover:bg-[#016138] transition duration-300">
                        Back to Tenants
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
