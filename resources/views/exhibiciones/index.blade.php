
{{-- resources/views/exhibiciones.blade.php --}}
@extends('layouts.app')

<!-- HERO -->
<section 
    class="w-full h-[70vh] bg-cover bg-center flex items-center"
    style="background-image: url('https://images.unsplash.com/photo-1675882767533-ec7bdf8b2210?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxkaW5vc2F1ciUyMGZvc3NpbHMlMjBtdXNldW18ZW58MXx8fHwxNzYxMDUyNTA2fDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral');">
    
    <div class="bg-black bg-opacity-80 w-full h-full flex flex-col justify-center px-6 md:px-16">
        
        <div class="relative max-w-2xl mt-20 text-white z-10">
        <p class="inline-block border border-[#c9a961]/50 text-[#c9a961] mb-4 px-5 py-0.5
        hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm tracking-[0.25rem]">
        COLECCIÓN
        </p>

        <h1 class="text-7xl font-serif leading-tight mb-6">
            Exhibiciones
        </h1>

        <p class="text-gray-400 mb-8 text-lg">
            Explora nuestra excepcional colección de fósiles, arte rupestre y artefactos 
            que cuentan la historia de la vida en la Tierra.
        </p>

    </div>
</section>


<!-- BUSCADOR -->
<section class="bg-[#0a0a0a] text-white px-6 md:px-16 py-8">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

        <!-- BUSCADOR -->
        <div class="w-full md:w-auto">
            <div class="flex items-center bg-neutral-900 border border-[#c9a961]/50 rounded-0 px-3 py-1 w-full md:w-80">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-4.35-4.35m1.15-5.4A7.5 7.5 0 1110.5 3a7.5 7.5 0 017.3 8.25z"/>
                </svg>
                <input 
                    type="text"
                    class="w-full bg-transparent focus:outline-none ml-3 text-gray-300"
                    placeholder="Buscar exhibiciones..."
                >
            </div>
        </div>

        <!-- BOTONES DE FILTRO -->
        <div class="flex flex-wrap gap-2 md:justify-end">

            <button class="px-3 py-1 bg-[#c9a961] text-black font-semibold">
                Todas
            </button>

            <button class="px-3 py-1 border border-[#c9a961]/50 hover:bg-neutral-800">
                Dinosaurios
            </button>

            <button class="px-3 py-1 border border-[#c9a961]/50 hover:bg-neutral-800">
                Mamíferos Extintos
            </button>

            <button class="px-3 py-1 border border-[#c9a961]/50 hover:bg-neutral-800">
                Arte Rupestre
            </button>

            <button class="px-3 py-1 border border-[#c9a961]/50 hover:bg-neutral-800">
                Herramientas Antiguas
            </button>

        </div>

    </div>

</section>
