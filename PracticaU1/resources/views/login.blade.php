<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
  <div class="bg-gray-200 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md">
      <h2 class="text-2xl font-bold text-gray-900 mb-4 text-center">Iniciar sesión</h2>
      <form method="POST" action="{{route('login')}}">
        @csrf
        <div class="mb-4">
          <label for="email" class="block text-gray-700 font-bold mb-2">Correo electrónico</label>
          <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-pink-500" placeholder="Correo electrónico" required>
        </div>
        <div class="mb-4">
          <label for="password" class="block text-gray-700 font-bold mb-2">Contraseña</label>
          <input type="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-pink-500" placeholder="Contraseña" required>
        </div>
        <button type="submit" class="w-full bg-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none hover:bg-gray-600">Iniciar sesión</button>
      </form>
      <p class="text-gray-700 text-center mt-4">¿No tienes una cuenta? <a href="{{route('registrar-cuenta')}}" class="text-blue-500">Regístrate aquí</a></p>
    </div>
  </div>
</body>
</html>
