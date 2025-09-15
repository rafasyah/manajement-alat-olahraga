<x-app-layout><div class="max-w-md mx-auto bg-white dark:bg-gray-800 shadow rounded-lg p-6 mt-10">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">
        Edit Alat
    </h1>

    <form action="{{ route('alat.update', $alat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nomor --}}
        <div class="mb-4">
            <label for="nomor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Nomor
            </label>
            <input type="text" name="nomor" id="nomor" value="{{ old('nomor', $alat->nomor) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                          dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500"
                   required>
        </div>

        {{-- Nama Alat --}}
        <div class="mb-4">
            <label for="nama_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Nama Alat
            </label>
            <input type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang', $alat->nama_barang) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                          dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500"
                   required>
        </div>

        {{-- Status Alat --}}
        <div class="mb-4">
            <label for="status_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Status Alat
            </label>
            <select name="status_barang" id="status_barang"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                           dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    required>
                <option value="">-- Pilih Status --</option>
                <option value="tersedia" {{ old('status_barang', $alat->status_barang) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="dipinjam" {{ old('status_barang', $alat->status_barang) == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                <option value="rusak" {{ old('status_barang', $alat->status_barang) == 'rusak' ? 'selected' : '' }}>Rusak</option>
            </select>
        </div>

        {{-- Gambar Alat --}}
        <div class="mb-4">
            <label for="gambar_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Gambar Alat
            </label>
            <input type="file" name="gambar_barang" id="gambar_barang"
                   class="mt-1 block w-full text-gray-700 dark:text-gray-300 
                          file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 
                          file:text-sm file:font-medium 
                          file:bg-blue-50 file:text-blue-700 
                          hover:file:bg-blue-100
                          dark:file:bg-gray-600 dark:file:text-gray-100">

           @if ($alat->gambar_barang)
    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Gambar saat ini:</p>
    <img src="{{ asset('images/' . $alat->gambar_barang) }}" 
         alt="Gambar Alat" 
         class="mt-2 w-32 h-32 object-cover rounded">
@endif
        </div>

        {{-- Jumlah Alat --}}
        <div class="mb-4">
            <label for="jumlah_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Jumlah Alat
            </label>
            <input type="number" name="jumlah_barang" id="jumlah_barang" min="1" 
                   value="{{ old('jumlah_barang', $alat->jumlah_barang) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                          dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500"
                   required>
        </div>

        {{-- Update Button --}}
        <div class="flex justify-end">
            <button type="submit"
                class="px-5 py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 
                       focus:outline-none focus:ring-2 focus:ring-blue-500">
                Update
            </button>
        </div>
    </form>
</div>
</x-app-layout>