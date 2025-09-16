<x-app-layout>
    <div class="py-12">
      <section class="bg-gray-100 dark:bg-gray-900 p-3 sm:p-6">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">

          <!-- Card Wrapper -->
          <div class="bg-white dark:bg-gray-800 relative shadow-xl sm:rounded-2xl overflow-hidden">

            <!-- Header -->
            <div class="flex flex-col md:flex-row items-center justify-between 
                        space-y-3 md:space-y-0 md:space-x-4 p-6 border-b dark:border-gray-700">
              <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                Daftar Peminjaman
              </h2>

              <!-- Search -->
              <div class="w-full md:w-1/2">
                <form class="flex items-center">
                  <label for="simple-search" class="sr-only">Search</label>
                  <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" 
                           fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" 
                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 
                              3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 
                              6 0 012 8z" clip-rule="evenodd" />
                      </svg>
                    </div>
                    <input type="text" id="simple-search" 
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm 
                                  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2 
                                  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                  dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                           placeholder="Cari peminjam atau barang..." required>
                  </div>
                </form>
              </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
              <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
                <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                  <tr>
                    <th scope="col" class="px-6 py-4">Nama Peminjam</th>
                    <th scope="col" class="px-6 py-4">Nama Barang</th>
                    <th scope="col" class="px-6 py-4">Jumlah</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                    <th scope="col" class="px-6 py-4">Tanggal Pinjam</th>
                    <th scope="col" class="px-6 py-4">Tanggal Kembali</th>
                    <th scope="col" class="px-6 py-4 text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($forms as $form)
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                      <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                        {{ $form->nama_peminjam }}
                      </td>
                      <td class="px-6 py-4">{{ $form->nama_barang }}</td>
                      <td class="px-6 py-4">{{ $form->jumlah_barang }}</td>
                      <td class="px-6 py-4">
                        @if ($form->status_barang == 1)
                          <span class="px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">
                            Pending
                          </span>
                        @else
                          <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                            Approved
                          </span>
                        @endif
                      </td>
                      <td class="px-6 py-4">{{ $form->tanggal_pinjam }}</td>
                      <td class="px-6 py-4">{{ $form->tanggal_kembali }}</td>
                      <td class="px-6 py-4 text-center">
                        @if ($form->status_barang == 1)
                          <div class="flex justify-center space-x-3">
                            <!-- Approve -->
                            <form action="{{ route('form.approve', $form->id) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <button type="submit" 
                                class="flex items-center gap-1 px-4 py-2 text-sm rounded-lg text-white 
                                       bg-blue-600 hover:bg-blue-700 shadow transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" 
                                     viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Approve
                              </button>
                            </form>

                            <!-- Decline -->
                            <form action="{{ route('form.destroy', $form->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" 
                                class="flex items-center gap-1 px-4 py-2 text-sm rounded-lg text-white 
                                       bg-red-600 hover:bg-red-700 shadow transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" 
                                     viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Decline
                              </button>
                            </form>
                          </div>
                        @endif
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