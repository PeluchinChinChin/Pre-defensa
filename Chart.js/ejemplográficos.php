<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div>
        <h1>Gráficos cantidad de productos más vendidos</h1>
        <canvas id="graficos"></canvas>
    </div>
    <script>
        /*enteros, strings, booleanos, decimales*/
        var productos=["monitor","teclado","mouse","parlantes"];
        var cantidad=[10,30,50,30];
        var grafico=document.getElementById("graficos");
        
        new Chart(grafico, {

            type: "bar",

            data: {

                labels: productos,

                datasets: [{

                    label: "Cantidad vendida",

                    data: cantidad

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