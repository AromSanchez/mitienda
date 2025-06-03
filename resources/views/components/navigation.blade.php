<nav class="bg-white shadow-md static top-0 left-0 right-0 z-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex items-center">
        <span class="flex-shrink-0 font-bold text-blue-600 text-xl">TicketSupport</span>
      </div>

      <!-- Menú escritorio -->
      <div class="hidden md:flex items-center space-x-4">
        <a href="/usuarios" class="px-4 py-2 rounded-md text-sm font-medium text-gray-600 hover:bg-gray-100">Crear Usuario</a>
        <a href="/ticket/create" class="px-4 py-2 rounded-md text-sm font-medium text-gray-600 hover:bg-gray-100">Crear Ticket</a>
        <a href="/tickets" class="px-4 py-2 rounded-md text-sm font-medium text-gray-600 hover:bg-gray-100">Gestionar Tickets</a>
      </div>

      <!-- Botón menú móvil -->
      <div class="md:hidden flex items-center">
        <button id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none">
          <!-- Ícono hamburguesa simple -->
          <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="18" x2="21" y2="18" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Menú móvil -->
  <div id="mobile-menu" class="hidden md:hidden bg-white pb-3 pt-1 border-t border-gray-200">
    <div class="px-2 space-y-1">
      <a href="/usuarios" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:bg-gray-100">Crear Usuario</a>
      <a href="/ticket/create" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:bg-gray-100">Crear Ticket</a>
      <a href="/tickets" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:bg-gray-100">Gestionar Tickets</a>
    </div>
  </div>
</nav>

<script>
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');

  mobileMenuButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>