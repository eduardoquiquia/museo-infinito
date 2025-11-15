@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-neutral-900 p-6">
    <div class="max-w-4xl mx-auto">
        <div class="bg-neutral-800 rounded-lg shadow-xl overflow-hidden">
            <div class="bg-neutral-900 border-b border-neutral-700 px-6 py-4">
                <div class="flex justify-between items-center">
                    <h4 class="text-xl font-semibold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                        </svg>
                        Crear Nuevo Usuario
                    </h4>
                    <a href="{{ route('usuarios.index') }}" class="text-gray-400 hover:text-white transition duration-150">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="p-6">
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

                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf
                    @include('usuarios._form', ['buttonText' => 'Crear Usuario'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
