<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de usuarios</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
  <div class="bg-gray-200 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md">
      <h2 class="text-2xl font-bold text-gray-900 mb-4 text-center">Registro de Usuario</h2>
      <form method="POST" action="{{route('registrar-cuenta')}}">
        @csrf
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Nombre</label>
          <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-pink-500" placeholder="Nombre" required>
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700 font-bold mb-2">Correo electrónico</label>
          <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-pink-500" placeholder="Correo electrónico" required>
        </div>
        <div class="mb-4">
          <label for="password" class="block text-gray-700 font-bold mb-2">Contraseña</label>
          <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-pink-500" placeholder="Contraseña" required>
        </div>
        <div class="mb-4">
          <label for="confirm-password" class="block text-gray-700 font-bold mb-2">Confirmar contraseña</label>
          <input type="password" id="confirm-password" name="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-pink-500" placeholder="Confirmar contraseña" required>
        </div>
        <button type="submit" class="w-full bg-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none hover:bg-gray-600">Registrarse</button>
      </form>
      <p class="text-gray-700 text-center mt-4">¿Ya tienes una cuenta? <a href="{{route('login')}}"class="text-blue-500">Inicia sesión aquí</a></p>

      @if ($errors->any())
      <p class="font-bold text-red-500">{{ $errors->first() }}</p>
      @endif

    </div>
  </div>
</body>
</html>
