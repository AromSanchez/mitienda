<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Ticket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    @include('components.navigation')

    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-6 mt-5">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Editar Ticket</h2>

        <form class="space-y-6" action="{{ route('tickets.update', $ticket->id) }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')

            <!-- Título -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $ticket->title) }}"
                    placeholder="Resumen breve del problema"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required />
            </div>

            <!-- Descripción -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    placeholder="Describa detalladamente el problema o consulta"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>{{ old('description', $ticket->description) }}</textarea>
            </div>

            <!-- Selección Usuario -->
            <div class="relative">
                <label for="user" class="block text-sm font-medium text-gray-700 mb-1">Usuario</label>
                <select
                    id="user"
                    name="usuario_id"
                    class="bg-white w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 cursor-pointer focus:ring-blue-500 focus:border-blue-500"
                    required>
                    <option value="" disabled>Seleccionar usuario</option>
                    @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $usuario->id == $ticket->usuario_id ? 'selected' : '' }}>
                        {{ $usuario->name }} ({{ $usuario->email }})
                    </option>
                    @endforeach
                </select>
            </div>

            <!-- Imagen Actual -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Imagen</label>

                <div id="image-preview-wrapper" class="{{ $ticket->image ? '' : 'hidden' }} mt-2 relative w-fit">
                    <img id="image-preview" src="{{ $ticket->image ? asset('storage/' . $ticket->image) : '' }}" alt="Imagen del ticket"
                        class="h-60 w-60 object-cover rounded-md shadow border" />

                    <button type="button" id="remove-image" class="absolute top-0 right-0 bg-white p-1 rounded-full shadow hover:text-red-600"
                        title="Eliminar imagen">
                        <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </button>
                </div>

                <div id="file-upload-container" class="{{ $ticket->image ? 'hidden' : '' }} mt-2">
                    <label for="file-upload"
                        class="flex flex-col items-center justify-center px-6 pt-5 pb-6 border-2 border-dashed border-gray-300 rounded-md cursor-pointer hover:border-blue-500">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M4 17v2a2 2 0 002 2h12a2 2 0 002-2v-2" />
                            <polyline points="7 9 12 4 17 9" />
                            <line x1="12" y1="4" x2="12" y2="16" />
                        </svg>
                        <p class="text-sm text-gray-600">Sube una nueva imagen</p>
                        <p class="text-xs text-gray-500">PNG, JPG hasta 10MB</p>
                        <input id="file-upload" name="file" type="file" class="sr-only" />
                    </label>
                </div>
            </div>

            <!-- Botón Enviar -->
            <div>
                <button
                    type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Actualizar Ticket
                </button>
            </div>
        </form>
    </div>

    <script>
        const fileInput = document.getElementById('file-upload');
        const imagePreview = document.getElementById('image-preview');
        const imageWrapper = document.getElementById('image-preview-wrapper');
        const removeImageBtn = document.getElementById('remove-image');
        const uploadContainer = document.getElementById('file-upload-container');

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                const reader = new FileReader();
                reader.onload = e => {
                    imagePreview.src = e.target.result;
                    imageWrapper.classList.remove('hidden');
                    uploadContainer.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        });

        removeImageBtn.addEventListener('click', () => {
            fileInput.value = '';
            imageWrapper.classList.add('hidden');
            uploadContainer.classList.remove('hidden');
            imagePreview.src = '';
        });
    </script>
</body>

</html>