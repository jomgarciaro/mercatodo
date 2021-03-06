<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(trans('navigation.products')) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="m-4">
                {{ $products->links() }}
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="container mx-auto p-6 font-mono">
                        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                        <tr
                                            class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                            <th class="px-4 py-3">{{ trans('products.image') }}</th>
                                            <th class="px-4 py-3">Id</th>
                                            <th class="px-4 py-3">{{ trans('products.name') }}</th>
                                            <th class="px-4 py-3">{{ trans('products.description') }}</th>
                                            <th class="px-4 py-3">{{ trans('products.category') }}</th>
                                            <th class="px-4 py-3">{{ trans('products.price') }}</th>
                                            <th class="px-4 py-3">Stock</th>
                                            <th class="px-4 py-3">{{ trans('buttons.show') }}</th>
                                            <th class="px-4 py-3">{{ trans('buttons.edit') }}</th>
                                            <th class="px-4 py-3">{{ trans('buttons.delete') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        <div class="container">
                                            @foreach ($products as $product)
                                                <tr class="text-gray-700">
                                                    <td class="px-4 py-3 border">
                                                        <div class="flex items-center text-sm">
                                                            <img src="{{ asset('storage/'.$product->product_image) }}"
                                                                alt="Image" width="70px" height="70px">
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 border">
                                                        <div class="flex items-center text-sm">
                                                            <p class="font-semibold text-black">{{ $product->id }}
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 border">
                                                        <div class="flex items-center text-sm">
                                                            <p class="font-semibold text-black">{{ $product->name }}
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 border">
                                                        <div class="flex items-center text-sm">
                                                            <p class="font-semibold text-black">
                                                                {{ $product->description }}</p>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 border">
                                                        <div class="flex items-center text-sm">
                                                            <p class="font-semibold text-black">
                                                                {{ $product->category->name }}</p>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 border">
                                                        <div class="flex items-center text-sm">
                                                            <p class="font-semibold text-black">{{ money($product->price.'00') }}
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 border">
                                                        <div class="flex items-center text-sm">
                                                            <p class="font-semibold text-black">{{ number_format($product->stock, 0, ',','.') }}
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 border">
                                                        <div class="flex items-center text-sm">
                                                            <x-button-link href="{{ $product->showRoute() }}">
                                                                {{ trans('buttons.show') }}</x-button-link>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 border">
                                                        <div class="flex items-center text-sm">
                                                            <x-button-link href="{{ $product->editRoute() }}">
                                                                {{ trans('buttons.edit') }}</x-button-link>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 border">
                                                        <div class="flex items-center text-sm">
                                                            <form action="{{ $product->destroyRoute() }}"
                                                                method="POST">
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                                                <x-button onclick="return confirm();">
                                                                    {{ __(trans('buttons.delete')) }}
                                                                </x-button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="m-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
