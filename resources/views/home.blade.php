<x-app-layout>

    <div class="w-screen bg-slate-50 flex justify-center items-center">
        <div class="max-w-7xl mx-auto w-full flex justify-center items-center flex-col gap-5 max-xl:px-5 py-24 max-lg:gap-16">
            <h1 class="text-3xl text-[#646464] max-lg:text-2xl">Halo! Selamat Datang di</h1>
            <h1 class="text-9xl font-black text-black text-center max-lg:text-6xl">Booking Portal <br> <span class="text-[#017B48]">Menara Hijau</span></h1>
            <h1 class="text-3xl text-[#646464] text-center max-lg:text-2xl">Temukan berbagai macam Ruangan & Lantai <br class="max-lg:hidden"> yang dapat digunakan pada Gedung Menara Hijau!</h1>
            <a class="p-4 bg-[#017B48] text-white rounded-lg text-xl font-semibold hover:bg-[#016b3e] max-lg:text-lg" href="{{ route('available-space') }}">
                Available Space
            </a>
        </div>
    </div>

</x-app-layout>
