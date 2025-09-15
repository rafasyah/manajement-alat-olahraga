<x-app-layout>

    <div class="py-12">
      <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between 
                            space-y-3 md:space-y-0 md:space-x-4 p-4">
                    
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                           focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 
                                           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                           dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                    placeholder="Search" required="">
                            </div>
                        </form>
                    
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nama Peminjam</th>
                                <th scope="col" class="px-4 py-3">Nama Barang</th>
                                <th scope="col" class="px-4 py-3">Jumlah Barang</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Tanggal Pinjam</th>
                                <th scope="col" class="px-4 py-3">Tanggal Kembali</th>
                                <th scope="col" class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($forms as $form)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">{{ $form->nama_peminjam }}</td>
                                    <td class="px-4 py-3">{{ $form->nama_barang }}</td>
                                    <td class="px-4 py-3">{{ $form->jumlah_barang }}</td>
                                    <td class="px-4 py-3">
                                    @if ($form->status_barang == 1)<span class="text-orange-500">Pending</span> 
                                     @else<span class="text-green-500">Approved</span>  @endif</td>
                                    <td class="px-4 py-3">{{ $form->tanggal_pinjam }}</td>
                                    <td class="px-4 py-3">{{ $form->tanggal_kembali }}</td>
                                    <td class="px-4 py-3 text-right">

                                    @if ($form->status_barang == 1)
                                        <div class="inline-flex items-center space-x-3">

                                            <form action="{{ route('form.approve', $form->id) }}" method="POST" 
                                                  >
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" 
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
                                                      focus:outline-none focus:ring-blue-300 font-medium 
                                                      rounded-lg text-sm px-5 py-2.5 text-center 
                                                      dark:bg-blue-600 dark:hover:bg-blue-700 
                                                      dark:focus:ring-blue-800">
                                                    Approve
                                                </button>


                                            </form>
                                            <form action="{{ route('form.destroy', $form->id) }}" method="POST" 
                                                  >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
                                                      focus:outline-none focus:ring-blue-300 font-medium 
                                                      rounded-lg text-sm px-5 py-2.5 text-center 
                                                      dark:bg-blue-600 dark:hover:bg-blue-700 
                                                      dark:focus:ring-blue-800">
                                                    Decline
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    @endif
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
