<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Crear Usuario - Formulario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    @include('components.navigation')

    <div class="max-w-2xl mx-auto mt-10 bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center space-x-3 mb-6">
            <img src="https://images.icon-icons.com/1378/PNG/512/avatardefault_92824.png" alt="logo-avatar" class="h-12">
            <h2 class="text-2xl font-bold text-gray-800">Crear Nuevo Usuario</h2>
        </div>

        <form class="space-y-6" action="{{ route('usuarios.store') }}" method="POST" novalidate>
            @csrf
            <!-- Nombre -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    Nombre
                </label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Nombre completo"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="correo@ejemplo.com"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <!-- Botón Enviar -->
            <div class="pt-4">
                <button
                    type="submit"
                    class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                    Crear Usuario
                </button>
            </div>
        </form>
    </div>

</body>

</html>