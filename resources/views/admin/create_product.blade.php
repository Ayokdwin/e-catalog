<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-white leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl overflow-hidden">

                <!-- Header -->
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h1 class="text-xl font-bold text-gray-800 dark:text-white">
                        Tambah Product Baru
                    </h1>

                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                        Isi informasi product dengan lengkap
                    </p>
                </div>

                <!-- Form -->
                <div class="p-6">

                    <form action="{{ route('admin.store_product') }}"
                          method="POST"
                          enctype="multipart/form-data"
                          class="space-y-6">

                        @csrf

                        <!-- Product Name -->
                        <div>
                            <label for="name"
                                   class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Product Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                placeholder="Masukkan nama product"
                                class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category"
                                   class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Category
                            </label>

                            <select
                                name="category_id"
                                id="category"
                                class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <!-- Price -->
                        <div>
                            <label for="base_price"
                                   class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Base Price
                            </label>

                            <input
                                type="number"
                                name="base_price"
                                id="base_price"
                                placeholder="Contoh: 150000"
                                class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description"
                                   class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Description
                            </label>

                            <textarea
                                name="description"
                                id="description"
                                rows="5"
                                placeholder="Masukkan deskripsi product"
                                class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>

                        <!-- Image -->
                        <div>
                            <label for="image"
                                   class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Product Image
                            </label>

                            <input
                                type="file"
                                name="image"
                                id="image"
                                class="block w-full text-sm text-gray-700 dark:text-gray-300
                                       file:mr-4 file:py-2 file:px-4
                                       file:rounded-xl file:border-0
                                       file:text-sm file:font-medium
                                       file:bg-blue-100 file:text-blue-700
                                       hover:file:bg-blue-200">
                        </div>

                        <!-- Buttons -->
                        <div class="flex items-center gap-3 pt-4">

                            <button
                                type="submit"
                                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl shadow-md hover:shadow-lg transition duration-200">

                                Create Product

                            </button>

                            <a href="{{ route('admin.show_products') }}"
                               class="px-6 py-3 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-white font-medium rounded-xl transition duration-200">

                                Cancel

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>