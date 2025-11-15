<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Museo Infinito - Home</title>

  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white font-sans">

  <!-- Navbar -->
  <nav class="border-b border-yellow-600 flex justify-between items-center px-10 py-5 bg-black/80 fixed w-full top-0 z-50">
    <div class="flex items-center gap-2">
      <div class="w-6 h-6 border-2 border-white rounded-full flex items-center justify-center">
        <span class="text-xs">∞</span>
      </div>
      <span class="font-normal text-lg font-serif">Museo Infinito</span>
    </div>

    <ul class="flex gap-8 text-sm">
      <li class="text-yellow-400 cursor-pointer">Inicio</li>
      <li class="text-gray-400 hover:text-white cursor-pointer">Exhibiciones</li>
      <li class="text-gray-400 hover:text-white cursor-pointer">Rutas</li>
      <li class="text-gray-400 hover:text-white cursor-pointer">Blog</li>
      <li class="text-gray-400 hover:text-white cursor-pointer">Restaurante</li>
      <li class="text-gray-400 hover:text-white cursor-pointer">Eventos</li>
      <li class="text-gray-400 hover:text-white cursor-pointer">Sobre Nosotros</li>
      <li class="text-gray-400 hover:text-white cursor-pointer">Contacto</li>
    </ul>

    <div class="flex gap-3">
      <button class=" px-3 py-1 hover:text-yellow-500 text-sm bg-transparent border border-yellow-500 rounded-lg p-4 hover:bg-yellow-500/20 transition-colors duration-300">
        Iniciar Sesión
      </button>
      <button class="bg-yellow-600 px-3 py-1 rounded-lg text-sm hover:bg-yellow-600 text-black">
        Entradas
      </button>
    </div>
  </nav>

  <!-- Hero Section -->
    <section class="relative h-screen bg-cover bg-center flex items-center justify-start px-16"
    style="background-image: url('https://static.nationalgeographicla.com/files/styles/image_3200/public/stan-t-rex-1273195350.jpg?w=1900&h=1267');">

    <!-- Overlay oscuro -->
    <div class="absolute inset-0 bg-black bg-opacity-80"></div>

    <!-- Contenido -->
    <div class="relative max-w-2xl mt-20 text-white z-10">
        <p class="inline-block border border-yellow-500 text-yellow-500 tracking-wider mb-3 px-2 py-0.5
        hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm">
        BIENVENIDO
        </p>

        <h1 class="text-7xl font-serif leading-tight mb-6">Explora el origen del tiempo</h1>
        <p class="text-gray-400 mb-8">
        Una colección excepcional de exhibiciones prehistóricas que te transportará
        a través de millones de años de historia natural.
        </p>

        <div class="flex gap-4">
        <button class="bg-yellow-600 font-serif hover:bg-yellow-500 text-black font-medium px-6 py-3 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
            Explorar Colección →
        </button>
        <button class="border border-yellow-500 px-6 py-3 font-serif hover:bg-yellow-500 hover:text-black font-medium hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
            Restaurante
        </button>
        </div>
    </div>

    </section>

    <section class="bg-[#0a0a0a] py-20">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center text-gray-200 max-w-5xl mx-auto">

        <!-- Bloque 1 -->
        <div class="group bg-[#111] p-6 rounded-2xl transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_10px_25px_rgba(234,179,8,0.3)]">
        <div class="w-16 h-16 mx-auto flex items-center justify-center rounded-full bg-[#1a1a1a] mb-5 transition-transform duration-700 group-hover:rotate-[360deg]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#eab308" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        </div>
        <h2 class="text-5xl font-semibold text-yellow-600">50.000+</h2>
        <p class="text-gray-400 mt-1">Visitantes Anuales</p>
        </div>

        <!-- Bloque 2 -->
        <div class="group bg-[#111] p-6 rounded-2xl transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_10px_25px_rgba(234,179,8,0.3)]">
        <div class="w-16 h-16 mx-auto flex items-center justify-center rounded-full bg-[#1a1a1a] mb-5 transition-transform duration-700 group-hover:rotate-[360deg]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#eab308" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456Z" />
            </svg>
        </div>
        <h2 class="text-5xl font-semibold text-yellow-600">200+</h2>
        <p class="text-gray-400 mt-1">Exhibiciones</p>
        </div>

        <!-- Bloque 3 -->
        <div class="group bg-[#111] p-6 rounded-2xl transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_10px_25px_rgba(234,179,8,0.3)]">
        <div class="w-16 h-16 mx-auto flex items-center justify-center rounded-full bg-[#1a1a1a] mb-5 transition-transform duration-700 group-hover:rotate-[360deg]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#eab308" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
            </svg>
        </div>
        <h2 class="text-5xl font-semibold text-yellow-600">120+</h2>
        <p class="text-gray-400 mt-1">Especies Únicas</p>
        </div>
        
    </div>
    </section>

