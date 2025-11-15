@extends('layouts.app')

<section 
    class="w-full h-[80vh] bg-cover bg-center flex items-center"
    style="background-image: url('https://images.unsplash.com/photo-1703797967062-70681a18f71c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxlbGVnYW50JTIwZmluZSUyMGRpbmluZ3xlbnwxfHx8fDE3NjEwMzIzMTF8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral');">
    
    <div class="bg-black bg-opacity-80 w-full h-full flex flex-col justify-center px-6 md:px-16">

   <!-- Contenido -->
    <div class="relative max-w-2xl mt-20 text-white z-10">
        <p class="inline-block border border-[#c9a961]/50 text-[#c9a961] mb-4 px-5 py-0.5
        hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm tracking-[0.25rem]">
        GASTRONOMíA
        </p>

        <h1 class="text-7xl font-serif leading-tight mb-6">Restaurante del Museo</h1>
        <p class="text-gray-400 mb-8 text-lg">
        Una experiencia culinaria excepcional que fusiona historia y sabor en
        un ambiente único.
        </p>

    <a href="{{ route('exhibiciones.index') }}"
      class="bg-[#c9a961] font-serif hover:bg-[#c9a961]/70 text-black font-medium px-6 py-3 hover:-translate-y-1 hover:shadow-lg transition-all duration-300 inline-block">
      Reservar Mesa
    </a>
    </div>

</section>

<!-- INFO CARDS -->
<section class="py-16 px-4 bg-[#0a0908] border-b border-[#c9a961]/10">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Horarios -->
        <div class="text-center border border-[#c9a961]/20 bg-[#1a1614] p-8 rounded-sm">
            <h3 class="text-xl text-[#f2f0ed] mb-2">Horarios</h3>
            <p class="text-[#a39d96] text-sm">
                Almuerzo: 12:00 - 15:00 <br>
                Cena: 19:00 - 22:30 <br>
                Cerrado los lunes
            </p>
        </div>

        <!-- Chef -->
        <div class="text-center border border-[#c9a961]/20 bg-[#1a1614] p-8 rounded-sm">
            <h3 class="text-xl text-[#f2f0ed] mb-2">Chef Principal</h3>
            <p class="text-[#a39d96] text-sm">
                Chef María Sánchez <br>
                2 Estrellas Michelin <br>
                Especialista en cocina histórica
            </p>
        </div>

        <!-- Ubicación -->
        <div class="text-center border border-[#c9a961]/20 bg-[#1a1614] p-8 rounded-sm">
            <h3 class="text-xl text-[#f2f0ed] mb-2">Ubicación</h3>
            <p class="text-[#a39d96] text-sm">
                Dentro del Museo Infinito <br>
                Planta Baja, Ala Este <br>
                Vista al jardín jurásico
            </p>
        </div>

    </div>
</section>


</section>