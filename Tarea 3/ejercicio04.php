<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Adivinanzas</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
            margin: 50px;
        }

        h1 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        label {
            margin-bottom: 10px;
            font-size: 18px;
            color: #555;
        }

        input {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
            width: 200px;
            text-align: center;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Juego de Adivinanzas</h1>

    <?php
        session_start();
        if (!isset($_SESSION['respuesta'])) {
            $_SESSION['respuesta'] = rand(1, 10);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $intent = $_POST["intent"];

            if ($intent == $_SESSION['respuesta']) {
                echo "<p style='color: green;'>¡Felicitaciones! ¡Adivinaste el número!</p>";
                unset($_SESSION['respuesta']);
            } else {
                echo "<p style='color: red;'>Intenta de nuevo. No has adivinado el número.</p>";
            }
        }
    ?>

    <form method="post" action="">
        <label for="intent">Adivina el número (entre 1 y 10):</label>
        <input type="number" name="intent" id="intent" min="1" max="10" required>
        <button type="submit">Adivinar</button>
    </form>

    <script>
        // Puedes agregar funciones o lógica adicional en JavaScript si lo deseas
    </script>
</body>
</html>
