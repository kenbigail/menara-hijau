<x-app-layout>

    <div class="w-screen bg-slate-50 flex justify-center items-center">
        <div class="max-w-7xl mx-auto w-full flex justify-between items-center max-md:justify-center max-md:flex-col max-xl:px-5">
            <div class="flex justify-start items-start flex-col gap-5 w-1/2 max-md:w-full">
                <img class="h-7" src="images/main_logo.png" alt="">
                <h1 class="text-2xl text-gray-500">Halo! Selamat Datang di</h1>
                <h1 class="text-7xl font-bold max-md:text-6xl">Booking Portal<br><span class="text-[#017B48]">PT. Menara Hijau</span></h1>
                <h1 class="text-2xl text-gray-500">Temukan berbagai macam Ruangan & Lantai yang dapat gunakan di <strong>PT. Menara Hijau!</strong></h1>
                    <a class="px-8 text-2xl font-bold py-5 bg-[#D71E21] text-white rounded-md hover:bg-[#d71e21da] flex justify-center items-center gap-4" href="{{route('lantai.index')}}">
                        <img class="h-8" src="images/icons/book_icon.png" alt="">
                        Booking Sekarang!
                    </a>
            </div>
            <div class="h-[750px] max-md:mt-6 w-1/2 flex justify-end items-end max-md:w-full max-md:h-[500px]">
                <img class="" src="images/worker.webp" alt="">
            </div>
        </div>
    </div>

</x-app-layout>
