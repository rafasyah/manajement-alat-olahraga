<!DOCTYPE html>
<html lang="en" class="dark"> <!-- ✅ Enable dark mode by default -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-900 text-white py-10">

    <div class="max-w-md mx-auto bg-gray-800 shadow rounded-lg p-6 mt-10">
        <h1 class="text-2xl font-bold text-gray-100 mb-6">
            Form Peminjaman Barang
        </h1>

        <form action="{{ route('form.store') }}" method="POST">
            @csrf

            <!-- Nama Peminjam -->
            <div class="mb-4">
                <label for="nama_peminjam" class="block text-sm font-medium text-gray-300">
                    Nama Peminjam
                </label>
                <input type="text" name="nama_peminjam" id="nama_peminjam"
                    class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-white 
                           shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    required>
            </div>

            <!-- Nama Barang -->
            <div class="mb-4">
                <label for="nama_barang" class="block text-sm font-medium text-gray-300">
                    Nama Barang
                </label>
                <input type="text" name="nama_barang" id="nama_barang"
                    class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-white 
                           shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    required>
            </div>

            <!-- Jumlah Barang -->
            <div class="mb-4">
                <label for="jumlah_barang" class="block text-sm font-medium text-gray-300">
                    Jumlah Barang
                </label>
                <input type="number" name="jumlah_barang" id="jumlah_barang" min="1"
                    class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-white 
                           shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    required>
            </div>

            <!-- Tanggal Pinjam -->
            <div class="mb-4">
                <label for="tanggal_pinjam" class="block text-sm font-medium text-gray-300">
                    Tanggal Pinjam
                </label>
                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam"
                    class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-white 
                           shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    required>
            </div>

            <!-- Tanggal Kembali -->
            <div class="mb-4">
                <label for="tanggal_kembali" class="block text-sm font-medium text-gray-300">
                    Tanggal Kembali
                </label>
                <input type="date" name="tanggal_kembali" id="tanggal_kembali"
                    class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-white 
                           shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    required>
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <button type="submit"
                    class="px-5 py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 
                           focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Submit
                </button>
            </div>
        </form>
    </div>

</body>
</html>
