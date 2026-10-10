<?php

require("conexion.php");

$sql = "SELECT 
            producto,
            SUM(cantidad) AS total_vendido
        FROM ventas
        GROUP BY producto
        ORDER BY total_vendido DESC";

$resultado = $conexion->query($sql);

$productos = [];
$cantidades = [];

while ($fila = $resultado->fetch_assoc()) {

    $productos[] = $fila["producto"];

    $cantidades[] = $fila["total_vendido"];

}

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Ventas por producto</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>

        body {
            font-family: Arial;
            background: #f4f6f8;
            padding: 30px;
        }

        .contenedor {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
        }

        .grafico {
            width: 500px;
            max-width: 100%;
            margin: 30px auto;
        }

    </style>

</head>

<body>

<div class="contenedor">

    <h1>🍰 Ventas por producto</h1>

    <div class="grafico">

        <canvas id="graficoTorta"></canvas>

    </div>

</div>


<script>

const productos = <?php echo json_encode($productos); ?>;

const cantidades = <?php echo json_encode($cantidades); ?>;


const contexto = document.getElementById("graficoTorta");


new Chart(contexto, {

    type: "pie",

    data: {

        labels: productos,

        datasets: [{

            label: "Ventas",

            data: cantidades

        }]

    },

    options: {

        responsive: true

    }

});

</script>

</body>

</html>