<!-- Mobile Toggle Button -->
<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2.5 mt-3 ms-4 text-sm text-slate-500 rounded-xl sm:hidden hover:bg-slate-100 focus:outline-none focus:ring-4 focus:ring-slate-100 z-50">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 border-r border-slate-200/60" aria-label="Sidebar">
   <div class="h-full px-4 py-6 overflow-y-auto bg-white flex flex-col justify-between">
      
      <!-- Top Section -->
      <div>
         <!-- Logo -->
         <a href="{{ route('dashboard.admin') }}" class="flex items-center ps-2 mb-6">
            <img src="{{ asset('img/icon/BookingSpace.png') }}" class="h-10 w-auto object-contain" alt="BookingSpace Logo" />
         </a>

         <!-- Profile Card -->
         <div class="flex items-center gap-3 p-3 bg-slate-50 border border-slate-100 rounded-2xl mb-6">
            <div class="w-10 h-10 bg-orange-600 text-white rounded-xl flex items-center justify-center text-sm font-bold shadow-md shadow-orange-500/10">
               <i class="fa-solid fa-user-shield"></i>
            </div>
            <div class="flex flex-col overflow-hidden">
               @auth
                  <span class="text-xs font-extrabold text-orange-600 uppercase tracking-widest leading-none mb-0.5">{{ auth()->user()->role }}</span>
                  <span class="text-xs font-black text-slate-800 truncate leading-tight">{{ auth()->user()->name }}</span>
               @endauth
            </div>
         </div>

         <!-- Navigation List -->
         <ul class="space-y-1.5">
            <!-- Dasbor Admin -->
            <li>
               <a href="{{ route('dashboard.admin') }}"
                  class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group text-xs tracking-wider uppercase font-bold
                        {{ request()->routeIs('dashboard.admin')
                              ? 'bg-orange-50 text-orange-600 border-r-4 border-orange-500 font-extrabold shadow-sm shadow-orange-500/5'
                              : 'text-slate-600 hover:bg-slate-50 hover:text-slate-850' }}">
                  <i class="fa-solid fa-chart-line text-sm w-5 transition-transform duration-200 group-hover:scale-110
                           {{ request()->routeIs('dashboard.admin') ? 'text-orange-600' : 'text-slate-400 group-hover:text-slate-600' }}"></i>
                  <span class="ms-3">Dasbor Admin</span>
               </a>
            </li>

            <!-- Ketersediaan Ruangan -->
            <li>
               <a href="{{ route('room.availability.index') }}"
                  class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group text-xs tracking-wider uppercase font-bold
                        {{ request()->routeIs('room.availability*')
                              ? 'bg-orange-50 text-orange-600 border-r-4 border-orange-500 font-extrabold shadow-sm shadow-orange-500/5'
                              : 'text-slate-600 hover:bg-slate-50 hover:text-slate-850' }}">
                  <i class="fa-solid fa-calendar-check text-sm w-5 transition-transform duration-200 group-hover:scale-110
                           {{ request()->routeIs('room.availability*') ? 'text-orange-600' : 'text-slate-400 group-hover:text-slate-600' }}"></i>
                  <span class="ms-3">Ketersediaan Ruang</span>
               </a>
            </li>

            <!-- Permintaan Peminjaman -->
            <li>
               <a href="{{ route('loan.request.index') }}"
                  class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group text-xs tracking-wider uppercase font-bold
                        {{ request()->routeIs('loan.request*')
                              ? 'bg-orange-50 text-orange-600 border-r-4 border-orange-500 font-extrabold shadow-sm shadow-orange-500/5'
                              : 'text-slate-600 hover:bg-slate-50 hover:text-slate-850' }}">
                  <i class="fa-solid fa-file-circle-question text-sm w-5 transition-transform duration-200 group-hover:scale-110
                           {{ request()->routeIs('loan.request*') ? 'text-orange-600' : 'text-slate-400 group-hover:text-slate-600' }}"></i>
                  <span class="ms-3">Permintaan Izin</span>
               </a>
            </li>

            <!-- Riwayat Peminjaman -->
            <li>
               <a href="{{ route('loan.history.index') }}"
                  class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group text-xs tracking-wider uppercase font-bold
                        {{ request()->routeIs('loan.history*')
                              ? 'bg-orange-50 text-orange-600 border-r-4 border-orange-500 font-extrabold shadow-sm shadow-orange-500/5'
                              : 'text-slate-600 hover:bg-slate-50 hover:text-slate-850' }}">
                  <i class="fa-solid fa-clock-rotate-left text-sm w-5 transition-transform duration-200 group-hover:scale-110
                           {{ request()->routeIs('loan.history*') ? 'text-orange-600' : 'text-slate-400 group-hover:text-slate-600' }}"></i>
                  <span class="ms-3">Riwayat</span>
               </a>
            </li>
         </ul>
      </div>

      <!-- Bottom Section (Logout) -->
      <div class="border-t border-slate-100 pt-4">
         <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button
               type="submit"
               class="w-full flex items-center px-4 py-3 text-xs tracking-wider uppercase font-bold text-slate-600 hover:bg-red-50 hover:text-red-600 rounded-xl transition-all duration-200 group"
            >
               <i class="fa-solid fa-arrow-right-from-bracket text-sm w-5 text-slate-400 group-hover:text-red-500 transition-colors"></i>
               <span class="ms-3 text-left">Logout</span>
            </button>
         </form>
      </div>

   </div>
</aside>
