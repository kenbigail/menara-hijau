<x-app-layout>
    <div class="w-screen bg-slate-50 flex flex-col justify-center items-center">
        <div class="max-w-7xl mx-auto w-full flex justify-between items-center mt-16 max-xl:px-5">
            <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-2xl">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Edit User</h2>

                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">New Password (Optional)</label>
                        <input type="password" name="password"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Role</label>
                        <select name="role" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="superAdmin" {{ $user->role == 'superAdmin' ? 'selected' : '' }}>SuperAdmin</option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('users.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded-lg mr-2">
                            Cancel
                        </a>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
m
