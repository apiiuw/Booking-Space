<footer class="relative z-40 bg-black">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
          <div class="mb-6 md:mb-0">
              <a href="{{ route('beranda') }}" class="flex flex-col items-start gap-y-5">
                  <img src="{{ asset('img/icon/Logo-FIK.png') }}" class="h-10 me-3" alt="FlowBite Logo" />
                  <img src="{{ asset('img/icon/BookingSpace.png') }}" class="h-12 me-3" alt="FlowBite Logo" />
              </a>
          </div>
          <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
              <div>
                  <h2 class="mb-6 text-sm font-bold text-orange-600 uppercase">Beranda</h2>
                  <ul class="text-white font-medium">
                      <li class="mb-4">
                          <a href="{{ route('beranda') }}#tentang-kami" class="hover:underline"><span class="text-orange-600 font-bold">⟓</span> Tentang Kami</a>
                      </li>
                      <li>
                          <a href="{{ route('beranda') }}#visi-misi" class="hover:underline"><span class="text-orange-600 font-bold">⟓</span> Visi Misi</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-bold text-orange-600 uppercase">Peminjaman Ruangan</h2>
                  <ul class="text-white font-medium">
                      <li class="mb-4">
                          <a href="{{ route('peminjamanRuangan.tipe', ['tipe' => 'rapat']) }}" class="hover:underline"><span class="text-orange-600 font-bold">⟓</span> Ruang Rapat</a>
                      </li>
                      <li class="mb-4">
                          <a href="{{ route('peminjamanRuangan.tipe', ['tipe' => 'laboratorium-komputer']) }}" class="hover:underline"><span class="text-orange-600 font-bold">⟓</span> Lab Komputer</a>
                      </li>
                      <li class="mb-4">
                          <a href="{{ route('peminjamanRuangan.tipe', ['tipe' => 'sidang']) }}" class="hover:underline"><span class="text-orange-600 font-bold">⟓</span> Ruang Sidang</a>
                      </li>
                      <li>
                          <a href="{{ route('peminjamanRuangan.tipe', ['tipe' => 'aula']) }}" class="hover:underline"><span class="text-orange-600 font-bold">⟓</span> Ruang Aula</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-bold text-orange-600 uppercase">Panduan</h2>
                  <ul class="text-white font-medium">
                      <li class="mb-4">
                          <a href="{{ route('panduan') }}" class="hover:underline "><span class="text-orange-600 font-bold">⟓</span> Syarat dan Ketentuan</a>
                      </li>
                      <li>
                          <a href="{{ route('panduan') }}" class="hover:underline"><span class="text-orange-600 font-bold">⟓</span> Alur Peminjaman</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-bold text-orange-600 uppercase">Kontak</h2>
                  <ul class="text-white font-medium">
                      <li class="mb-4">
                          <a href="https://instagram.com/fikupnvj" target="_blank" class="hover:underline"><span class="text-orange-600 font-bold">⟓</span> Instagram</a>
                      </li>
                      <li class="mb-4">
                          <a href="https://x.com/UPNVJ" target="_blank" class="hover:underline"><span class="text-orange-600 font-bold">⟓</span> X / Twitter</a>
                      </li>
                      <li class="mb-4">
                          <a href="https://youtube.com/@fikupnvj" target="_blank" class="hover:underline"><span class="text-orange-600 font-bold">⟓</span> YouTube</a>
                      </li>
                      <li>
                          <a href="https://new-fik.upnvj.ac.id/" target="_blank" class="hover:underline"><span class="text-orange-600 font-bold">⟓</span> Website</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
      <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-white sm:text-center">© {{ date('Y') }} <a href="{{ route('beranda') }}" class="hover:underline">BookingSpace™</a>. All Rights Reserved. 
          </span>
          <div class="flex mt-4 sm:justify-center sm:mt-0">
              <a href="https://instagram.com/fikupnvj" target="_blank" class="text-white hover:text-orange-600">
                <i class="fa-brands fa-instagram"></i>
              </a>
              <a href="https://x.com/UPNVJ" target="_blank" class="text-white hover:text-orange-600 ms-5">
                <i class="fa-brands fa-x-twitter"></i>
              </a>
              <a href="https://youtube.com/@fikupnvj" target="_blank" class="text-white hover:text-orange-600 ms-5">
                <i class="fa-brands fa-youtube"></i>
              </a>
              <a href="https://new-fik.upnvj.ac.id/" target="_blank" class="text-white hover:text-orange-600 ms-5">
                <i class="fa-solid fa-earth-americas"></i>
              </a>
          </div>
      </div>
    </div>
</footer>
