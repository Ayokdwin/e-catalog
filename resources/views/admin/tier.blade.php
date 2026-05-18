<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
            {{ __('Manage Tiers') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-3xl overflow-hidden">

                <!-- Header -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-8 border-b border-gray-200 dark:border-gray-700">

                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                            Tier List
                        </h1>

                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Kelola tier produk dan benefit dengan tampilan modern.
                        </p>
                    </div>
<div class="flex flex-col sm:flex-row gap-3">

                        <a href="{{ route('admin.create_tier') }}"
                           class="inline-flex items-center justify-center px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-2xl shadow-lg hover:shadow-xl transition duration-300">

                            + Tambah Tier
                        </a>

                        <a href="#"
                           class="inline-flex items-center justify-center px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-2xl shadow-lg hover:shadow-xl transition duration-300">

                            + Tambah Benefit
                        </a>

                    </div>

                </div>

                <!-- Content -->
                <div class="p-8">

                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

                        @forelse($quantity_tiers as $tier)

                            <div class="group bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-3xl overflow-hidden shadow-md hover:shadow-2xl hover:-translate-y-1 transition duration-300">

                                <!-- Top Accent -->
                                <div class="h-2 bg-gradient-to-r
                                    @if($tier->label == 'Starter')
                                        from-green-400 to-emerald-600
                                    @elseif($tier->label == 'Medium')
                                        from-blue-400 to-indigo-600
                                    @else
                                        from-purple-400 to-pink-600
                                    @endif
                                ">
                                </div>

                                <div class="p-6 flex flex-col h-full">

                                    <!-- Tier Name -->
                                    <div class="flex items-center justify-between mb-5">

                                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                                            {{ $tier->label }}
                                        </h3>

                                        <span class="px-3 py-1 text-xs font-semibold rounded-full
                                            {{ $tier->is_negotiable
                                                ? 'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300'
                                                : 'bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300'
                                            }}">
                                            {{ $tier->is_negotiable ? 'Negotiable' : 'Fixed Price' }}
                                        </span>

                                    </div>

                                    <!-- Price -->
                                    <div class="mb-6">

                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Price Per Unit
                                        </p>

                                        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mt-1">
                                            Rp {{ number_format($tier->price_per_unit, 0, ',', '.') }}
                                        </h2>

                                    </div>

                                    <!-- Quantity -->
                                    <div class="grid grid-cols-2 gap-4 mb-6">

                                        <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-4">

                                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">
                                                Minimum Qty
                                            </p>

                                            <h4 class="text-lg font-bold text-gray-800 dark:text-white">
                                                {{ $tier->min_qty }}
                                            </h4>

                                        </div>

                                        <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-4">

                                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">
                                                Maximum Qty
                                            </p>

                                            <h4 class="text-lg font-bold text-gray-800 dark:text-white">
                                                {{ $tier->max_qty ?? 'Unlimited' }}
                                            </h4>

                                        </div>

                                    </div>

                                    <!-- Benefits -->
                                    <div class="mb-6 flex-1">

                                        <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                            Benefits
                                        </h4>

                                        <div class="space-y-3">

                                            @foreach($tier->benefits as $benefit)

                                                <div class="flex items-start gap-3">

                                                    <div class="mt-1 w-2 h-2 rounded-full bg-blue-500"></div>

                                                    <p class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed">
                                                        {{ $benefit->benefit }}
                                                    </p>

                                                </div>

                                            @endforeach

                                        </div>

                                    </div>

                                    <!-- Actions -->
                                    <div class="flex gap-3 mt-auto">

                                        <a href="#"
                                           class="w-full text-center px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-2xl transition duration-200">

                                            Edit
                                        </a>

                                        <form action="{{ route('admin.destroy_tier', $tier->id) }}"
                                              method="get"
                                              class="w-full">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus tier ini?')"
                                                class="w-full px-4 py-3 bg-red-500 hover:bg-red-600 text-white font-medium rounded-2xl transition duration-200">

                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <div class="col-span-full">

                                <div class="text-center py-20 rounded-3xl border-2 border-dashed border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700">

                                    <div class="text-6xl mb-5">
                                        📦
                                    </div>

                                    <h3 class="text-xl font-bold text-gray-700 dark:text-white mb-2">
                                        Belum Ada Tier
                                    </h3>

                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Tambahkan tier pertama untuk mulai mengelola data.
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