<!DOCTYPE html>
<html>
<head>
    <title>Verificación de Cuenta</title>
</head>
<body>
    <p>Hola {{ $user->name }},</p>

    <p>Gracias por registrarte a DAVAC. Haz clic en el siguiente enlace para verificar tu cuenta:</p>

    <p><a href="{{ url('/verify/' . $user->id) }}">{{ url('/verify/' . $user->id) }}</a></p>

    <p>¡Gracias!</p>
</body>
</html>
