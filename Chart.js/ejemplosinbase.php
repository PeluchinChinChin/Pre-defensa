<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Ejemplo Chart.js</title>

    <!-- Cargar Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

    <h1>📊 Productos más vendidos</h1>

    <!-- Lugar donde aparecerá el gráfico -->

    <canvas id="graficoVentas"></canvas>


    <script>

        // Nombres de los productos

        const productos = [
            "Mouse",
            "Teclado",
            "Monitor"
        ];


        // Cantidad vendida de cada producto

        const cantidades = [
            22,
            13,
            6
        ];


        // Buscar el canvas

        const contexto = document.getElementById("graficoVentas");


        // Crear el gráfico

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