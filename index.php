<?php
// 1. Descargar la página
$url = "https://memorial.com.do/obituarios/";
$html = file_get_contents($url);

// 2. Cargar el HTML en DOMDocument
$doc = new DOMDocument();
@$doc->loadHTML($html);

// 3. Buscar etiquetas <h2>
$tags = $doc->getElementsByTagName("h3");

// 4. Mostrar resultados
foreach ($tags as $tag) {
    echo trim($tag->nodeValue) . PHP_EOL;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obituarios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Obituarios Recientes</h1>
    <div id="obituaries">
        <!-- Los obituarios se mostrarán aquí -->
        <?php
        foreach ($tags as $tag) {
            echo "<h2>" . htmlspecialchars(trim($tag->nodeValue)) . "</h2>";
        }
        ?>

    </div>
    <script src="script.js"></script>
</body>
</html>