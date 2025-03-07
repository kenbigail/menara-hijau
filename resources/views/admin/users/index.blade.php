<x-app-layout>
    <div class="w-screen bg-slate-50 flex flex-col justify-center items-center">
        <div class="max-w-7xl mx-auto w-full flex justify-between items-center mt-16 max-xl:px-5">
            <button data-modal-target="crud-modal-create" data-modal-toggle="crud-modal-create"
                class="flex items-center gap-2 px-5 py-4 bg-[#EBF4F0] text-[#017B48] hover:bg-[#017B48] hover:text-white transition-colors font-medium text-lg rounded-lg whitespace-nowrap"
                type="button">
                <span>Tambah Administrator</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
            </button>

            <!-- Main modal -->
            <div id="crud-modal-create" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow-sm text-black">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-[#EEEEEE]">
                            <h3 class="text-lg font-medium text-black">
                                Tambah Administrator
                            </h3>
                            <button type="button"
                                class="text-[#646464] bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                data-modal-toggle="crud-modal-create">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5" method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-[#646464]">Nama
                                        Admin</label>
                                    <input type="text" name="name" id="name"
                                        class="border border-[#EEEEEE] text-[#646464] text-sm font-medium rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        placeholder="Ketik Nama Lengkap" required>
                                </div>
                                <div class="col-span-2">
                                    <label for="email" class="block mb-2 text-sm font-medium text-[#646464]">Alamat
                                        Email</label>
                                    <input type="email" name="email" id="email"
                                        class="border border-[#EEEEEE] text-[#646464] text-sm font-medium rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        placeholder="Ketik Alamat Email Lengkap" required>
                                </div>
                                <div class="col-span-2">
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-[#646464]">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="border border-[#EEEEEE] text-[#646464] text-sm font-medium rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        placeholder="Password (min.8 character)" minlength="8" required>
                                </div>
                                <div class="col-span-2">
                                    <label for="role" class="block mb-2 text-sm font-medium text-[#646464]">Role</label>
                                    <select name="role" id="role"
                                        class="border border-[#EEEEEE] text-[#646464] text-sm font-medium rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                        required>
                                        <option value="" selected disabled>Select Role</option>
                                        <option value="superAdmin">Super Administrator</option>
                                        <option value="admin">Administrator</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="text-white flex justify-end items-center bg-[#017B48] font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    Simpan Perubahan
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
            </div>
            <!-- Main modal -->
            <div id="crud-modal-edit" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow-sm text-black">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-[#EEEEEE]">
                            <h3 class="text-lg font-medium text-black">
                                Ini Edit Men
                            </h3>
                            <button type="button"
                                class="text-[#646464] bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                data-modal-toggle="crud-modal-edit">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5" method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-[#646464]">Nama
                                        Admin</label>
                                    <input type="text" name="name" id="name"
                                        class="border border-[#EEEEEE] text-[#646464] text-sm font-medium rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        placeholder="Ketik Nama Lengkap" required>
                                </div>
                                <div class="col-span-2">
                                    <label for="email" class="block mb-2 text-sm font-medium text-[#646464]">Alamat
                                        Email</label>
                                    <input type="email" name="email" id="email"
                                        class="border border-[#EEEEEE] text-[#646464] text-sm font-medium rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        placeholder="Ketik Alamat Email Lengkap" required>
                                </div>
                                <div class="col-span-2">
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-[#646464]">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="border border-[#EEEEEE] text-[#646464] text-sm font-medium rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        placeholder="Password (min.8 character)" minlength="8" required>
                                </div>
                                <div class="col-span-2">
                                    <label for="role" class="block mb-2 text-sm font-medium text-[#646464]">Role</label>
                                    <select name="role" id="role"
                                        class="border border-[#EEEEEE] text-[#646464] text-sm font-medium rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                        required>
                                        <option value="" selected disabled>Select Role</option>
                                        <option value="superAdmin">Super Administrator</option>
                                        <option value="admin">Administrator</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="text-white flex justify-end items-center bg-[#017B48] font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    Simpan Perubahan
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
            </div>
        </div>
        <div
            class="max-w-7xl mx-auto w-full flex justify-between mt-5 items-center max-md:justify-center max-md:flex-col max-xl:px-5">
            <div class="max-w-7xl mx-auto w-full flex flex-col justify-between items-center py-2 mt-5">
                <div
                    class="w-full h-auto bg-white rounded-lg border-[#eeeeee] border-2 flex justify-center items-center py-10">
                    <div class="w-[90%] h-full flex flex-col justify-start">
                        <div class="flex flex-row w-full justify-between items-center">
                            <p class="font-medium text-2xl">List Administrator</p>
                            {{-- Dropdown Button --}}
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                class="bg-[#EBF4F0] text-black border focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 text-center inline-flex items-center"
                                type="button">
                                <span class="mr-5 text-[#017B48]">{{ ucfirst($role) }}</span>
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>

                            {{-- Dropdown Selection --}}
                            <div id="dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-200 rounded-lg shadow-sm w-44 max-h-48 overflow-y-auto">
                                <ul class="py-2 text-lg text-gray-700" aria-labelledby="dropdownDefaultButton">
                                    @foreach($roles as $r)
                                    <li>
                                        <a href="{{ route('users.index', ['role' => strtolower($r) === 'all' ? null : strtolower($r)]) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 text-center 
                {{ strtolower($role) === strtolower($r) ? 'bg-gray-200 font-bold' : '' }}">
                                            {{ $r }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                        {{-- Separator Line --}}
                        <div class="mt-10 h-[1.5px] w-full bg-[#EEEEEE]"></div>

                        {{-- Table Section --}}
                        <div class="w-full grid grid-cols-1 py-5 max-lg:px-5 max-lg:border-0 gap-5">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full border-collapse border border-gray-200">
                                    <thead>
                                        <tr class="bg-[#017B48] text-white text-left text-xl">
                                            <th class="p-4 border">Nama</th>
                                            <th class="p-4 border">Alamat Email</th>
                                            <th class="p-4 border">Role</th>
                                            <th class="p-4 border">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-700 text-lg">
                                        @foreach ($users as $item)
                                        <tr class="border-b">
                                            <td class="p-4 border">{{ $item->name }}</td>
                                            <td class="p-4 border">{{ $item->email }}</td>
                                            <td class="p-4 border text-center">
                                                <span class="px-3 py-1 border 
                                                    {{ $item->role == 'superAdmin' ? 'border-green-500 text-green-500' : '' }}
                                                    {{ $item->role == 'admin' ? 'border-yellow-400 text-yellow-500' : '' }}
                                                    rounded-lg">
                                                    {{ ucfirst($item->role) }}
                                                </span>
                                            </td>
                                            <td class="p-4 border text-center space-x-2">
                                                <!-- Tombol Edit -->
                                                <a href="{{ route('users.edit', $item->id) }}"
                                                    class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-[#EBF4F0] text-[#017B48] hover:bg-[#017B48] hover:text-white transition">
                                                    Edit
                                                </a>

                                                <!-- Tombol Delete -->
                                                <form action="{{ route('users.destroy', $item->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                                        Delete
                                                    </button>
                                                </form>

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
    </div>
</x-app-layout>
