
<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
   <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50">
      <a href="https://v3.flowbite.com/" class="flex items-center ps-2.5 mb-5">
         <img src="{{ asset('img/icon/BookingSpace.png') }}" class="h-10 me-3" alt="Flowbite Logo" />
      </a>
      <ul class="font-medium">
         <li>
            <div class="flex items-center justify-start p-2 text-gray-900 rounded-lg">
               <i class="fa-solid fa-lg fa-user text-orange-600"></i>
               <div class="ml-3 flex flex-col justify-start">
                  <h1>Admin BS</h1>
                  <p class="text-xs">Muhammad Zikry Firmansyah</p>
               </div>
            </div>
         </li>
         <hr class="bg-orange-300 h-0.5">
         <li class="mt-2">
            <a href="{{ route('dashboard.admin') }}"
               class="flex items-center p-2 rounded-lg group
                     {{ request()->routeIs('dashboard.admin') 
                           ? 'bg-orange-600 text-white' 
                           : 'text-gray-900 hover:bg-gray-100' }}">
               <svg class="w-5 h-5 transition duration-75
                           {{ request()->routeIs('dashboard.admin') 
                                 ? 'text-white' 
                                 : 'text-gray-500 group-hover:text-gray-900' }}"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg>
               <span class="ms-3">Dasbor Admin</span>
            </a>

         </li>
         <li class="mt-2">
            <a href="{{ route('room.availability.index') }}"
               class="flex items-center p-2 rounded-lg group
                     {{ request()->routeIs('room.availability*') 
                           ? 'bg-orange-600 text-white' 
                           : 'text-gray-900 hover:bg-gray-100' }}">
               <svg class="shrink-0 w-5 h-5 transition duration-75
                           {{ request()->routeIs('room.availability*') 
                                 ? 'text-white' 
                                 : 'text-gray-500 group-hover:text-gray-900' }}"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                     <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Ketersediaan Ruangan</span>
            </a>
         </li>
         <li class="mt-2">
            <a href="{{ route('loan.request.index') }}"
               class="flex items-center p-2 rounded-lg group
                     {{ request()->routeIs('loan.request*') 
                           ? 'bg-orange-600 text-white' 
                           : 'text-gray-900 hover:bg-gray-100' }}">
               <svg class="shrink-0 w-5 h-5 transition duration-75
                           {{ request()->routeIs('loan.request*') 
                                 ? 'text-white' 
                                 : 'text-gray-500 group-hover:text-gray-900' }}"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                     <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Permintaan Peminjaman</span>
            </a>
         </li>
         <li class="mt-2">
            <a href="{{ route('loan.history.index') }}"
               class="flex items-center p-2 rounded-lg group
                     {{ request()->routeIs('loan.history*') 
                           ? 'bg-orange-600 text-white' 
                           : 'text-gray-900 hover:bg-gray-100' }}">
               <svg class="shrink-0 w-5 h-5 transition duration-75
                           {{ request()->routeIs('loan.history*') 
                                 ? 'text-white' 
                                 : 'text-gray-500 group-hover:text-gray-900' }}" 
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 640 640">
                     <path d="M320 128C426 128 512 214 512 320C512 426 426 512 320 512C254.8 512 197.1 479.5 162.4 429.7C152.3 415.2 132.3 411.7 117.8 421.8C103.3 431.9 99.8 451.9 109.9 466.4C156.1 532.6 233 576 320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C234.3 64 158.5 106.1 112 170.7L112 144C112 126.3 97.7 112 80 112C62.3 112 48 126.3 48 144L48 256C48 273.7 62.3 288 80 288L104.6 288C105.1 288 105.6 288 106.1 288L192.1 288C209.8 288 224.1 273.7 224.1 256C224.1 238.3 209.8 224 192.1 224L153.8 224C186.9 166.6 249 128 320 128zM344 216C344 202.7 333.3 192 320 192C306.7 192 296 202.7 296 216L296 320C296 326.4 298.5 332.5 303 337L375 409C384.4 418.4 399.6 418.4 408.9 409C418.2 399.6 418.3 384.4 408.9 375.1L343.9 310.1L343.9 216z"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Riwayat Peminjaman</span>
            </a>
         </li>
         <!-- Hide sementara -->
         <li class="mt-2">
            <a href="{{ route('room.setting.index') }}"
               class="flex items-center p-2 rounded-lg group
                     {{ request()->routeIs('room.setting*') 
                           ? 'bg-orange-600 text-white' 
                           : 'text-gray-900 hover:bg-gray-100' }}">
               <i class="fa-solid fa-door-closed fa-lg
                           {{ request()->routeIs('room.setting*') ? 'text-white' : 'text-gray-500 group-hover:text-gray-900' }}"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Pengaturan Ruangan</span>
            </a>
         </li>
         <li class="mt-2">
            <form action="{{ route('logout') }}" method="POST">
               @csrf

               <button
                  type="submit"
                  class="w-full flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
               >
                  <svg
                        class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 18 16"
                  >
                        <path
                           stroke="currentColor"
                           stroke-linecap="round"
                           stroke-linejoin="round"
                           stroke-width="2"
                           d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"
                        />
                  </svg>

                  <span class="flex-1 ms-3 whitespace-nowrap text-left">
                        Logout
                  </span>
               </button>
            </form>

         </li>
      </ul>
   </div>
</aside>
