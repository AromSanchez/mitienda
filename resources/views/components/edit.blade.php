<dialog id="editProductDialog">
    <form method="POST" :action="formAction" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <h2 class="text-xl font-semibold mb-4">Editar producto</h2>

        <div>
            <label for="edit_nombre" class="block text-gray-700">Nombre</label>
            <input
                type="text"
                id="edit_nombre"
                name="name"
                required
                class="w-full border border-gray-300 rounded px-3 py-2"
                :value="formNombre">
        </div>

        <div>
            <label for="edit_precio" class="block text-gray-700">Precio</label>
            <input
                type="number"
                step="0.01"
                id="edit_precio"
                name="price"
                required
                class="w-full border border-gray-300 rounded px-3 py-2"
                :value="formPrecio">
        </div>

        <div>
            <label for="edit_imagen" class="block text-gray-700">Imagen (opcional)</label>
            <input
                type="file"
                id="edit_imagen"
                name="picture"
                accept="image/*"
                class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="flex justify-end space-x-2 mt-6">
            <button
                type="button"
                id="closeEditDialogBtn"
                class="px-4 py-2 rounded border border-gray-300 hover:bg-gray-100">
                Cancelar
            </button>

            <button
                type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Actualizar
            </button>
        </div>
    </form>
</dialog>

<script>
    const editDialog = document.getElementById('editProductDialog');
    const closeEditBtn = document.getElementById('closeEditDialogBtn');

    let form = editDialog.querySelector('form');
    let inputNombre = document.getElementById('edit_nombre');
    let inputPrecio = document.getElementById('edit_precio');

    function openEditDialog(product) {
        // product: objeto con {id, name, price}
        form.action = `/${product.id}`;
        inputNombre.value = product.name;
        inputPrecio.value = product.price;
        editDialog.showModal();
    }

    closeEditBtn.addEventListener('click', () => editDialog.close());
    editDialog.addEventListener('cancel', () => editDialog.close());
</script>