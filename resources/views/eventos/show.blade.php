@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-neutral-900 p-6">
    <div class="max-w-6xl mx-auto">
        <div class="bg-neutral-800 rounded-lg shadow-xl overflow-hidden">
            <!-- Header -->
            <div class="bg-neutral-900 border-b border-neutral-700 px-6 py-4">
                <div class="flex justify-between items-center">
                    <h4 class="text-xl font-semibold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        Detalles del Evento
                    </h4>
                    <div class="flex space-x-2">
                        <a href="{{ route('eventos.edit', $evento->id) }}" 
                           class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-4 py-2 rounded-lg transition duration-200 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Editar
                        </a>
                        <a href="{{ route('eventos.index') }}" 
                           class="bg-neutral-700 hover:bg-neutral-600 text-white font-semibold px-4 py-2 rounded-lg transition duration-200 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Volver
                        </a>
                    </div>
                </div>
            </div>

            <!-- Body -->
            <div class="p-6">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Imagen del Evento -->
                    <div class="lg:col-span-1">
                        <div class="bg-neutral-900 border border-neutral-700 rounded-lg overflow-hidden">
                            @if($evento->ruta_imagen)
                                <img src="{{ asset('storage/' . $evento->ruta_imagen) }}" 
                                    alt="{{ $evento->nombre }}" 
                                    class="w-full h-64 object-cover">
                            @else
                                <div class="w-full h-64 bg-neutral-700 flex items-center justify-center">
                                    <svg class="w-24 h-24 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <div class="mt-4 bg-neutral-900 border border-neutral-700 rounded-lg p-4 text-center">
                            <label class="text-gray-400 text-sm block mb-2">ESTADO DEL EVENTO</label>
                            @if($evento->estado == 'activo')
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-500 text-white">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Activo
                                </span>
                            @elseif($evento->estado == 'inactivo')
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-gray-500 text-white">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8 7a1 1 0 00-1 1v4a1 1 0 001 1h4a1 1 0 001-1V8a1 1 0 00-1-1H8z" clip-rule="evenodd"/>
                                    </svg>
                                    Inactivo
                                </span>
                            @else
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-red-500 text-white">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                    Cancelado
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="mb-6">
                            <h2 class="text-3xl font-bold text-white mb-3">{{ $evento->nombre }}</h2>
                            <p class="text-gray-300 leading-relaxed">{{ $evento->descripcion }}</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-4">
                                <label class="text-gray-400 text-sm flex items-center mb-2">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    FECHA
                                </label>
                                <p class="text-white text-lg font-semibold">{{ $evento->fecha->format('d/m/Y') }}</p>
                                <p class="text-gray-400 text-sm">{{ $evento->fecha->translatedFormat('l, j F Y') }}</p>
                            </div>

                            <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-4">
                                <label class="text-gray-400 text-sm flex items-center mb-2">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    HORA
                                </label>
                                <p class="text-white text-lg font-semibold">{{ \Carbon\Carbon::parse($evento->hora)->format('H:i') }}</p>
                                <p class="text-gray-400 text-sm">{{ \Carbon\Carbon::parse($evento->hora)->format('h:i A') }}</p>
                            </div>

                            <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-4">
                                <label class="text-gray-400 text-sm flex items-center mb-2">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    UBICACIÓN
                                </label>
                                <p class="text-white text-lg font-semibold">{{ ucfirst(str_replace('_', ' ', $evento->ubicacion)) }}</p>
                            </div>

                            <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-4">
                                <label class="text-gray-400 text-sm flex items-center mb-2">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                                    </svg>
                                    CATEGORÍA
                                </label>
                                @php
                                    $categoriaColors = [
                                        'concierto' => 'bg-purple-500 bg-opacity-20 text-purple-400 border-purple-500',
                                        'exposicion' => 'bg-pink-500 bg-opacity-20 text-pink-400 border-pink-500',
                                        'taller' => 'bg-green-500 bg-opacity-20 text-green-400 border-green-500',
                                        'conferencia' => 'bg-orange-500 bg-opacity-20 text-orange-400 border-orange-500'
                                    ];
                                @endphp
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold border {{ $categoriaColors[$evento->categoria] ?? 'bg-gray-500 bg-opacity-20 text-gray-400 border-gray-500' }}">
                                    {{ ucfirst($evento->categoria) }}
                                </span>
                            </div>

                            <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-4">
                                <label class="text-gray-400 text-sm flex items-center mb-2">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    PRECIO
                                </label>
                                <p class="text-yellow-500 text-2xl font-bold">S/ {{ number_format($evento->precio, 2) }}</p>
                            </div>

                            <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-4">
                                <label class="text-gray-400 text-sm flex items-center mb-2">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                    </svg>
                                    CAPACIDAD
                                </label>
                                <p class="text-white text-lg font-semibold">{{ $evento->capacidad }} personas</p>
                            </div>
                        </div>

                        <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-6">
                            <h3 class="text-white font-semibold mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                                Estadísticas
                            </h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-blue-500 mb-1">{{ $evento->entradas->count() }}</div>
                                    <div class="text-gray-400 text-sm">Entradas Registradas</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-green-500 mb-1">
                                        {{ $evento->capacidad - $evento->entradas->count() }}
                                    </div>
                                    <div class="text-gray-400 text-sm">Disponibles</div>
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                @php
                                    $porcentaje = $evento->capacidad > 0 ? ($evento->entradas->count() / $evento->capacidad) * 100 : 0;
                                @endphp
                                <div class="flex justify-between text-sm text-gray-400 mb-1">
                                    <span>Ocupación</span>
                                    <span>{{ number_format($porcentaje, 1) }}%</span>
                                </div>
                                <div class="w-full bg-neutral-700 rounded-full h-2">
                                    <div class="bg-yellow-500 h-2 rounded-full transition-all duration-300" style="width: {{ $porcentaje }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center mt-8 pt-6 border-t border-neutral-700">
                    <button type="button" 
                            onclick="confirmDelete({{ $evento->id }})"
                            class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Eliminar Evento
                    </button>
                    <a href="{{ route('eventos.edit', $evento->id) }}" 
                        class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-6 py-3 rounded-lg transition duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Editar Evento
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="delete-form-{{ $evento->id }}" 
    action="{{ route('eventos.destroy', $evento->id) }}" 
    method="POST" 
    class="hidden">
    @csrf
    @method('DELETE')
</form>

<script>
function confirmDelete(eventoId) {
    if (confirm('¿Estás seguro de que deseas eliminar este evento? Esta acción no se puede deshacer.')) {
        document.getElementById('delete-form-' + eventoId).submit();
    }
}
</script>
@endsection