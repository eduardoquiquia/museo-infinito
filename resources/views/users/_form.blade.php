<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Nombre -->
    <div class="md:col-span-2">
        <label for="name" class="block text-white font-medium mb-2">
            <svg class="w-5 h-5 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
            </svg>
            Nombre Completo <span class="text-red-500">*</span>
        </label>
        <input type="text" 
            class="w-full bg-neutral-900 border @error('name') border-red-500 @else border-neutral-600 @enderror text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500" 
            id="name" 
            name="name" 
            value="{{ old('name', $user->name ?? '') }}" 
            required
            placeholder="Ingrese el nombre completo">
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Email -->
    <div class="md:col-span-2">
        <label for="email" class="block text-white font-medium mb-2">
            <svg class="w-5 h-5 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            Correo Electrónico <span class="text-red-500">*</span>
        </label>
        <input type="email" 
            class="w-full bg-neutral-900 border @error('email') border-red-500 @else border-neutral-600 @enderror text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500" 
            id="email" 
            name="email" 
            value="{{ old('email', $user->email ?? '') }}" 
            required
            placeholder="ejemplo@correo.com">
        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Contraseña -->
    <div>
        <label for="password" class="block text-white font-medium mb-2">
            <svg class="w-5 h-5 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
            Contraseña 
            @if(isset($user))
                <span class="text-gray-400 text-sm">(dejar en blanco para no cambiar)</span>
            @else
                <span class="text-red-500">*</span>
            @endif
        </label>
        <div class="relative">
            <input type="password" 
                class="w-full bg-neutral-900 border @error('password') border-red-500 @else border-neutral-600 @enderror text-white rounded-lg px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                id="password" 
                name="password"
                {{ !isset($user) ? 'required' : '' }}
                placeholder="Mínimo 6 caracteres">
            <button type="button" 
                    onclick="togglePassword('password')" 
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-white">
                <svg class="w-5 h-5" id="password-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
            </button>
        </div>
        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Confirmar Contraseña -->
    <div>
        <label for="password_confirmation" class="block text-white font-medium mb-2">
            <svg class="w-5 h-5 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
            Confirmar Contraseña
            @if(!isset($user))
                <span class="text-red-500">*</span>
            @endif
        </label>
        <div class="relative">
            <input type="password" 
                class="w-full bg-neutral-900 border border-neutral-600 text-white rounded-lg px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                id="password_confirmation" 
                name="password_confirmation"
                {{ !isset($user) ? 'required' : '' }}
                placeholder="Repita la contraseña">
            <button type="button" 
                    onclick="togglePassword('password_confirmation')" 
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-white">
                    <svg class="w-5 h-5" id="password_confirmation-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Rol -->
    <div>
        <label for="rol" class="block text-white font-medium mb-2">
            <svg class="w-5 h-5 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            Rol <span class="text-red-500">*</span>
        </label>
        <select class="w-full bg-neutral-900 border @error('rol') border-red-500 @else border-neutral-600 @enderror text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                id="rol" 
                name="rol" 
                required>
            <option value="">Seleccione un rol</option>
            <option value="usuario" {{ old('rol', $user->rol ?? '') == 'usuario' ? 'selected' : '' }}>
                Usuario
            </option>
            <option value="admin" {{ old('rol', $user->rol ?? '') == 'admin' ? 'selected' : '' }}>
                Administrador
            </option>
        </select>
        @error('rol')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Estado -->
    <div>
        <label for="estado" class="block text-white font-medium mb-2">
            <svg class="w-5 h-5 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Estado <span class="text-red-500">*</span>
        </label>
        <select class="w-full bg-neutral-900 border @error('estado') border-red-500 @else border-neutral-600 @enderror text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                id="estado" 
                name="estado" 
                required>
            <option value="">Seleccione un estado</option>
            <option value="activo" {{ old('estado', $user->estado ?? 'activo') == 'activo' ? 'selected' : '' }}>
                Activo
            </option>
            <option value="inactivo" {{ old('estado', $user->estado ?? '') == 'inactivo' ? 'selected' : '' }}>
                Inactivo
            </option>
        </select>
        @error('estado')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Botones -->
    <div class="md:col-span-2">
        <hr class="border-neutral-700 my-6">
        <div class="flex justify-end space-x-3">
            <a href="{{ route('users.index') }}" class="bg-neutral-700 hover:bg-neutral-600 text-white font-semibold px-6 py-2 rounded-lg transition duration-200">
                <svg class="w-5 h-5 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                Cancelar
            </a>
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-6 py-2 rounded-lg transition duration-200">
                <svg class="w-5 h-5 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                {{ $buttonText }}
            </button>
        </div>
    </div>
</div>

<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const icon = document.getElementById(fieldId + '-icon');
    
    if (field.type === 'password') {
        field.type = 'text';
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>';
    } else {
        field.type = 'password';
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>';
    }
}
</script>