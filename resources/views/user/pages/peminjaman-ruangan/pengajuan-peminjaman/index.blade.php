@extends('user.layouts.main')
@section('container')

<div class="relative min-h-screen bg-slate-50 pb-24 overflow-hidden font-raleway">
    <!-- Decorative Glowing Mesh Background Blobs -->
    <div class="absolute top-[-5%] right-[-5%] w-[45rem] h-[45rem] bg-gradient-to-br from-orange-200/30 to-amber-150/20 rounded-full blur-3xl -z-10 animate-pulse" style="animation-duration: 8s;"></div>
    <div class="absolute bottom-[10%] left-[-10%] w-[35rem] h-[35rem] bg-gradient-to-tr from-orange-100/20 to-amber-100/30 rounded-full blur-3xl -z-10"></div>

    <!-- Hero Banner with Glassmorphism Title & Back Button -->
    <div class="relative flex justify-start items-center px-6 md:px-20 pt-36 bg-cover bg-center h-[42vh] md:h-[48vh] shadow-lg rounded-b-[40px] overflow-hidden" 
        style="background-image: url('{{ asset('img/background/bg-visi-misi.png') }}');">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/85 via-slate-900/60 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-50 via-transparent to-transparent"></div>

        <a href="{{ route('peminjamanRuangan.detail', ['tipe' => $tipe, 'ruangan' => $ruangan]) }}" 
            class="absolute top-8 left-6 md:left-20 flex items-center bg-white/95 hover:bg-white active:scale-95 text-slate-800 backdrop-blur-md border border-slate-200/50 rounded-2xl py-2.5 px-4.5 transition duration-300 shadow-md hover:shadow-lg text-xs font-bold z-20">
            <i class="fa-solid fa-arrow-left mr-2 text-orange-600"></i>
            Kembali
        </a>

        <div class="relative z-10 bg-white/90 backdrop-blur-xl border border-white/60 p-6 md:p-8 rounded-3xl shadow-[0_20px_50px_rgba(249,115,22,0.15)] max-w-2xl mt-8 md:mt-0">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-extrabold bg-orange-50 text-orange-600 border border-orange-100 uppercase tracking-widest mb-3">
                Form Pengisian
            </span>
            <h1 class="font-black text-3xl md:text-4xl text-slate-800 leading-tight tracking-tight">
                Pengajuan Peminjaman
            </h1>
            <p class="text-slate-600 text-xs md:text-sm mt-2 font-bold flex items-center gap-2">
                <i class="fa-solid fa-circle-info text-orange-500"></i>
                Ruang {{ ucwords(str_replace('-', ' ', $tipe)) }} {{ $ruangan }} &bull; {{ $tanggal->translatedFormat('l, j F Y') }}
            </p>
        </div>
    </div>

    <!-- Main Content Split Grid -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8 mt-12 relative">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            
            <!-- Left Column: Schedule (Timeline) -->
            <div class="lg:col-span-5 bg-white rounded-[32px] border border-slate-100 p-6 md:p-8 shadow-[0_8px_30px_rgb(0,0,0,0.02)]">
                <div class="border-b border-slate-200/60 pb-4 mb-6">
                    <span class="text-orange-600 font-extrabold text-xs uppercase tracking-widest">Agenda Terjadwal</span>
                    <h2 class="text-slate-800 text-lg font-black flex items-center mt-1">
                        <i class="fa-regular fa-calendar-check text-orange-600 mr-2.5"></i>
                        Jadwal Terisi Hari Ini
                    </h2>
                    <p class="text-xs text-slate-500 mt-2">Gunakan jadwal ini sebagai referensi agar waktu tidak bentrok.</p>
                </div>

                <div class="relative pl-6 border-l-2 border-orange-100 space-y-8 ml-3">
                    @if ($jadwalPeminjaman->isEmpty())
                        <div class="py-12 text-center">
                            <div class="w-14 h-14 bg-orange-55 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-orange-100 shadow-inner">
                                <i class="fa-regular fa-calendar text-orange-500 text-xl"></i>
                            </div>
                            <p class="text-slate-700 text-sm font-bold">Belum ada peminjaman</p>
                            <p class="text-xs text-slate-400 mt-2">Seluruh slot waktu masih tersedia untuk Anda ajukan.</p>
                        </div>
                    @else
                        @foreach ($jadwalPeminjaman as $jadwal)
                            <div class="relative">
                                <!-- Marker dot -->
                                <span class="absolute -left-[32px] top-1.5 flex items-center justify-center w-4 h-4 bg-orange-500 rounded-full ring-4 ring-orange-50 shadow-md animate-pulse"></span>
                                
                                <div class="flex items-center justify-between gap-2">
                                    <span class="inline-flex items-center text-[10px] font-extrabold px-3 py-1 rounded-full bg-orange-50 text-orange-700 border border-orange-100 uppercase tracking-wider">
                                        {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->waktu_selesai)->format('H:i') }}
                                    </span>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-extrabold bg-slate-50 text-slate-600 border border-slate-200 uppercase tracking-wider">
                                        {{ $jadwal->status }}
                                    </span>
                                </div>

                                <h3 class="mt-3 text-sm font-bold text-slate-800 leading-snug">{{ $jadwal->keperluan }}</h3>
                                
                                <!-- Modern Card Details for booking -->
                                <div class="mt-3 bg-slate-50/60 border border-slate-100 rounded-2xl p-4 space-y-2.5 text-xs text-slate-600">
                                    <div class="flex justify-between items-center py-0.5 border-b border-slate-100/50">
                                        <span class="text-slate-400 font-medium">Peminjam</span>
                                        <span class="font-bold text-slate-800">{{ $jadwal->nama_penanggung_jawab }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-0.5 border-b border-slate-100/50">
                                        <span class="text-slate-400 font-medium">NIP/NIK/NIM</span>
                                        <span class="font-bold text-slate-700">{{ $jadwal->nik_penanggung_jawab }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-0.5">
                                        <span class="text-slate-400 font-medium">Instansi</span>
                                        <span class="font-bold text-slate-700">{{ $jadwal->instansi }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Right Column: Booking Form -->
            <div class="lg:col-span-7 bg-white rounded-[32px] border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.02)] overflow-hidden">
                <div class="bg-gradient-to-r from-orange-50 to-orange-50/20 px-6 py-5 border-b border-orange-100/50">
                    <span class="text-orange-600 font-extrabold text-xs uppercase tracking-widest">Pengisian Data</span>
                    <h2 class="text-orange-600 text-lg font-black flex items-center mt-1">
                        <i class="fa-regular fa-paper-plane mr-2.5 text-orange-500"></i>
                        Form Pengajuan Peminjaman
                    </h2>
                    <p class="text-slate-500 text-xs mt-1">Lengkapi informasi di bawah ini secara lengkap dan benar.</p>
                    <div class="mt-4">
                        <a href="{{ asset('pdf/template-form-peminjaman/Surat Permohonan Peminjaman Ruangan.pdf') }}" download class="inline-flex items-center text-xs font-bold bg-white text-orange-600 border border-orange-200 hover:bg-orange-50 px-3 py-2 rounded-lg transition">
                            <i class="fa-solid fa-download mr-2"></i> Download Template Form Peminjaman
                        </a>
                    </div>
                </div>

                <form action="{{ route('peminjamanRuangan.pengajuan-peminjaman.store', ['tipe' => $tipe, 'ruangan' => $ruangan, 'tanggal' => $tanggal->format('d-m-Y')]) }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8 space-y-6">
                    @csrf
                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                    
                    @if ($errors->any())
                        <div class="p-4 bg-red-50 border border-red-200 rounded-2xl text-xs text-red-700 space-y-1">
                            <p class="font-bold text-red-800">Mohon perbaiki kesalahan berikut:</p>
                            <ul class="list-disc pl-4 space-y-0.5 font-medium">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- SECTION 1: Data Penanggung Jawab -->
                    <div class="space-y-4">
                        <h3 class="text-slate-800 text-sm font-extrabold border-b border-slate-100 pb-2 flex items-center uppercase tracking-wider">
                            <span class="w-1.5 h-4 bg-orange-500 rounded-full mr-2 shadow-sm shadow-orange-500/20"></span>
                            Data Penanggung Jawab
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1.5">Nama Lengkap</label>
                                <input type="text" name="nama_penanggung_jawab" value="{{ old('nama_penanggung_jawab') }}" required placeholder="Contoh: Budi Santoso, M.Kom" class="w-full text-sm p-3.5 rounded-xl border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 focus:outline-none transition-all duration-200 text-slate-800 placeholder:text-slate-400 font-medium">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1.5">NIK / NIP / NIM</label>
                                <input type="text" name="nik_penanggung_jawab" value="{{ old('nik_penanggung_jawab') }}" required placeholder="Masukkan nomor identitas resmi" class="w-full text-sm p-3.5 rounded-xl border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 focus:outline-none transition-all duration-200 text-slate-800 placeholder:text-slate-400 font-medium">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1.5">Instansi / Organisasi</label>
                                <input type="text" name="instansi" value="{{ old('instansi') }}" required placeholder="Contoh: FIK UPNVJ / Senat Mahasiswa" class="w-full text-sm p-3.5 rounded-xl border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 focus:outline-none transition-all duration-200 text-slate-800 placeholder:text-slate-400 font-medium">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1.5">Jabatan Penanggung Jawab</label>
                                <input type="text" name="jabatan" value="{{ old('jabatan') }}" required placeholder="Contoh: Dosen / Ketua Himpunan" class="w-full text-sm p-3.5 rounded-xl border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 focus:outline-none transition-all duration-200 text-slate-800 placeholder:text-slate-400 font-medium">
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 2: Detail Peminjaman -->
                    <div class="space-y-4 pt-4 border-t border-slate-100">
                        <h3 class="text-slate-800 text-sm font-extrabold border-b border-slate-100 pb-2 flex items-center uppercase tracking-wider">
                            <span class="w-1.5 h-4 bg-orange-500 rounded-full mr-2 shadow-sm shadow-orange-500/20"></span>
                            Detail Peminjaman Ruang
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Tipe Ruangan -->
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1.5">Tipe Ruangan</label>
                                <input type="text" value="{{ ucwords(str_replace('-', ' ', $tipe)) }}" readonly class="w-full text-sm p-3.5 bg-slate-50 border border-slate-200 text-slate-500 rounded-xl cursor-not-allowed font-semibold">
                                <input type="hidden" name="tipe_ruangan" value="{{ ucwords(str_replace('-', ' ', $tipe)) }}">
                            </div>

                            <!-- Ruangan -->
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1.5">Ruangan</label>
                                <input type="text" value="{{ ucwords(str_replace('-', ' ', $tipe)) }} {{ $ruangan }}" readonly class="w-full text-sm p-3.5 bg-slate-50 border border-slate-200 text-slate-500 rounded-xl cursor-not-allowed font-semibold">
                                <input type="hidden" name="ruangan" value="{{ ucwords(str_replace('-', ' ', $tipe)) }} {{ $ruangan }}">
                            </div>

                            <!-- Tanggal Peminjaman -->
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1.5">Tanggal Peminjaman</label>
                                <input type="text" value="{{ $tanggal->translatedFormat('l, j F Y') }}" readonly class="w-full text-sm p-3.5 bg-slate-50 border border-slate-200 text-slate-500 rounded-xl cursor-not-allowed font-semibold">
                                <input type="hidden" name="tanggal_peminjaman" value="{{ $tanggal->format('Y-m-d') }}">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Waktu Mulai -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1.5">Waktu Mulai</label>
                                <select name="waktu_mulai" required class="w-full text-sm p-3.5 rounded-xl border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 focus:outline-none transition-all duration-200 text-slate-800 font-semibold bg-white">
                                    <option value="" disabled selected>Pilih Jam Mulai</option>
                                    <option value="07:00">07:00</option>
                                    <option value="07:30">07:30</option>
                                    <option value="08:00">08:00</option>
                                    <option value="08:30">08:30</option>
                                    <option value="09:00">09:00</option>
                                    <option value="09:30">09:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                </select>
                                <span class="text-[10px] text-slate-400 mt-1 block font-medium">Waktu operasional: 07:00 - 17:00</span>
                            </div>

                            <!-- Waktu Selesai -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1.5">Waktu Selesai</label>
                                <select name="waktu_selesai" required class="w-full text-sm p-3.5 rounded-xl border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 focus:outline-none transition-all duration-200 text-slate-800 font-semibold bg-white">
                                    <option value="" disabled selected>Pilih Jam Selesai</option>
                                    <option value="07:00">07:00</option>
                                    <option value="07:30">07:30</option>
                                    <option value="08:00">08:00</option>
                                    <option value="08:30">08:30</option>
                                    <option value="09:00">09:00</option>
                                    <option value="09:30">09:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                </select>
                                <span class="text-[10px] text-slate-400 mt-1 block font-medium">Minimal durasi peminjaman: 1 jam</span>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Tujuan / Keperluan Peminjaman</label>
                            <textarea name="keperluan" rows="4" required class="w-full text-sm p-3.5 rounded-xl border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 focus:outline-none transition-all duration-200 text-slate-800 placeholder:text-slate-400 font-medium" placeholder="Tuliskan detail agenda / keperluan acara secara jelas..."></textarea>
                        </div>
                    </div>

                    <!-- SECTION 3: Upload Dokumen -->
                    <div class="space-y-4 pt-4 border-t border-slate-100">
                        <h3 class="text-slate-800 text-sm font-extrabold border-b border-slate-100 pb-2 flex items-center uppercase tracking-wider">
                            <span class="w-1.5 h-4 bg-orange-500 rounded-full mr-2 shadow-sm shadow-orange-500/20"></span>
                            Upload Dokumen
                        </h3>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Form Peminjaman (PDF)</label>
                            <input type="file" name="document_user" required accept="application/pdf" class="w-full text-sm p-2 rounded-xl border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 focus:outline-none transition-all duration-200 text-slate-800 bg-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
                            <span class="text-[10px] text-slate-400 mt-1 block font-medium">Unggah form peminjaman yang sudah diisi dan ditandatangani. Format: PDF, Maks: 5MB.</span>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button id="btnAjukan" type="submit" class="w-full inline-flex justify-center items-center bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white font-extrabold py-4 px-6 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed uppercase tracking-wider text-xs">
                            <i class="fa-regular fa-paper-plane mr-2"></i>
                            Ajukan Peminjaman
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    const jadwalPeminjaman = @json($jadwalPeminjaman);

    const inputMulai   = document.querySelector('[name="waktu_mulai"]');
    const inputSelesai = document.querySelector('[name="waktu_selesai"]');
    const btnSubmit    = document.getElementById('btnAjukan');

    function timeToMinutes(time) {
        if (!time) return 0;
        const [h, m] = time.split(':').map(Number);
        return h * 60 + m;
    }

    function isBentrok(mulai, selesai) {
        const mulaiMenit = timeToMinutes(mulai);
        const selesaiMenit = timeToMinutes(selesai);
        return jadwalPeminjaman.some(j => {
            const jMulaiMenit = timeToMinutes(j.waktu_mulai);
            const jSelesaiMenit = timeToMinutes(j.waktu_selesai);
            return mulaiMenit < jSelesaiMenit && selesaiMenit > jMulaiMenit;
        });
    }

    function cekValidasi() {
        const mulai   = inputMulai.value;
        const selesai = inputSelesai.value;

        if (!mulai || !selesai) return;

        const mulaiMenit   = timeToMinutes(mulai);
        const selesaiMenit = timeToMinutes(selesai);

        // ❌ Selesai harus setelah mulai
        if (selesaiMenit <= mulaiMenit) {
            Swal.fire({
                icon: 'warning',
                title: 'Waktu tidak valid',
                text: 'Waktu selesai harus setelah waktu mulai',
                confirmButtonColor: '#f97316'
            });
            btnSubmit.disabled = true;
            return;
        }

        // ❌ Minimal 1 jam
        if ((selesaiMenit - mulaiMenit) < 60) {
            Swal.fire({
                icon: 'warning',
                title: 'Durasi terlalu singkat',
                text: 'Minimal peminjaman adalah 1 jam',
                confirmButtonColor: '#f97316'
            });
            btnSubmit.disabled = true;
            return;
        }

        // ❌ Bentrok jadwal
        if (isBentrok(mulai, selesai)) {
            Swal.fire({
                icon: 'error',
                title: 'Jadwal bentrok',
                text: 'Rentang waktu tersebut sudah digunakan oleh peminjam lain',
                confirmButtonColor: '#f97316'
            });
            btnSubmit.disabled = true;
            return;
        }

        // ✅ Aman
        btnSubmit.disabled = false;
    }

    inputMulai.addEventListener('change', cekValidasi);
    inputSelesai.addEventListener('change', cekValidasi);

    // Pre-fill otomatis jika datang dari fitur "Cari Ruangan Kosong"
    const urlParams = new URLSearchParams(window.location.search);
    const qMulai = urlParams.get('mulai');
    const qSelesai = urlParams.get('selesai');
    
    if (qMulai) {
        const option = Array.from(inputMulai.options).find(opt => opt.value === qMulai);
        if(option) option.selected = true;
    }
    
    if (qSelesai) {
        const option = Array.from(inputSelesai.options).find(opt => opt.value === qSelesai);
        if(option) option.selected = true;
    }
    
    if (qMulai && qSelesai) {
        // Trigger validasi otomatis saat halaman dimuat
        setTimeout(cekValidasi, 500);
    }
</script>
@endpush
