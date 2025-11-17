@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-neutral-900 p-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-white flex items-center">
                <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Gestión de Eventos
            </h2>
            <a href="{{ route('eventos.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-4 py-2 rounded-lg transition duration-200 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nuevo Evento
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-500 text-white px-4 py-3 rounded-lg mb-4 flex justify-between items-center">
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="text-white hover:text-gray-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-500 text-white px-4 py-3 rounded-lg mb-4 flex justify-between items-center">
                <span>{{ session('error') }}</span>
                <button onclick="this.parentElement.remove()" class="text-white hover:text-gray-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>
        @endif

        <div class="bg-neutral-800 rounded-lg shadow-xl overflow-hidden">
            <div class="p-4 border-b border-neutral-700">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" id="searchInput" 
                        class="bg-neutral-900 border border-neutral-600 text-white rounded-lg w-full pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                        placeholder="Buscar eventos por nombre, categoría o ubicación...">
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-neutral-900 border-b border-neutral-700">
                        <tr>
                            <th class="text-left px-6 py-4 text-yellow-500 font-semibold">Evento</th>
                            <th class="text-left px-6 py-4 text-yellow-500 font-semibold">Fecha/Hora</th>
                            <th class="text-left px-6 py-4 text-yellow-500 font-semibold">Ubicación</th>
                            <th class="text-left px-6 py-4 text-yellow-500 font-semibold">Categoría</th>
                            <th class="text-left px-6 py-4 text-yellow-500 font-semibold">Precio</th>
                            <th class="text-left px-6 py-4 text-yellow-500 font-semibold">Capacidad</th>
                            <th class="text-left px-6 py-4 text-yellow-500 font-semibold">Estado</th>
                            <th class="text-right px-6 py-4 text-yellow-500 font-semibold">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="eventTableBody" class="divide-y divide-neutral-700">
                        @forelse($eventos as $evento)
                        <tr class="hover:bg-neutral-700 transition duration-150">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if($evento->ruta_imagen)
                                        <img src="{{ asset('storage/' . $evento->ruta_imagen) }}" 
                                            alt="{{ $evento->nombre }}" 
                                            class="w-12 h-12 rounded-lg object-cover mr-3">
                                    @else
                                        <div class="w-12 h-12 bg-neutral-600 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="text-white font-semibold">{{ $evento->nombre }}</p>
                                        <p class="text-gray-400 text-sm truncate max-w-xs">{{ Str::limit($evento->descripcion, 50) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-white">
                                    <div class="flex items-center mb-1">
                                        <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span class="text-sm">{{ $evento->fecha->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span class="text-sm">{{ \Carbon\Carbon::parse($evento->hora)->format('H:i') }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-blue-500 bg-opacity-20 text-blue-400">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    {{ ucfirst(str_replace('_', ' ', $evento->ubicacion)) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $categoriaColors = [
                                        'concierto' => 'bg-purple-500 bg-opacity-20 text-purple-400',
                                        'exposicion' => 'bg-pink-500 bg-opacity-20 text-pink-400',
                                        'taller' => 'bg-green-500 bg-opacity-20 text-green-400',
                                        'conferencia' => 'bg-orange-500 bg-opacity-20 text-orange-400'
                                    ];
                                @endphp
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium {{ $categoriaColors[$evento->categoria] ?? 'bg-gray-500 bg-opacity-20 text-gray-400' }}">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ ucfirst($evento->categoria) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-white font-semibold">
                                S/ {{ number_format($evento->precio, 2) }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center text-gray-400">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                    </svg>
                                    <span class="text-sm">{{ $evento->capacidad }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($evento->estado == 'activo')
                                    <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-green-500 text-white">
                                        Activo
                                    </span>
                                @elseif($evento->estado == 'inactivo')
                                    <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-gray-500 text-white">
                                        Inactivo
                                    </span>
                                @else
                                    <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-red-500 text-white">
                                        Cancelado
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('eventos.show', $evento->id) }}" 
                                        class="text-blue-400 hover:text-blue-300 transition duration-150"
                                        title="Ver detalles">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('eventos.edit', $evento->id) }}" 
                                        class="text-yellow-400 hover:text-yellow-300 transition duration-150"
                                        title="Editar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <button onclick="confirmDelete({{ $evento->id }})" 
                                            class="text-red-400 hover:text-red-300 transition duration-150"
                                            title="Eliminar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                    <form id="delete-form-{{ $evento->id }}" 
                                        action="{{ route('eventos.destroy', $evento->id) }}" 
                                        method="POST" 
                                        class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center">
                                <svg class="w-16 h-16 mx-auto text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <p class="text-gray-400">No hay eventos registrados</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($eventos->hasPages())
            <div class="px-6 py-4 border-t border-neutral-700">
                {{ $eventos->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

<script>
function confirmDelete(eventoId) {
    if (confirm('¿Estás seguro de que deseas eliminar este evento?')) {
        document.getElementById('delete-form-' + eventoId).submit();
    }
}

document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const rows = document.querySelectorAll('#eventTableBody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchValue) ? '' : 'none';
    });
});
</script>
@endsection
