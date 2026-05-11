<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-white leading-tight">
            {{ __('Manage Product') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl overflow-hidden">

                <!-- Header -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-6 border-b border-gray-200 dark:border-gray-700">

                    <div>
                        <h1 class="text-xl font-bold text-gray-800 dark:text-white">
                            Product List
                        </h1>

                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                            Kelola produk dan visibilitas produk
                        </p>
                    </div>

                    <form action="{{ route('admin.create_product') }}" method="GET">
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700 transition duration-200 shadow-md hover:shadow-lg">
                            + Add Product
                        </button>
                    </form>

                </div>

                <!-- Table -->
                <div class="overflow-x-auto">

                    <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">

                        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 uppercase text-xs tracking-wider">
                            <tr>
                                <th class="px-6 py-4">Image</th>
                                <th class="px-6 py-4">Name</th>
                                <th class="px-6 py-4">Category</th>
                                <th class="px-6 py-4">Price</th>
                                <th class="px-6 py-4 text-center">Status</th>
                                <th class="px-6 py-4 text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($product as $item)

                                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">

                                    <!-- Image -->
                                    <td class="px-6 py-4">
                                        <img
                                            src="{{ asset('storage/' . $item->image) }}"
                                            alt="{{ $item->name }}"
                                            class="w-16 h-16 rounded-xl object-cover border border-gray-200 dark:border-gray-600 shadow-sm">
                                    </td>

                                    <!-- Name -->
                                    <td class="px-6 py-4 font-semibold text-gray-800 dark:text-white">
                                        {{ $item->name }}
                                    </td>

                                    <!-- Category -->
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs rounded-full bg-gray-200 dark:bg-gray-700">
                                            {{ $item->category->name }}
                                        </span>
                                    </td>

                                    <!-- Price -->
                                    <td class="px-6 py-4 font-medium">
                                        Rp{{ number_format($item->base_price, 0, ',', '.') }}
                                    </td>

                                    <!-- Status -->
                                    <td class="px-6 py-4 text-center">

                                        <form action="{{ route('sembunyikan_product', $item->id) }}" method="POST">
                                            @csrf

                                            <button
                                                type="submit"
                                                class="
                                                    px-4 py-2 rounded-lg text-white text-xs font-medium transition
                                                    {{ $item->is_active
                                                        ? 'bg-yellow-500 hover:bg-yellow-600'
                                                        : 'bg-green-500 hover:bg-green-600' }}
                                                ">

                                                @if ($item->is_active)
                                                    Sembunyikan
                                                @else
                                                    Tampilkan
                                                @endif

                                            </button>
                                        </form>

                                    </td>

                                    <!-- Actions -->
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">

                                            <!-- Edit -->
                                            <a href="{{ route('admin.edit_product', $item->id) }}"
                                               class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition shadow-sm">
                                                Edit
                                            </a>

                                            <!-- Delete -->
                                            <form action="{{ route('admin.destroy_product', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition shadow-sm">
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="text-center py-10 text-gray-500 dark:text-gray-400">
                                        Data product belum tersedia.
                                    </td>
                                </tr>

                            @endforelse
                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>