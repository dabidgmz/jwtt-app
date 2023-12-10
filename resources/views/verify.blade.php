<!-- resources/views/verify.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Verificación de Cuenta</title>
</head>
<body>
    <p>Hola {{ $user->name }},</p>

    <p>Gracias por registrarte a DAVAC. Haz clic en el siguiente enlace para verificar tu cuenta:</p>

    {{-- Agrega un parámetro "redirect" a la URL --}}
    <p><a href="{{ url('/verify/' . $user->id . '?redirect=bienvenida') }}">{{ url('/verify/' . $user->id . '?redirect=bienvenida') }}</a></p>

    <p>¡Gracias!</p>
</body>
</html>
