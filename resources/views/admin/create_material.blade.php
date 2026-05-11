<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Material') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  <form action="{{ route('admin.store_material') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Form fields for creating a new material -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Material Name:</label>
                        <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                
                        </select>
                   
                    <div class="mb-4">
                        <label for="price_per_unit" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Price Per Unit:</label>
                        <input type="number" name="price_per_unit" id="price_per_unit" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Description:</label>
                        <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Material Image:</label>
                        <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Create Material
                        </button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>  
</x-app-layout>