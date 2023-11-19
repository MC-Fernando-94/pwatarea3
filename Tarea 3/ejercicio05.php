<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Imágenes</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            max-width: 800px;
            margin: auto;
            justify-content: center;
            align-items: center;
        }

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        img:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>

    <div class="gallery">
        <?php
            $directory = "images/";
            $images = glob($directory . "*.{jpg,png,gif}", GLOB_BRACE);
            $totalImages = count($images);

            for ($i = 0; $i < $totalImages; $i++) {
                echo '<img src="' . $images[$i] . '" alt="Imagen">';
            }
        ?>
    </div>

</body>

</html>
