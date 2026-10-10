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

    <title>Reporte de ventas</title>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>

        body{
            font-family: Arial, sans-serif;
            background:#f4f6f8;
            padding:30px;
        }

        .contenedor{
            max-width:900px;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:10px;
        }

        h1{
            text-align:center;
        }

        .grafico{
            width:700px;
            max-width:100%;
            margin:30px auto;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:30px;
        }

        th, td{
            border:1px solid #ddd;
            padding:12px;
            text-align:center;
        }

        th{
            background:#333;
            color:white;
        }

    </style>

</head>

<body>

<div class="contenedor">

    <h1>📊 Productos más vendidos</h1>


    <!-- GRÁFICO -->

    <div class="grafico">

        <canvas id="graficoProductos"></canvas>

    </div>


    <!-- TABLA -->

    <h2>Detalle de ventas</h2>

    <table>

        <tr>
            <th>Producto</th>
            <th>Cantidad vendida</th>
        </tr>

        <?php

        $resultado->data_seek(0);

        while ($fila = $resultado->fetch_assoc()) {

        ?>

        <tr>

            <td>
                <?php echo $fila["producto"]; ?>
            </td>

            <td>
                <?php echo $fila["total_vendido"]; ?>
            </td>

        </tr>

        <?php

        }

        ?>

    </table>

</div>


<script>

const productos = <?php echo json_encode($productos); ?>;

const cantidades = <?php echo json_encode($cantidades); ?>;


const contexto = document
    .getElementById("graficoProductos");


new Chart(contexto, {

    type: "bar",

    data: {

        labels: productos,

        datasets: [{

            label: "Cantidad vendida",

            data: cantidades

        }]

    },

    options: {

        responsive: true,

        scales: {

            y: {

                beginAtZero: true

            }

        }

    }

});

</script>

</body>

</html>