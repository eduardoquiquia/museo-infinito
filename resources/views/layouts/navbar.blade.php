<!-- Navbar -->
  <nav class="border-b border-[#c9a961] flex justify-between items-center px-10 py-6 bg-black/80 fixed w-full top-0 z-50">
    <div class="flex items-center gap-3">
      <div class="w-6 h-6 border-2 rounded-b-full border-white rounded flex items-center justify-center">
        <span class="text-xm py">∞</span>
      </div>
      <span class="font-medium text-sm uppercase tracking-[0.25rem]">Museo Infinito</span>
    </div>

<ul class="flex gap-8 text-sm">

    <li>
        <a href="{{ route('home') }}"
           class="{{ request()->routeIs('home') ? 'text-[#c9a961]' : 'text-gray-400 hover:text-white' }}">
            Inicio
        </a>
    </li>

    <li>
        <a href="{{ route('exhibiciones.index') }}"
           class="{{ request()->routeIs('exhibiciones.index') ? 'text-[#c9a961]' : 'text-gray-400 hover:text-white' }}">
            Exhibiciones
        </a>
    </li>

    <li>
        <a href="{{ route('rutas.index') }}"
           class="{{ request()->routeIs('rutas.index') ? 'text-[#c9a961]' : 'text-gray-400 hover:text-white' }}">
            Rutas
        </a>
    </li>

    <li>
        <a href="{{ route('blog.index') }}"
           class="{{ request()->routeIs('blog.index') ? 'text-[#c9a961]' : 'text-gray-400 hover:text-white' }}">
            Blog
        </a>
    </li>

    <li>
        <a href="{{ route('restaurante.index') }}"
           class="{{ request()->routeIs('restaurante.index') ? 'text-[#c9a961]' : 'text-gray-400 hover:text-white' }}">
            Restaurante
        </a>
    </li>

    <li>
        <a href="{{ route('eventos.index') }}"
           class="{{ request()->routeIs('eventos.index') ? 'text-[#c9a961]' : 'text-gray-400 hover:text-white' }}">
            Eventos
        </a>
    </li>

    <li>
        <a href="{{ route('sobre.index') }}"
           class="{{ request()->routeIs('sobre.index') ? 'text-[#c9a961]' : 'text-gray-400 hover:text-white' }}">
            Sobre Nosotros
        </a>
    </li>

    <li>
        <a href="{{ route('contacto.index') }}"
           class="{{ request()->routeIs('contacto.index') ? 'text-[#c9a961]' : 'text-gray-400 hover:text-white' }}">
            Contacto
        </a>
    </li>

</ul>

    <div class="flex gap-3">
      <button class="px-6 py-1 hover:text-yellow-500 text-sm bg-transparent border border-[#c9a961]/50 rounded-lg p-4 hover:bg-yellow-500/20 transition-colors duration-300">
        Iniciar Sesión
      </button>
      <button class="bg-[#c9a961]  px-5 py-1 rounded-lg text-sm hover:bg-yellow-600 text-black">
        Entradas
      </button>
    </div>
  </nav>

  <!-- Contenido de cada página -->
  <div class="pt-28 px-10"> <!-- pt-28 para que no quede tapado por el navbar fijo -->
      @yield('content')
  </div>
