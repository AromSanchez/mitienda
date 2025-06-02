<style>
    dialog::backdrop {
        background: rgba(0, 0, 0, 0.5);
        /* Fondo oscuro semi-transparente */
    }

    dialog {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin: 0;
        border: none;
        border-radius: 0.5rem;
        padding: 1.5rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        width: 90%;
        max-width: 500px;
        z-index: 1000;
    }
</style>

<div>


    <!-- Dialog modal -->
    <dialog id="createProductDialog">
        <form method="POST" action="{{route('productos.store')}}" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <h2 class="text-xl font-semibold mb-4">Crear nuevo producto</h2>

            <div>
                <label for="nombre" class="block text-gray-700">Nombre</label>
                <input
                    type="text"
                    id="nombre"
                    name="name"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div>
                <label for="precio" class="block text-gray-700">Precio</label>
                <input
                    type="number"
                    step="0.01"
                    id="precio"
                    name="price"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div>
                <label for="imagen" class="block text-gray-700">Imagen</label>
                <input
                    type="file"
                    id="imagen"
                    name="picture"
                    accept="image/*"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="flex justify-end space-x-2 mt-6">
                <button
                    type="button"
                    id="closeDialogBtn"
                    class="px-4 py-2 rounded border border-gray-300 hover:bg-gray-100">
                    Cancelar
                </button>

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Guardar
                </button>
            </div>
        </form>
    </dialog>
</div>

<script>
    const dialog = document.getElementById('createProductDialog');
    const openBtn = document.getElementById('openDialogBtn');
    const closeBtn = document.getElementById('closeDialogBtn');

    openBtn.addEventListener('click', () => {
        dialog.showModal();
    });

    closeBtn.addEventListener('click', () => {
        dialog.close();
    });

    dialog.addEventListener('cancel', () => {
        dialog.close();
    });
</script>