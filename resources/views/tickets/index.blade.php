<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestionar Tickets</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>
    @include('components.navigation')
    <main class="flex justify-center flex-col items-center my-8">

        <h1 class="text-2xl font-bold mb-6">Gestión de Tickets</h1>

        <a href="{{ route('tickets.create') }}"
            class="bg-blue-600 mx-auto mb-5 cursor-pointer text-xl font-bold text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition">
            Crear Ticket
        </a>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full max-w-6xl">

            <table class="w-full text-sm text-left text-gray-700">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Imagen</th>
                        <th scope="col" class="px-6 py-3">Título</th>
                        <th scope="col" class="px-6 py-3">Descripción</th>
                        <th scope="col" class="px-6 py-3">Usuario</th>
                        <th scope="col" class="px-6 py-3">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tickets as $ticket)
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-6 py-4">
                            @if ($ticket->image)
                            <img src="{{ asset('storage/' . $ticket->image) }}" alt="Imagen ticket" class="w-20 h-20 object-cover rounded">
                            @else
                            <span class="text-gray-400">Sin imagen</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900">
                            {{ $ticket->title }}
                        </td>
                        <td class="px-6 py-4 text-gray-700 max-w-xl truncate" title="{{ $ticket->description }}">
                            {{ Str::limit($ticket->description, 60) }}
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            {{ $ticket->usuario->name ?? 'Desconocido' }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('tickets.edit', $ticket->id) }}"
                                class="text-blue-600 hover:underline text-sm font-medium">
                                Editar
                            </a>
                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 hover:underline text-sm font-medium">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center px-6 py-4 text-gray-500">
                            No hay tickets registrados aún.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </main>

</body>

</html>