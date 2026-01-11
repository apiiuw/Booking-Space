@extends('auth.layouts.main')
@section('container')

<div class="h-full bg-white">
    <div class="relative flex justify-center items-center bg-cover bg-center h-[100vh]" style="background-image: url('{{ asset('img/background/bg-visi-misi.png') }}');">
        <div class="absolute inset-0 bg-black opacity-20"></div>

        <div class="relative bg-white px-10 py-10 flex flex-col justify-center items-center">
            <h1 class="font-raleway font-extrabold text-2xl text-orange-600 text-center">
                Login
            </h1>
            
            <p class="text-lg text-orange-600 font-semibold mt-2 max-w-md text-center">
                Sistem Informasi Pendaftaran dan Peminjaman Ruangan Fakultas Ilmu Komputer
            </p>

            <!-- FORM LOGIN -->
            <form action="{{ route('login.process') }}" method="POST" class="mt-8 w-full max-w-md space-y-5">
                @csrf

                <!-- Input Email -->
                <div class="flex flex-col space-y-1">
                    <label for="email" class="text-sm font-semibold text-gray-700">
                        Email UPNVJ
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        class="w-full border text-gray-800 border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('email') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror"
                        placeholder="Masukkan email"
                        value="{{ old('email') }}"
                    />
                    @error('email')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Password dengan icon mata -->
                <div class="flex flex-col space-y-1">
                    <label for="password" class="text-sm font-semibold text-gray-700">
                        Password
                    </label>
                    <div class="relative">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            required
                            class="w-full border text-gray-800 border-gray-300 rounded-lg px-3 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('password') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror"
                            placeholder="Masukkan password"
                        />
                        <!-- Tombol ikon mata -->
                        <button
                            type="button"
                            id="togglePassword"
                            class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500"
                            aria-label="Tampilkan / sembunyikan password"
                        >
                            <!-- Ikon mata (SVG) -->
                            <svg id="iconEye" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pesan error umum (misal email/password salah) -->
                @if ($errors->has('login'))
                    <p class="text-xs text-red-600">{{ $errors->first('login') }}</p>
                @endif

                <div class="flex items-center gap-2 text-sm text-gray-700">
                    <input type="checkbox" name="remember">
                    <span>Remember me</span>
                </div>

                <!-- Tombol Login -->
                <button
                    type="submit"
                    class="w-full bg-orange-600 text-white font-semibold py-2 rounded-lg hover:bg-orange-700 transition"
                >
                    Login
                </button>
            </form>

        </div>


    </div>
</div>

@push('scripts')
<!-- Script Show / Hide Password -->
{{-- <script>
    const passwordInput = document.getElementById('password');
    const togglePasswordBtn = document.getElementById('togglePassword');
    const iconEye = document.getElementById('iconEye');

    togglePasswordBtn.addEventListener('click', () => {
        const isPassword = passwordInput.type === 'password';
        passwordInput.type = isPassword ? 'text' : 'password';

        // Optional: ganti sedikit bentuk ikon saat mode text/password
        if (isPassword) {
            iconEye.setAttribute('stroke-width', '2.2');
        } else {
            iconEye.setAttribute('stroke-width', '1.8');
        }
    });
</script> --}}
<script>
    // Toggle password
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput  = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
    });
</script>
@endpush

@endsection