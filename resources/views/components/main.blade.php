<main class="flex justify-center flex-col items-center my-8">
    <button
        id="openDialogBtn"
        class="bg-blue-600 mx-auto mb-5 cursor-pointer tex-[10px] font-bold text-white px-4 py-2 rounded-[10px] hover:bg-blue-800 transition">
        Create Product
    </button>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full max-w-6xl">

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>

                </tr>
            </thead>
            <tbody>
                @forelse ($productos as $producto)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        @if ($producto->picture)
                        <img src="{{ asset($producto->picture) }}" alt="Imagen" class="w-20 h-20 object-cover rounded">
                        @else
                        <span class="text-gray-400">Sin imagen</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-900 dark:text-white">
                        {{ $producto->name }}
                    </td>
                    <td class="px-6 py-4">
                        S/. {{ number_format($producto->price, 2) }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-2 h-full">
                            <form onsubmit="event.preventDefault(); openEditDialog(@js($producto))">
                                <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Edit
                                </button>
                            </form>
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center px-6 py-4 text-gray-500">No hay productos aún.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</main>