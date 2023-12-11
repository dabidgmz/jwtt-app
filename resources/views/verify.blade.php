<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #FFD359;
        }

        p {
            margin-bottom: 20px;
        }

        a {
            color: #FFD359;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #888;
            font-size: 12px;
        }
    </style>
    <title>Verificación de Cuenta</title>
</head>
<body>
    <div class="container">
        <h1>Hola {{ $user->name }},</h1>

        <p>¡Gracias por registrarte en DAVAC!</p>

        <p>Para completar la verificación, haz clic en el siguiente enlace:</p>
        <p><a href="{{ url('/bienvenida/' . $user->id) }}" style="background-color: #007bff; color: #fff; padding: 10px; border-radius: 5px; text-decoration: none;">Verificar</a></p>

        <p>¡Gracias!</p>
    </div>

    <div class="footer">
        Este mensaje ha sido enviado automáticamente. Por favor, no respondas a este correo.
    </div>
</body>
</html>
>
