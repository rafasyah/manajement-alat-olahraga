<x-app-layout>
        <div class="max-w-md mx-auto bg-white dark:bg-gray-800 shadow rounded-lg p-6 mt-10">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">
        Form Barang
    </h1>

    <form action="{{ route('alat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

  
        <div class="mb-4">
            <label for="nomor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Nomor
            </label>
            <input type="text" name="nomor" id="nomor"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                          dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500"
                   required>
        </div>

     
        <div class="mb-4">
            <label for="nama_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Nama Barang
            </label>
            <input type="text" name="nama_barang" id="nama_barang"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                          dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500"
                   required>
        </div>

      
        <div class="mb-4">
            <label for="status_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Status Barang
            </label>
            <select name="status_barang" id="status_barang"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                           dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    required>
                <option value="">-- Pilih Status --</option>
                <option value="tersedia">Tersedia</option>
                <option value="dipinjam">Dipinjam</option>
                <option value="rusak">Rusak</option>
            </select>
        </div>

       
        <div class="mb-4">
            <label for="gambar_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Gambar Barang
            </label>
            <input type="file" name="gambar_barang" id="gambar_barang"
                   class="mt-1 block w-full text-gray-700 dark:text-gray-300 
                          file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 
                          file:text-sm file:font-medium 
                          file:bg-blue-50 file:text-blue-700 
                          hover:file:bg-blue-100
                          dark:file:bg-gray-600 dark:file:text-gray-100">
                          
        </div>


      
        <div class="mb-4">
            <label for="jumlah_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Jumlah Barang
            </label>
            <input type="number" name="jumlah_barang" id="jumlah_barang" min="1"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                          dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500"
                   required>
        </div>

       
        <div class="flex justify-end">
            <button type="submit"
                class="px-5 py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 
                       focus:outline-none focus:ring-2 focus:ring-blue-500">
                Submit
            </button>
        </div>
    </form>
</div>
</x-app-layout>