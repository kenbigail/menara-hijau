<x-app-layout>
    <div class="w-screen h-auto bg-slate-50 flex flex-col items-center py-20">
        <div class="w-full max-w-7xl mx-auto flex flex-col justify-between items-start">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Edit Admin</h2>
            <div class="bg-white shadow-md rounded-lg p-6 w-full">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Nama Admin</label>
                        <input type="text" name="name" value="{{ $user->name }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Akun Email</label>
                        <input type="email" name="email" value="{{ $user->email }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Password (Optional)</label>
                        <input type="password" name="password"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Role</label>
                        <select name="role" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="superAdmin" {{ $user->role == 'superAdmin' ? 'selected' : '' }}>SuperAdmin</option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('users.index') }}" class="px-4 py-2 bg-red-500 text-white rounded-lg mr-2 hover:bg-red-600 transition duration-300">
                            Cancel
                        </a>
                        <button type="submit" class="px-4 py-2 bg-[#EBF4F0] text-[#017B48] rounded-lg hover:bg-[#017B48] hover:text-[#EBF4F0] transition duration-300">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
