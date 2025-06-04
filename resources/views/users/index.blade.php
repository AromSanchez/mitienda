<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestionar Usuarios</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>
    @include('components.navigation')

    <main class="flex justify-center flex-col items-center my-8">
        <h1 class="text-2xl font-bold mb-6">Gestión de Usuarios</h1>

        <a href="{{ route('usuarios.create') }}"
            class="bg-green-600 mx-auto mb-5 cursor-pointer text-xl font-bold text-white px-4 py-2 rounded-lg hover:bg-green-800 transition">
            Crear Usuario
        </a>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full max-w-6xl">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Tickets</th>
                        <th scope="col" class="px-6 py-3">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($usuarios as $index => $usuario)
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 font-semibold text-gray-900">{{ $usuario->name }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $usuario->email }}</td>
                        <td class="px-6 py-4 text-blue-600 font-semibold">{{ $usuario->tickets_count }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                class="text-blue-600 hover:underline text-sm font-medium">
                                Editar
                            </a>
                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este usuario?')"
                                    class="text-red-600 hover:underline text-sm font-medium">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center px-6 py-4 text-gray-500">
                            No hay usuarios registrados aún.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>