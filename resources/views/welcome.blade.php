<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>
    
</body>
</html>





<div class="min-h-screen bg-gray-900 py-10">
    <div class="buttons m-5">
        <a href="{{ route('register') }}" class="inline-block bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">Register</a>
        <a href="{{ route('login') }}" class="inline-block bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">Login</a>
    </div>

    <div class="max-w-6xl mx-auto px-4">
        <!-- Heading -->
        <h1 class="text-4xl font-bold text-center text-white mb-10">
            Selamat Datang di Peminjaman
        </h1>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($alats as $alat)
                <div class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">
                    @if($alat->gambar_barang)
                        <img src="{{ asset('images/' . $alat->gambar_barang) }}" 
                             alt="{{ $alat->nama_barang }}" 
                             class="h-48 w-full object-cover">
                    @else
                        <div class="h-48 w-full flex items-center justify-center bg-gray-700 text-gray-400">
                            No Image
                        </div>
                    @endif

                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-white mb-2">
                            {{ $alat->nomor }}. {{ $alat->nama_barang }}
                        </h2>
                        <p class="text-gray-400 mb-1">Status: {{ $alat->status_barang }}</p>
                        <p class="text-gray-400 mb-3">Jumlah: {{ $alat->jumlah_barang }}</p>

                        <a href="{{ route('form.create') }}" 
                           class="text-blue-500 hover:underline">Pinjam sekarang!   </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-400">
                    Belum ada produk tersedia.
                </div>
            @endforelse
        </div>
    </div>
</div>