<section class="bg-[#070707] py-20">
  <div class="max-w-6xl mx-auto px-4 text-left mb-16">
    <!-- Título superior estilo BIENVENIDO -->
    <p class="inline-block border border-yellow-500 text-yellow-500 tracking-wider mb-3 px-2 py-0.5
      hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm uppercase">
      COLECCIÓN
    </p>

    <h2 class="text-5xl md:text-6xl font-serif text-g                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ray-100 mt-3 mb-4">Exhibiciones Destacadas</h2>
    <p class="text-gray-400 max-w-2xl">
      Descubre las piezas más extraordinarias de nuestra colección prehistórica.
    </p>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-6xl mx-auto px-4">
    
    <!-- Tarjeta 1 -->
    <div class="bg-[#111] rounded-2xl overflow-hidden border border-[#2a2a2a] hover:border-yellow-600 transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_10px_25px_rgba(234,179,8,0.2)]">
      <div class="overflow-hidden">
        <img src="https://ca-times.brightspotcdn.com/dims4/default/068a308/2147483647/strip/true/crop/5616x3744+0+0/resize/1200x800!/quality/75/?url=https%3A%2F%2Fcalifornia-times-brightspot.s3.amazonaws.com%2F3a%2F46%2Fe50c35095e221dfbb560e17a2408%2Fac6bff901c314860beb5205a1ec3e43c" class="w-full h-64 object-cover transition-transform duration-700 hover:scale-105" alt="Triceratops">
      </div>
      <div class="p-6 text-left">
        <span class="text-yellow-500 uppercase text-sm tracking-widest font-normal">Dinosaurios</span>
        <h3 class="text-2xl font-normal text-gray-100 mt-2 mb-2 font-serif">Fósil de Triceratops</h3>
        <p class="text-gray-400 text-sm">
          Impresionante ejemplar de Triceratops horridus del periodo Cretácico tardío. Esta pieza muestra su icónico cuerno frontal y su escudo óseo protector.
        </p>
      </div>
    </div>

    <!-- Tarjeta 2 -->
    <div class="bg-[#111] rounded-2xl overflow-hidden border border-[#2a2a2a] hover:border-yellow-600 transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_10px_25px_rgba(234,179,8,0.2)]">
      <div class="overflow-hidden">
        <img src="https://www.upf.edu/documents/10193/263765247/157098479.jpg/eaabe29d-85ac-f093-f5c7-b594d5feece1" class="w-full h-64 object-cover transition-transform duration-700 hover:scale-105" alt="Tiranosaurio">
      </div>
      <div class="p-6 text-left">
        <span class="text-yellow-500 uppercase text-sm tracking-widest font-normal">Dinosaurios</span>
        <h3 class="text-2xl font-normal text-gray-100 mt-2 mb-2 font-serif">Esqueleto de Tiranosaurio</h3>
        <p class="text-gray-400 text-sm">
          Uno de los depredadores más temibles que jamás caminaron sobre la Tierra. Este esqueleto de Tyrannosaurus rex conserva su estructura casi completa.
        </p>
      </div>
    </div>

    <!-- Tarjeta 3 -->
    <div class="bg-[#111] rounded-2xl overflow-hidden border border-[#2a2a2a] hover:border-yellow-600 transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_10px_25px_rgba(234,179,8,0.2)]">
      <div class="overflow-hidden">
        <img src="https://www.65ymas.com/uploads/s1/22/71/12/6/europapress-7058880-presentacion-esqueleto-fosilizado-mamut-lanudo-museo-ciencia-cosmocaixa-27.jpeg" class="w-full h-64 object-cover transition-transform duration-700 hover:scale-105" alt="Mamut Lanudo">
      </div>
      <div class="p-6 text-left">
        <span class="text-yellow-500 uppercase text-sm tracking-widest font-normal">Mamíferos Extintos</span>
        <h3 class="text-2xl font-normal text-gray-100 mt-2 mb-2 font-serif">Mamut Lanudo Completo</h3>
        <p class="text-gray-400 text-sm">
          Mamut lanudo adulto perfectamente conservado del Pleistoceno. Su tamaño y colmillos curvados muestran la grandeza de estas criaturas.
        </p>
      </div>
    </div>

  </div>

  <div class="max-w-6xl mx-auto px-4 text-left mb-16 mt-8">
    <a href="#exhibiciones" class="inline-block border border-yellow-500 text-white tracking-wider mb-3 px-2 py-0.5
    hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm">
      Ver Colección Completa
    </a>
  </div>

