<?php

require("conexion.php");


$sql = "SELECT
            fecha,
            SUM(cantidad) AS cantidad_vendida
        FROM ventas
        GROUP BY fecha
        ORDER BY fecha";


$resultado = $conexion->query($sql);


$fechas = [];

$cantidades = [];


while ($fila = $resultado->fetch_assoc()) {

    $fechas[] = $fila["fecha"];

    $cantidades[] = $fila["cantidad_vendida"];

}

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Ventas por día</title>


    <!-- Biblioteca Chart.js -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <style>

        body {

            font-family: Arial, sans-serif;

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

            width: 800px;

            max-width: 100%;

            margin: 30px auto;

        }


        table {

            width: 100%;

            border-collapse: collapse;

            margin-top: 30px;

        }


        th, td {

            padding: 12px;

            border: 1px solid #ddd;

            text-align: center;

        }


        th {

            background: #333;

            color: white;

        }

    </style>

</head>


<body>


<div class="contenedor">


    <h1>📈 Ventas por día</h1>


    <!-- CONTENEDOR DEL GRÁFICO -->

    <div class="grafico">

        <canvas id="graficoVentas"></canvas>

    </div>


    <!-- TABLA -->

    <h2>Detalle de ventas</h2>


    <table>

        <tr>

            <th>Fecha</th>

            <th>Cantidad vendida</th>

        </tr>


        <?php

        $resultado->data_seek(0);


        while ($fila = $resultado->fetch_assoc()) {

        ?>

        <tr>

            <td>

                <?php echo $fila["fecha"]; ?>

            </td>


            <td>

                <?php echo $fila["cantidad_vendida"]; ?>

            </td>

        </tr>

        <?php

        }

        ?>

    </table>


</div>


<script>


// Recibimos los datos enviados por PHP

const fechas = <?php echo json_encode($fechas); ?>;

const cantidades = <?php echo json_encode($cantidades); ?>;


// Buscamos el canvas

const contexto = document.getElementById("graficoVentas");


// Creamos el gráfico

new Chart(contexto, {


    // Tipo de gráfico

    type: "line",


    data: {

        // Eje X

        labels: fechas,


        datasets: [{

            label: "Ventas por día",

            data: cantidades,

            tension: 0.3,

            fill: false

        }]

    },


    options: {

        responsive: true,


        scales: {

            y: {

                beginAtZero: true,

                title: {

                    display: true,

                    text: "Cantidad vendida"

                }

            },


            x: {

                title: {

                    display: true,

                    text: "Fecha"

                }

            }

        }

    }

});

</script>


</body>

</html>