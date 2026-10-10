<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nombre=$_POST["nombre"];
    $comentario=$_POST["come"];
    $asunto=$_POST["asunto"];
    $archivo=fopen("comentarios.txt", "w");
    fwrite($archivo, "NOMBRE: ");
    fwrite($archivo, $nombre .PHP_EOL);
    fwrite($archivo, "ASUNTO: ");
    fwrite($archivo, $asunto .PHP_EOL);
    fwrite($archivo, "COMENTARIO: ");
    fwrite($archivo, $comentario .PHP_EOL);
    ?>
</body>
</html>