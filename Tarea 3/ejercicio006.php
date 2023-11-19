<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "login";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Verificar si el usuario ya está autenticado
if (isset($_SESSION['id'])) {
    header("Location: dashboard.php");
    exit();
}

// Función para validar y procesar el formulario de login
function processLogin($conn)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre_usuario = $_POST['nombre_usuario'];
        $contrasena = $_POST['contrasena'];

        $sql = "SELECT id, nombre_usuario, contrasena FROM usuarios WHERE nombre_usuario = '$nombre_usuario'";
        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if (password_verify($contrasena, $row['contrasena'])) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
                    header("Location: dashboard.php");
                    exit();
                } else {
                    $error = "Contraseña incorrecta";
                }
            } else {
                $error = "Usuario no encontrado";
            }
        } else {
            $error = "Error en la consulta: " . $conn->error;
        }
    }
}

// Procesar el formulario de login
processLogin($conn);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .login-container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #1159df;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            box-sizing: border-box;
        }

        button:hover {
            background-color: #555;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login</h2>
        <?php
        if (isset($error)) {
            echo "<p class='error'>$error</p>";
        } elseif (isset($_SESSION['id'])) {
            echo "<p class='success'>Ingreso exitoso</p>";
        }
        ?>
        <form method="post" action="">
            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" name="nombre_usuario" required><br>

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" required><br>

            <button type="submit">Iniciar sesión</button>
        </form>
    </div>

</body>

</html>
