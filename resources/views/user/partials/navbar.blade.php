<nav id="navbar" class="fixed top-0 left-0 w-full z-50 border-b-2 border-gray-500 px-2 md:px-5 transition-all duration-300 bg-white/30 backdrop-blur-sm">
  <div class="w-full flex flex-wrap items-center justify-between p-4">
    <!-- Logo kiri -->
    <a href="{{ route('beranda') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('img/icon/Logo-FIK.png') }}" class="hidden md:block h-8" alt="Logo FIK" />
      <img src="{{ asset('img/icon/BookingSpace.png') }}" class="h-8 md:h-10" alt="Booking Space" />
    </a>

    @php
        $user = Auth::user();
        $avatar = 'img/avatar/men-avatar.gif'; // default laki-laki

        if ($user && $user->jenis_kelamin === 'p') {
            $avatar = 'img/avatar/woman-avatar.gif';
        }
    @endphp

    <!-- Kanan atas: user icon + hamburger -->
    <div class="flex items-center space-x-3 md:order-2">

        @auth
            <!-- User Icon -->
            <button type="button"
                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-orange-300 hover:scale-105 transition ease-in-out duration-300"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-10 h-10 md:w-14 md:h-14 rounded-full bg-white"
                    src="{{ asset($avatar) }}"
                    alt="user photo">
            </button>

            <!-- Dropdown menu user -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm"
                id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900">
                        {{ $user->name }}
                    </span>
                    <span class="block text-sm text-gray-500 truncate">
                        {{ $user->email }}
                    </span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li><a href="{{ route('bukti.peminjaman') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bukti Peminjaman</a></li>
                    <li><a href="{{ route('riwayat.peminjaman') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Riwayat Peminjaman</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth

        @guest
            <a href="{{ route('login') }}"
              class="px-4 py-2 rounded-lg bg-orange-600 text-white text-sm font-semibold hover:bg-orange-700 transition">
                Login
            </a>
        @endguest

        <!-- Tombol Hamburger -->
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
    </div>

    <!-- Menu navigasi -->
    <div class="hidden w-full md:flex md:w-auto md:ml-auto md:mr-5" id="navbar-default">
      <ul class="font-medium flex flex-col p-2 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50
                md:flex-row md:mt-0 md:border-0 md:bg-transparent items-center transition-colors duration-300">
        
        <!-- BERANDA -->
        <li class="w-full md:w-auto">
          <a href="{{ route('beranda') }}"
            class="nav-link block w-full text-center py-3 px-4 rounded-sm
                   md:w-auto md:bg-transparent md:p-0 md:mr-5
                   {{ request()->routeIs('beranda') ? 'text-orange-600 md:font-bold' : 'text-gray-900 md:text-white hover:text-orange-600 md:font-normal' }}">
            Beranda
          </a>
        </li>

        <!-- PEMINJAMAN RUANGAN -->
        <li class="w-full md:w-auto">
          <a href="{{ route('peminjamanRuangan') }}"
            class="nav-link block w-full text-center py-3 px-4 rounded-sm
                   md:w-auto md:bg-transparent md:p-0 md:mr-5
                   {{ request()->routeIs('peminjamanRuangan*') ? 'text-orange-600 md:font-bold' : 'text-gray-900 md:text-white hover:text-orange-600 md:font-normal' }}">
            Peminjaman Ruangan
          </a>
        </li>

        <!-- PANDUAN -->
        <li class="w-full md:w-auto">
          <a href="{{ route('panduan') }}"
            class="nav-link block w-full text-center py-3 px-4 rounded-sm
                   md:w-auto md:bg-transparent md:p-0 md:mr-5
                   {{ request()->routeIs('panduan') ? 'text-orange-600 md:font-bold' : 'text-gray-900 md:text-white hover:text-orange-600 md:font-normal' }}">
            Panduan
          </a>
        </li>

        <!-- KONTAK -->
        <li class="w-full md:w-auto">
          <a href="{{ route('kontak') }}"
            class="nav-link block w-full text-center py-3 px-4 rounded-sm
                   md:w-auto md:bg-transparent md:p-0 md:mr-5
                   {{ request()->routeIs('kontak') ? 'text-orange-600 md:font-bold' : 'text-gray-900 md:text-white hover:text-orange-600 md:font-normal' }}">
            Kontak
          </a>
        </li>

      </ul>
    </div>

  </div>
</nav>

@push('scripts')
<script>
  const navbar = document.getElementById("navbar");
  const navLinks = document.querySelectorAll(".nav-link");

  function setNavbarStyle() {
    const isScrolled = window.scrollY > 5;
    const path = window.location.pathname;

    const forceDark = path.startsWith("/user");

    if (isScrolled || forceDark) {
      navbar.classList.remove("bg-white/30", "backdrop-blur-sm", "border-b-0");
      navbar.classList.add("bg-white", "shadow-md", "border-b-2", "border-gray-500");

      navLinks.forEach(link => {
        if (!link.classList.contains("text-orange-600")) {
          link.classList.remove("md:text-white");
          link.classList.add("md:text-gray-900");
        }
      });
    } else {
      navbar.classList.add("bg-white/30", "backdrop-blur-sm", "border-b-0");
      navbar.classList.remove("bg-white", "shadow-md", "border-b-2", "border-gray-500");

      navLinks.forEach(link => {
        if (!link.classList.contains("text-orange-600")) {
          link.classList.add("md:text-white");
          link.classList.remove("md:text-gray-900");
        }
      });
    }
  }

  document.addEventListener("DOMContentLoaded", setNavbarStyle);

  window.addEventListener("scroll", setNavbarStyle);
</script>
@endpush
