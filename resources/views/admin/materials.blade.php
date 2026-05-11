<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Materials') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                     <div class="flex items-center justify-between mb-12">
                    <a href="{{ route('admin.create_material') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 hover:shadow-md transition-all duration-200">Tambah Material</a>
                </div>
                   <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($materials as $material)
                        <div class="bg-white dark:bg-gray-700 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group hover:scale-105 transform">
                            <div class="relative overflow-hidden">
                                @if($material->image && file_exists(public_path('storage/' . $material->image)))
                                    <img src="{{ asset('storage/' . $material->image) }}" alt="{{ $material->name }}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
                                @else
                                    <div class="w-full h-48 bg-gradient-to-br from-[var(--brand-soft)] to-[var(--brand-soft)]/50 flex items-center justify-center">
                                        <span class="text-6xl">🧢</span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-5">
                                <h3 class="font-bold text-lg mb-3 text-gray-900 dark:text-gray-100 line-clamp-2">{{ $material->name }}</h3>
                                    <a href="{{ route('admin.edit_material', $material->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 hover:shadow-md transition-all duration-200">Edit</a>
                                   
                                    <a href="{{ route('admin.destroy_material', $material->id) }}" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 hover:shadow-md transition-all duration-200" onclick="return confirm('Apakah Anda yakin ingin menghapus material ini?')">Hapus</a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12 text-gray-500">
                            Produk akan segera ditampilkan
                        </div>
                    @endforelse
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>