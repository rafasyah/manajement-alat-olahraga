<x-app-layout>
    <div class="py-12">
        <section class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 p-6 sm:p-10">
            <div class="mx-auto max-w-screen-xl">
                
                <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700">
                    
          
                    <div class="flex flex-col md:flex-row items-center justify-between p-6 bg-gradient-to-r from-indigo-600 to-blue-600 dark:from-indigo-700 dark:to-blue-800 text-white">
                        <h2 class="text-2xl font-bold">📦 Daftar Alat</h2>
                        
                        <div class="flex flex-col md:flex-row gap-3 mt-4 md:mt-0">
                           
                            <form class="relative">
                                <input type="text" id="simple-search"
                                    class="w-72 pl-10 pr-4 py-2 text-sm rounded-lg border border-transparent focus:ring-2 focus:ring-yellow-400 dark:focus:ring-yellow-300 focus:outline-none text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-700 shadow-sm"
                                    placeholder="🔍 Cari alat...">
                                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                                    </svg>
                                </span>
                            </form>

                       
                            <button onclick="window.location='{{ route('alat.create') }}'"
                                class="flex items-center gap-2 px-5 py-2 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded-lg shadow-md transition-all duration-200">
                                ➕ Tambah Data
                            </button>
                        </div>
                    </div>

                 
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
                            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-xs uppercase tracking-wider">
                                <tr>
                                    <th class="px-6 py-4">Nomor</th>
                                    <th class="px-6 py-4">Nama</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4">Gambar</th>
                                    <th class="px-6 py-4">Jumlah</th>
                                    <th class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($alats as $alat)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                    <td class="px-6 py-4 font-medium">{{ $alat->nomor }}</td>
                                    <td class="px-6 py-4">{{ $alat->nama_barang }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full
                                            {{ $alat->status_barang === 'tersedia' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                            {{ ucfirst($alat->status_barang) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <img src="{{ asset('images/' . $alat->gambar_barang) }}"
                                             alt="{{ $alat->nama_barang }}"
                                             class="w-16 h-16 rounded-lg shadow-md object-cover border border-gray-200 dark:border-gray-600">
                                    </td>
                                    <td class="px-6 py-4">{{ $alat->jumlah_barang }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center gap-3">
                                            <a href="{{ route('alat.edit', $alat->id) }}"
                                                class="px-4 py-2 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow transition">
                                                ✏️ Edit
                                            </a>
                                            <form action="{{ route('alat.destroy', $alat->id) }}" method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus item ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-4 py-2 text-sm bg-red-600 hover:bg-red-700 text-white rounded-lg shadow transition">
                                                    🗑️ Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </section>
    </div>
</x-app-layout>