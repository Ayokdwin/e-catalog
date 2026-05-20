<x-app-layout>
     <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-white leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl overflow-hidden">
                <!-- Header -->
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h1 class="text-xl font-bold text-gray-800 dark:text-white">
                        Edit Category
                    </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                        Isi data category dengan lengkap
                    </p>
                </div>
                <!-- Form -->
                <div class="p-6">
                    <form action="{{ route('admin.update_category', $category->id) }}"
                          method="POST"
                          class="space-y-6">
                        @csrf
                        @method('PUT')
                        <!-- Category Name -->
                        <div>
                            <label for="name"
                                   class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Category Name
                            </label>
                            <input type="text" name="name"id="name" value="{{ old('name', $category->name) }}" placeholder="Masukkan nama category" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-    500">
                        </div>
                        <div>
                            <label for="slug"
                                   class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Category Slug
                            </label>
                            <input type="text" name="slug"id="slug" value="{{ old('slug', $category->slug) }}" placeholder="Masukkan slug category" class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-    500">
                        </div>
                        <div class="flex gap-4">
                            <button type="submit"
                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl transition duration-200 shadow-md hover:shadow-lg">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>