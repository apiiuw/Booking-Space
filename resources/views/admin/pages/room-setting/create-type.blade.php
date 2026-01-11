@extends('admin.layouts.main')

@section('container')
<div class="p-4 sm:ml-64 min-h-screen flex justify-center items-center">
    <div class="p-6 border-gray-200 bg-white rounded-md w-3xl">

        <h2 class="text-orange-600 font-bold text-2xl mb-4">
            Tambah Tipe Ruangan
        </h2>

        <form action="{{ route('room.setting.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-gray-800">Nama Tipe Ruangan</label>
                <input type="text" name="type"
                       class="w-full text-black border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500"
                       placeholder="Tuliskan nama tipe ruangan"
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-gray-800">
                    Gambar (Opsional)
                </label>

                <input type="file"
                    name="image"
                    accept="image/*"
                    onchange="previewImage(event)"
                    class="w-full text-sm text-gray-500">

                {{-- Preview --}}
                <div class="mt-3">
                    <img id="imagePreview"
                        class="hidden w-40 h-40 object-cover rounded-md border border-gray-300"
                        alt="Preview Gambar">
                </div>
            </div>


            <div class="flex justify-end gap-2">
                <a href="{{ route('room.setting.index') }}"
                   class="px-4 py-2 bg-gray-200 rounded-md text-sm">
                    Batal
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white rounded-md text-sm">
                    Simpan
                </button>
            </div>
        </form>

    </div>
</div>
@endsection

@push('scripts')
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush

