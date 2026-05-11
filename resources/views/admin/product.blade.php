<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Product') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                 <form action="{{ route('admin.create_product') }}" method="get">
                <button type="button " class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add Product
                </button>
            </form>
                <table class="p-6 text-gray-900 dark:text-gray-100">
                    <tr>
                        <th class="border px-4 py-2">Image</th>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Category</th>
                        <th class="border px-4 py-2">Base Price</th>
                        <th class="border px-4 py-2">Actions</th>
                        <th class="border px-4 py-2">Sembunyikan</th>
                    </tr>
                   @foreach ($product as $item)
                    <tr>
                        <td class="border px-4 py-2">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-16 h-16 object-cover">
                        </td>
                        <td class="border px-4 py-2">{{ $item->name }}</td>
                        <td class="border px-4 py-2">{{ $item->category->name }}</td>
                        <td class="border px-4 py-2">Rp{{ $item->base_price }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.edit_product', $item->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            <a href="{{ route('admin.destroy_product', $item->id) }}" class="text-red-500 hover:underline ms-2">Delete</a>
                        </td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('sembunyikan_product', $item->id) }}" method="post" class="inline">
                                @csrf
                                <button type="submit" class="text-yellow-500 hover:underline">
                                    @if ($item->is_active)
                                        Sembunyikan
                                    @else
                                        Tampilkan
                                    @endif
                                </button>
                            </form>
                        </td>
                    </tr>
                   @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>