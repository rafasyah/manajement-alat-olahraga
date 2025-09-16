<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peminjaman</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white">
<header class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-700 shadow-lg backdrop-blur-md border-b border-gray-600">
  <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
    

    <div class="flex items-center space-x-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M12 4v16m8-8H4" />
      </svg>
      <h1 class="text-2xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-green-400">
        Peminjaman
      </h1>
    </div>


    <div class="space-x-4 flex items-center">
      <a href="{{ route('register') }}" 
         class="px-4 py-2 rounded-lg font-medium text-white bg-blue-600 hover:bg-blue-700 shadow transition">
        Register
      </a>
      <a href="{{ route('login') }}" 
         class="px-4 py-2 rounded-lg font-medium text-white bg-green-600 hover:bg-green-700 shadow transition">
        Login
      </a>
    </div>
  </div>
</header>



  <section class="text-center py-12 bg-gradient-to-b from-gray-900 to-gray-800">
    <h2 class="text-4xl font-extrabold mb-4">Selamat Datang di Peminjaman</h2>
    <p class="text-gray-400 text-lg max-w-2xl mx-auto">
      Pinjam alat olahraga dengan mudah, cepat, dan terpercaya. Lihat daftar barang yang tersedia di bawah ini.
    </p>
  </section>


  <main class="max-w-7xl mx-auto px-6 py-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
      @forelse($alats as $alat)
        <div class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transform transition relative">

    
          @if($alat->gambar_barang)
            <img src="{{ asset('images/' . $alat->gambar_barang) }}" 
                 alt="{{ $alat->nama_barang }}" 
                 class="h-48 w-full object-cover">
          @else
            <div class="h-48 w-full flex items-center justify-center bg-gray-700 text-gray-400">
              No Image
            </div>
          @endif

        
          <span class="absolute top-3 right-3 px-3 py-1 text-xs rounded-full 
                       {{ $alat->status_barang == 'Tersedia' ? 'bg-green-600' : 'bg-red-600' }}">
            {{ $alat->status_barang }}
          </span>

       
          <div class="p-6">
            <h2 class="text-lg font-semibold mb-2">
              {{ $alat->nomor }}. {{ $alat->nama_barang }}
            </h2>
            <p class="text-gray-400 text-sm mb-1">Jumlah: <span class="font-medium">{{ $alat->jumlah_barang }}</span></p>
            
            
            <div class="mt-4">
              <a href="{{ route('form.create') }}" 
                 class="block text-center bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg shadow">
                Pinjam Sekarang!
              </a>
            </div>
          </div>
        </div>
      @empty
        <div class="col-span-full text-center text-gray-400">
          Belum ada produk tersedia.
        </div>
      @endforelse
    </div>
  </main>

  
  <footer class="bg-gray-800 py-6 mt-10">
    <div class="max-w-7xl mx-auto text-center text-gray-500 text-sm">
     2025 Rafasyah.
    </div>
  </footer>

</body>
</html>