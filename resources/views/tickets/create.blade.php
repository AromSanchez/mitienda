<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Crear Nuevo Ticket</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

@include('components.navigation')

  <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-6 mt-5">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Crear Nuevo Ticket</h2>
    <form class="space-y-6" action="{{route('tickets.store')}}" method="POST" enctype="multipart/form-data" novalidate>
      @csrf
      <!-- Título -->
      <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título</label>
        <input
          type="text"
          id="title"
          name="title"
          placeholder="Resumen breve del problema"
          class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
          required
        />
        <!-- Error example -->
        <!-- <p class="mt-1 text-sm text-red-600">El título es requerido</p> -->
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
          required
        ></textarea>
        <!-- Error example -->
        <!-- <p class="mt-1 text-sm text-red-600">La descripción es requerida</p> -->
      </div>

      <!-- Selección Usuario -->
      <div class="relative">
        <label for="user" class="block text-sm font-medium text-gray-700 mb-1">Usuario</label>
        <div class="mt-1 relative">
          <select
            id="user"
            name="usuario_id"
            class="bg-white w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 cursor-pointer focus:ring-blue-500 focus:border-blue-500"
            required
          >
            <option value="" disabled selected>Seleccionar usuario</option>
            <!-- Aquí deberás agregar los usuarios desde backend o JavaScript -->
            @foreach ($usuarios as $usuario)
              <option value="{{ $usuario->id }}">
                {{ $usuario->name }} 
                ({{ $usuario->email }})
              </option>
            @endforeach
          </select>
          <!-- Error example -->
          <!-- <p class="mt-1 text-sm text-red-600">Debe seleccionar un usuario</p> -->
        </div>
      </div>

      <!-- Archivo Adjunto -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Archivo Adjunto (opcional)</label>

        <div id="file-upload-container" class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
          <div class="space-y-1 text-center">
            <!-- Icono Upload SVG -->
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
              <path d="M4 17v2a2 2 0 002 2h12a2 2 0 002-2v-2" />
              <polyline points="7 9 12 4 17 9" />
              <line x1="12" y1="4" x2="12" y2="16" />
            </svg>
            <div class="flex text-sm text-gray-600 justify-center">
              <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                <span>Subir un archivo</span>
                <input id="file-upload" name="file" type="file" class="sr-only" />
              </label>
            </div>
            <p class="text-xs text-gray-500">PNG, JPG hasta 10MB</p>
          </div>
        </div>

        <!-- Archivo cargado (oculto inicialmente) -->
        <div id="file-info" class="hidden mt-1 flex items-center p-2 border border-gray-300 rounded-md">
          <div class="flex-1 truncate" id="file-name"></div>
          <button
            type="button"
            id="remove-file"
            class="ml-2 flex-shrink-0 p-1 rounded-full text-gray-500 hover:text-gray-700 focus:outline-none"
            aria-label="Eliminar archivo"
          >
            <!-- Icono X SVG -->
            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
              <line x1="18" y1="6" x2="6" y2="18" />
              <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Botón Enviar -->
      <div class="">
        <button
          type="submit"
          class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200"
        >
          Enviar Ticket
        </button>
      </div>
    </form>
  </div>

  <script>
    // Script simple para mostrar el nombre del archivo cargado y permitir eliminarlo
    const fileInput = document.getElementById('file-upload');
    const fileUploadContainer = document.getElementById('file-upload-container');
    const fileInfo = document.getElementById('file-info');
    const fileNameDisplay = document.getElementById('file-name');
    const removeFileBtn = document.getElementById('remove-file');

    fileInput.addEventListener('change', () => {
      if (fileInput.files.length > 0) {
        const file = fileInput.files[0];
        fileNameDisplay.textContent = file.name;
        fileUploadContainer.classList.add('hidden');
        fileInfo.classList.remove('hidden');
      }
    });

    removeFileBtn.addEventListener('click', () => {
      fileInput.value = '';
      fileUploadContainer.classList.remove('hidden');
      fileInfo.classList.add('hidden');
      fileNameDisplay.textContent = '';
    });
  </script>
</body>

</html>
