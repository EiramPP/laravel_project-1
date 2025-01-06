<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="table-container">
                    <header class="p-4 flex flex-row gap-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        <a href="{{ route('product.create') }}" class="flex flex-row gap-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            New Product
                        </a>
                    </header>
                    <table class="min-w-full border-collapse border border-gray-200 bg-white shadow-md rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-gray-200 text-left text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6">Image</th>
                                <th class="py-3 px-6">Product Name</th>
                                <th class="py-3 px-6">Category</th>
                                <th class="py-3 px-6">Price</th>
                                <th class="py-3 px-6">Stock</th>
                                <th class="py-3 px-6">Action</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            @foreach($products as $index => $product)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6">
                                    <img src="{{ isset($product->product_image) ? asset('Uploads/Product Images/' . $product->product_image ) : asset('Uploads/Product Images/Default-Image.png' )   }}" class="w-10 h-10 rounded-full">
                                </td>
                                <td class="py-3 px-6">{{ $product->product_name }}</td>
                                <td class="py-3 px-6">{{ $product->category->category_name }}</td>
                                <td class="py-3 px-6">{{ $product->price }}</td>
                                <td class="py-3 px-6">{{ $product->stock }}</td>
                                <td class="py-3 px-6 flex space-x-2">
                                    <a title="EDIT" href="#" class="bg-blue-500 text-white py-1 px-4 rounded hover:bg-blue-600 transition duration-300">
                                        EDIT
                                    </a>
                                    <form action="#" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="bg-red-500 text-white py-1 px-4 rounded hover:bg-red-600 transition duration-300"
                                            onclick="return confirm('Are you sure you want to delete this product?');">
                                            DELETE
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>