<?php
$archivoContador = 'contador.txt';

function incrementarVisitas($archivo)
{
    if (file_exists($archivo)) {
        $contador = (int) file_get_contents($archivo);
        $contador++;
        file_put_contents($archivo, $contador);
    } else {
        file_put_contents($archivo, 1);
    }
}

incrementarVisitas($archivoContador);
$visitas = (int) file_get_contents($archivoContador);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Visitas</title>
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

        .contador {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="contador">
        <h1>Contador de Visitas</h1>
        <p id="contador">Esta página ha sido visitada <?php echo $visitas; ?> veces.</p>

        <script>
            // JavaScript para actualizar el contador dinámicamente
            var contadorElemento = document.getElementById('contador');
            var visitas = <?php echo $visitas; ?>;

            setInterval(function () {
                visitas++;
                contadorElemento.textContent = 'Esta página ha sido visitada ' + visitas + ' veces.';
            }, 1000); // Actualizar cada segundo (puedes ajustar el intervalo según tus preferencias)
        </script>
    </div>

</body>

</html>


    <div class="contador">
        <h1>Contador de Visitas</h1>
        <p>Esta página ha sido visitada <?php echo $visitas; ?> veces.</p>
    </div>

</body>

</html>
