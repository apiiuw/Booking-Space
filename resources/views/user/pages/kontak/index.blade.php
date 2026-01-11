@extends('user.layouts.main')
@section('container')

<div class="h-full bg-white">
    <div class="relative flex justify-end items-center pr-20 pt-32 bg-cover bg-center h-[40vh]" style="background-image: url('{{ asset('img/background/bg-visi-misi.png') }}');">
        <div class="absolute inset-0 bg-black opacity-20 "></div>

        <h1 class="relative h-1/2 font-raleway font-extrabold text-4xl text-orange-600">
            Kontak
        </h1>
    </div>

    <div class="relative flex justify-center items-center px-10 md:px-20 py-16 bg-cover bg-center h-full md:h-[30rem]" 
        style="background-image: url('{{ asset('img/background/bg-tentang-kami.png') }}');">
        <div class="absolute inset-0 bg-black opacity-30"></div>
        <div class="relative flex flex-col md:flex-row w-full justify-center items-center gap-y-5 md:gap-y-0">
            <div class="w-full md:w-3/5">
                <h1 class="text-5xl font-bold"><span class="text-orange-600">S</span>ocial Media</h1>
                <div class="flex pl-2 items-center mt-3">
                    <i class="fa-brands fa-instagram fa-2xl mr-3"></i>
                    <p class="text-xl">@fikupnvj</p>
                </div>
                <div class="flex pl-2 items-center mt-3">
                    <i class="fa-brands fa-x-twitter fa-2xl mr-3"></i>
                    <p class="text-xl">@fikupnvj</p>
                </div>
                <div class="flex pl-2 items-center mt-3">
                    <i class="fa-brands fa-youtube fa-2xl mr-3"></i>
                    <p class="text-xl">@fikupnvj</p>
                </div>
                <div class="flex pl-2 items-center mt-3">
                    <i class="fa-solid fa-earth-americas fa-2xl mr-3"></i>
                    <p class="text-xl">@fikupnvj</p>
                </div>
            </div>
            <div class="w-full md:w-2/5 flex justify-center items-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.6005846208463!2d106.79238557480404!3d-6.316081993673284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ee229acb972d%3A0x2e74d2fa25f612e2!2sFaculty%20of%20Computer%20Science%20-%20Pembangunan%20Nasional%20%22Veteran%22%20Jakarta%20University!5e0!3m2!1sen!2sid!4v1762678948393!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

@endsection