<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
            {{ __('Create Quantity Tier') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden">

                <!-- Header -->
                <div class="p-8 border-b border-gray-200 dark:border-gray-700">

                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                        Tambah Quantity Tier
                    </h1>

                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        Buat tier quantity beserta benefit produk.
                    </p>

                </div>

                <!-- Form -->
                <div class="p-8">

                    <form action="{{ route('admin.store_tier') }}"
                          method="POST"
                          class="space-y-8">

                        @csrf

                        <!-- Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <!-- Tier Label -->
                            <div class="md:col-span-2">

                                <label for="label"
                                       class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">

                                    Tier Label
                                </label>

                                <input
                                    type="text"
                                    name="label"
                                    id="label"
                                    value="{{ old('label') }}"
                                    placeholder="Contoh: Starter, Medium, Premium"
                                    class="w-full rounded-2xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                                @error('label')
                                    <p class="mt-2 text-sm text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                            <!-- Min Qty -->
                            <div>

                                <label for="min_qty"
                                       class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">

                                    Minimum Quantity
                                </label>

                                <input
                                    type="number"
                                    name="min_qty"
                                    id="min_qty"
                                    value="{{ old('min_qty') }}"
                                    placeholder="Contoh: 1"
                                    class="w-full rounded-2xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                                @error('min_qty')
                                    <p class="mt-2 text-sm text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                            <!-- Max Qty -->
                            <div>

                                <label for="max_qty"
                                       class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">

                                    Maximum Quantity
                                </label>

                                <input
                                    type="number"
                                    name="max_qty"
                                    id="max_qty"
                                    value="{{ old('max_qty') }}"
                                    placeholder="Contoh: 100"
                                    class="w-full rounded-2xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                                @error('max_qty')
                                    <p class="mt-2 text-sm text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                            <!-- Price -->
                            <div>

                                <label for="price_per_unit"
                                       class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">

                                    Price Per Unit
                                </label>

                                <input
                                    type="number"
                                    name="price_per_unit"
                                    id="price_per_unit"
                                    value="{{ old('price_per_unit') }}"
                                    placeholder="Contoh: 15000"
                                    class="w-full rounded-2xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                                @error('price_per_unit')
                                    <p class="mt-2 text-sm text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                            <!-- Negotiable -->
                            <div>

                                <label for="is_negotiable"
                                       class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">

                                    Pricing Type
                                </label>

                                <select
                                    name="is_negotiable"
                                    id="is_negotiable"
                                    class="w-full rounded-2xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                                    <option value="0">
                                        Fixed Price
                                    </option>

                                    <option value="1">
                                        Negotiable
                                    </option>

                                </select>

                                @error('is_negotiable')
                                    <p class="mt-2 text-sm text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>

                        <!-- Benefits -->
                        <div>

                            <div class="flex items-center justify-between mb-4">

                                <div>

                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                                        Benefits
                                    </h3>

                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Tambahkan benefit untuk tier ini.
                                    </p>

                                </div>

                                <button
                                    type="button"
                                    onclick="addBenefit()"
                                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-xl transition duration-200">

                                    + Tambah Benefit
                                </button>

                            </div>

                            <div id="benefit-container" class="space-y-4">

                                <div class="flex gap-3">

                                    <input
                                        type="text"
                                        name="benefits[]"
                                        placeholder="Contoh: Free konsultasi"
                                        class="w-full rounded-2xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                                </div>

                            </div>

                        </div>

                        <!-- Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-4">

                            <button
                                type="submit"
                                class="inline-flex justify-center items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-2xl shadow-lg hover:shadow-xl transition duration-300">

                                Create Quantity Tier
                            </button>

                            <a href="{{ route('admin.tier') }}"
                               class="inline-flex justify-center items-center px-6 py-3 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-white font-semibold rounded-2xl transition duration-300">

                                Cancel
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

    <script>
        function addBenefit() {

            const container = document.getElementById('benefit-container');

            const wrapper = document.createElement('div');

            wrapper.className = 'flex gap-3';

            wrapper.innerHTML = `
                <input
                    type="text"
                    name="benefits[]"
                    placeholder="Contoh: Free mockup"
                    class="w-full rounded-2xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                <button
                    type="button"
                    onclick="this.parentElement.remove()"
                    class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-xl transition duration-200">

                    Hapus
                </button>
            `;

            container.appendChild(wrapper);
        }
    </script>

</x-app-layout>