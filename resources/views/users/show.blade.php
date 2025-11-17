@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-neutral-900 p-6">
    <div class="max-w-4xl mx-auto">
        <div class="bg-neutral-800 rounded-lg shadow-xl overflow-hidden">
            <div class="bg-neutral-900 border-b border-neutral-700 px-6 py-4">
                <div class="flex justify-between items-center">
                    <h4 class="text-xl font-semibold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        Detalles del Usuario
                    </h4>
                    <div class="flex space-x-2">
                        <a href="{{ route('users.edit', $user->id) }}" 
                            class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-4 py-2 rounded-lg transition duration-200 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Editar
                        </a>
                        <a href="{{ route('users.index') }}" 
                            class="bg-neutral-700 hover:bg-neutral-600 text-white font-semibold px-4 py-2 rounded-lg transition duration-200 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Volver
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <div class="flex justify-center mb-8">
                    <div class="bg-yellow-500 bg-opacity-20 rounded-full p-8">
                        <svg class="w-24 h-24 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-4">
                        <label class="text-gray-400 text-sm flex items-center mb-2">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                            NOMBRE COMPLETO
                        </label>
                        <p class="text-white text-lg font-semibold">{{ $user->name }}</p>
                    </div>

                    <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-4">
                        <label class="text-gray-400 text-sm flex items-center mb-2">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            CORREO ELECTRÓNICO
                        </label>
                        <p class="text-white text-lg font-semibold break-all">{{ $user->email }}</p>
                    </div>

                    <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-4">
                        <label class="text-gray-400 text-sm flex items-center mb-2">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            ROL
                        </label>
                        @if($user->rol == 'admin')
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-yellow-500 text-black">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Administrador
                            </span>
                        @else
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-gray-600 text-white">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                                Usuario
                            </span>
                        @endif
                    </div>

                    <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-4">
                        <label class="text-gray-400 text-sm flex items-center mb-2">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            ESTADO
                        </label>
                        @if($user->estado == 'activo')
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-500 text-white">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Activo
                            </span>
                        @else
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-red-500 text-white">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                Inactivo
                            </span>
                        @endif
                    </div>

                    <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-4">
                        <label class="text-gray-400 text-sm flex items-center mb-2">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            FECHA DE REGISTRO
                        </label>
                        <p class="text-white text-lg font-semibold">
                            {{ $user->created_at ? $user->created_at->format('d/m/Y H:i:s') : 'No disponible' }}
                        </p>
                    </div>

                    <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-4">
                        <label class="text-gray-400 text-sm flex items-center mb-2">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            ÚLTIMA ACTUALIZACIÓN
                        </label>
                        <p class="text-white text-lg font-semibold">
                            {{ $user->updated_at ? $user->updated_at->format('d/m/Y H:i:s') : 'No disponible' }}
                        </p>
                    </div>
                </div>

                <hr class="border-neutral-700 my-8">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-6 text-center">
                        <svg class="w-12 h-12 text-yellow-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                        <label class="text-gray-400 text-sm block mb-2">TARJETAS ASIGNADAS</label>
                        <p class="text-white text-3xl font-bold">{{ $user->tarjetas->count() }}</p>
                    </div>

                    <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-6 text-center">
                        <svg class="w-12 h-12 text-blue-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        <label class="text-gray-400 text-sm block mb-2">ENTRADAS REGISTRADAS</label>
                        <p class="text-white text-3xl font-bold">{{ $user->entradas->count() }}</p>
                    </div>

                    <div class="bg-neutral-900 border border-neutral-700 rounded-lg p-6 text-center">
                        <svg class="w-12 h-12 text-green-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <label class="text-gray-400 text-sm block mb-2">RESERVAS ACTIVAS</label>
                        <p class="text-white text-3xl font-bold">{{ $user->reservas->count() }}</p>
                    </div>
                </div>

                <div class="flex justify-between items-center mt-8 pt-6 border-t border-neutral-700">
                    <button type="button" 
                            onclick="confirmDelete({{ $user->id }})"
                            class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Eliminar Usuario
                    </button>
                    <a href="{{ route('user.edit', $user->id) }}" 
                        class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-6 py-3 rounded-lg transition duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Editar Usuario
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="delete-form-{{ $user->id }}" 
    action="{{ route('user.destroy', $user->id) }}" 
    method="POST" 
    class="hidden">
    @csrf
    @method('DELETE')
</form>

<script>
function confirmDelete(userId) {
    if (confirm('¿Estás seguro de que deseas eliminar este usuario? Esta acción no se puede deshacer.')) {
        document.getElementById('delete-form-' + userId).submit();
    }
}
</script>
@endsection