</section>

<!-- Sección Próximos Eventos -->
<section class="bg-[#050505] py-20">
  <div class="max-w-6xl mx-auto px-4 text-left mb-16">
    <!-- Título -->
    <p class="inline-block border border-yellow-500 text-yellow-500 tracking-wider mb-3 px-2 py-0.5
      hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm uppercase">
      EVENTOS
    </p>

    <h2 class="text-5xl md:text-6xl font-serif text-gray-100 mt-3 mb-4">
      Próximos Eventos
    </h2>
    <p class="text-gray-400 max-w-2xl">
      Vive experiencias únicas que te conectan con la historia y el misterio de la prehistoria.
    </p>
  </div>

  <!-- Tarjetas tipo horizontal -->
  <div class="flex flex-col gap-10 max-w-6xl mx-auto px-4">

    <!-- Tarjeta 1 -->
    <div class="bg-[#0a0a0a] rounded-2xl overflow-hidden border border-[#2a2a2a] flex flex-col md:flex-row 
                hover:border-yellow-600 transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_10px_25px_rgba(234,179,8,0.2)]">
      
      <!-- Imagen izquierda -->
      <div class="md:w-1/2 overflow-hidden">
        <img src="https://images.unsplash.com/photo-1609010909135-dad6c9484e9d"
             class="w-full h-64 md:h-full object-cover transition-transform duration-700 hover:scale-105"
             alt="Noche de Dinosaurios">
      </div>

      <!-- Contenido derecha -->
      <div class="md:w-1/2 p-8 text-left flex flex-col justify-center">
        <span class="text-yellow-500 uppercase text-sm tracking-widest font-normal">15 de Noviembre, 2025</span>
        <h3 class="text-2xl font-normal text-gray-100 mt-2 mb-2 font-serif">Noche de los Dinosaurios</h3>
        <p class="text-gray-400 text-sm mb-4">
          Una experiencia nocturna con fósiles iluminados, recorridos guiados por paleontólogos y actividades interactivas.
        </p>
        <a href="#" class="inline-block border border-yellow-500 text-white tracking-wider px-3 py-1
          hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm w-fit">
          Reservar Entrada
        </a>
      </div>
    </div>

    <!-- Tarjeta 2 -->
    <div class="bg-[#0a0a0a] rounded-2xl overflow-hidden border border-[#2a2a2a] flex flex-col md:flex-row
                hover:border-yellow-600 transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_10px_25px_rgba(234,179,8,0.2)]">
      
      <!-- Imagen izquierda -->
      <div class="md:w-1/2 overflow-hidden">
        <img src="https://images.unsplash.com/photo-1570126618953-d437176e8c79"
             class="w-full h-64 md:h-full object-cover transition-transform duration-700 hover:scale-105"
             alt="Tour Virtual Cuevas">
      </div>

      <!-- Contenido derecha -->
      <div class="md:w-1/2 p-8 text-left flex flex-col justify-center">
        <span class="text-yellow-500 uppercase text-sm tracking-widest font-normal">22 de Noviembre, 2025</span>
        <h3 class="text-2xl font-normal text-gray-100 mt-2 mb-2 font-serif">Tour Virtual de Cuevas Prehistóricas</h3>
        <p class="text-gray-400 text-sm mb-4">
          Explora cuevas ancestrales en un recorrido 360° y aprende sobre el arte rupestre en un taller interactivo.
        </p>
        <a href="#" class="inline-block border border-yellow-500 text-white tracking-wider px-3 py-1
          hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm w-fit">
          Reservar Entrada
        </a>
      </div>
    </div>
  </div>

  <!-- Botón final -->
  <div class="max-w-6xl mx-auto px-4 text-left mb-16 mt-12">
    <a href="#eventos" class="inline-block border border-yellow-500 text-white tracking-wider mb-3 px-3 py-1
    hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm">
      Ver Todos los Eventos
    </a>
  </div>
</section>


  <footer 
    class="text-center">@ 2025 Museo Infinito. Todos los derechos reservados.
  </footer>

</body>
</html>
