<nav class="bg-white p-4 border-b-2 border-gray-300">
  <div class="container mx-auto flex justify-between items-center">
    <a href="/" class="text-black text-lg font-bold">
      <img src="https://images.icon-icons.com/317/PNG/512/shop-icon_34368.png" alt="Logo" class="h-13">
    </a>

    

    <!-- Links de navegación -->
    <div id="nav-links" class="hidden md:flex space-x-4">
      <a href="#" class="text-black hover:text-gray-600"></a>
      <a href="#" class="text-black hover:text-gray-600"></a>
      <a href="#" class="text-black hover:text-gray-600"></a>
    </div>

    <!-- Botón hamburguesa -->
    <button
      id="menu-toggle"
      class="md:hidden text-black focus:outline-none"
      aria-controls="nav-links"
      aria-expanded="false">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M4 6h16M4 12h16m-7 6h7"></path>
      </svg>
    </button>
  </div>

  <!-- Menú móvil (oculto por defecto) -->
  <div id="mobile-menu" class="md:hidden hidden px-4 pt-2 pb-4 space-y-2">
    <a href="#" class="block text-black hover:text-gray-600"></a>
    <a href="#" class="block text-black hover:text-gray-600"></a>
    <a href="#" class="block text-black hover:text-gray-600"></a>
  </div>
</nav>

<script>
  const toggle = document.getElementById('menu-toggle');
  const menu = document.getElementById('mobile-menu');

  toggle.addEventListener('click', () => {
    menu.classList.toggle('hidden');
    toggle.setAttribute(
      'aria-expanded',
      menu.classList.contains('hidden') ? 'false' : 'true'
    );
  });
</script>