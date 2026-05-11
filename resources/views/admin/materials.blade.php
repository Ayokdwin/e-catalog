<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-white leading-tight">
            {{ __('Manage Materials') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl overflow-hidden">

                <!-- Header -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-6 border-b border-gray-200 dark:border-gray-700">

                    <div>
                        <h1 class="text-xl font-bold text-gray-800 dark:text-white">
                            Material List
                        </h1>

                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                            Kelola material produk dengan mudah
                        </p>
                    </div>

                    <a href="{{ route('admin.create_material') }}"
                       class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700 transition duration-200 shadow-md hover:shadow-lg">

                        + Tambah Material

                    </a>

                </div>

                <!-- Grid -->
                <div class="p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                        @forelse($materials as $material)

                            <div class="group bg-white dark:bg-gray-700 rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-600 shadow-sm hover:shadow-2xl transition duration-300">

                                <!-- Image -->
                                <div class="relative overflow-hidden">

                                    @if($material->image && file_exists(public_path('storage/' . $material->image)))

                                        <img
                                            src="{{ asset('storage/' . $material->image) }}"
                                            alt="{{ $material->name }}"
                                            class="w-full h-56 object-cover group-hover:scale-110 transition duration-500">

                                    @else

                                        <div class="w-full h-56 bg-gradient-to-br from-gray-200 to-gray-300 dark:from-gray-700 dark:to-gray-800 flex items-center justify-center">

                                            <span class="text-6xl">
                                                🧢
                                            </span>

                                        </div>

                                    @endif

                                </div>

                                <!-- Content -->
                                <div class="p-5 flex flex-col h-full">

                                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-4 line-clamp-2">
                                        {{ $material->name }}
                                    </h3>

                                    <!-- Buttons -->
                                   
<div class="flex gap-3 mt-5">

    <!-- Edit -->
    <a href="{{ route('admin.edit_material', $material->id) }}"
       class="w-full text-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-xl transition duration-200">

        Edit

    </a>

    <!-- Delete -->
    <form action="{{ route('admin.destroy_material', $material->id) }}"
          method="POST"
          class="w-full">

        @csrf
        @method('DELETE')

        <button
            type="submit"
            onclick="return confirm('Apakah Anda yakin ingin menghapus material ini?')"
            class="w-full px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-xl transition duration-200">

            Hapus

        </button>

    </form>

</div>

                                </div>

                            </div>

                        @empty

                            <div class="col-span-full">

                                <div class="text-center py-20 bg-gray-50 dark:bg-gray-700 rounded-2xl border border-dashed border-gray-300 dark:border-gray-600">

                                    <div class="text-6xl mb-4">
                                        📦
                                    </div>

                                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">
                                        Belum Ada Material
                                    </h3>

                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Tambahkan material pertama untuk mulai mengelola data.
                                    </p>

                                </div>

                            </div>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>