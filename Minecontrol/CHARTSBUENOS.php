<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoreo de Sensores</title>
    <!-- JustGage and jQuery -->
    <script src="/mygauge/justgage/raphael-2.1.4.min.js"></script>
    <script src="/mygauge/justgage/justgage.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        .card {
            width: 220px;
            height: 150px;
            background-color: #af7ac5; /* Lila pastel */
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 10px;
        }
        .card2 {
            width: 220px;
            height: 150px;
            background-color: #3498db; /* Azul pastel */
            color: rgb(255, 255, 255);
            text-align: center;
            padding: 10px;
            margin-top: 10px;
        }
        .card3 {
            width: 220px;
            height: 150px;
            background-color: #16a085; /* Esmeralda */
            color: rgb(255, 255, 255);
            text-align: center;
            padding: 10px;
            margin-top: 10px;
        }
        .sensor {
            font-size: 36px;
            font-weight: bold;
            margin-top: 10px;
        }
        .container {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <!-- Polvo -->
            <div class="col-md-3">
                <div id="sensor1_gauge" style="width:400px; height:320px"></div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Polvo</h5>
                        <div class="sensor" id="sensor1"></div>
                    </div>
                </div>
            </div>
            <!-- Monóxido de Carbono -->
            <div class="col-md-3">
                <div id="sensor2_gauge" style="width:400px; height:320px"></div>
                <div class="card card2">
                    <div class="card-body">
                        <h5 class="card-title">Monóxido de Carbono</h5>
                        <div class="sensor" id="sensor2"></div>
                    </div>
                </div>
            </div>
            <!-- Dióxido de Carbono -->
            <div class="col-md-3">
                <div id="sensor3_gauge" style="width:400px; height:320px"></div>
                <div class="card card3">
                    <div class="card-body">
                        <h5 class="card-title">Dióxido de Carbono</h5>
                        <div class="sensor" id="sensor3"></div>
                    </div>
                </div>
            </div>
            <!-- Etanol -->
            <div class="col-md-3">
                <div id="sensor4_gauge" style="width:400px; height:320px"></div>
                <div class="card card4">
                    <div class="card-body">
                        <h5 class="card-title">Etanol</h5>
                        <div class="sensor" id="sensor4"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Hidrógeno -->
            <div class="col-md-3">
                <div id="sensor5_gauge" style="width:400px; height:320px"></div>
                <div class="card card5">
                    <div class="card-body">
                        <h5 class="card-title">Hidrógeno</h5>
                        <div class="sensor" id="sensor5"></div>
                    </div>
                </div>
            </div>
            <!-- Amonio -->
            <div class="col-md-3">
                <div id="sensor6_gauge" style="width:400px; height:320px"></div>
                <div class="card card2">
                    <div class="card-body">
                        <h5 class="card-title">Amonio</h5>
                        <div class="sensor" id="sensor6"></div>
                    </div>
                </div>
            </div>
            <!-- Metano -->
            <div class="col-md-3">
                <div id="sensor7_gauge" style="width:400px; height:320px"></div>
                <div class="card card3">
                    <div class="card-body">
                        <h5 class="card-title">Metano</h5>
                        <div class="sensor" id="sensor7"></div>
                    </div>
                </div>
            </div>
            <!-- Dióxido de Nitrógeno -->
            <div class="col-md-3">
                <div id="sensor8_gauge" style="width:400px; height:320px"></div>
                <div class="card card4">
                    <div class="card-body">
                        <h5 class="card-title">Dióxido de Nitrógeno</h5>
                        <div class="sensor" id="sensor8"></div>
                    </div>
                </div>
            </div>
















        </div>
        <div class="row">
            <!-- Gráficos -->
            <div class="col-md-6">
                <div id="chart_sensor1_container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
            <div class="col-md-6">
                <div id="chart_sensor2_container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
            <div class="col-md-6">
                <div id="chart_sensor3_container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
            <div class="col-md-6">
                <div id="chart_sensor4_container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>



            <div class="col-md-6">
                <div id="chart_sensor5_container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>

            <div class="col-md-6">
                <div id="chart_sensor6_container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>

            <div class="col-md-6">
                <div id="chart_sensor7_container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>

            <div class="col-md-6">
                <div id="chart_sensor8_container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>

           


        </div>
    </div>

    
  
<script>

    
    var gauges = [];
    var charts = [];
    var sensorNames = [
        'polvo',
        'monoxido_de_carbono',
        'dioxido_de_carbono',
        'etanol',
        'hidrogeno',
        'amonio',
        'metano',
        'dioxido_de_nitrogeno'
    ];

    var sensorTitles = [
        'Polvo (P)',
        'Monóxido de Carbono (CO)',
        'Dióxido de Carbono (CO2)',
        'Etanol (Et)',
        'Hidrógeno (H2)',
        'Amonio (NH3)',
        'Metano (CH4)',
        'Dióxido de Nitrógeno (NO2)'
    ];

    function getLevelColor(value, min, max) {
        var percentage = (value - min) / (max - min) * 100;

        if (percentage <= 50) {
            return "#00FF00"; // Verde
        } else if (percentage <= 70) {
            return "#FFFF00"; // Amarillo
        } else {
            return "#FF0000"; // Rojo
        }
    }

    function initGauges() {
        var minValues = [0, 0, 0, 0, 0, 0, 0, 0];
        var maxValues = [1000, 1000, 5000, 1000, 1000, 1000, 10000, 200, 100];

        sensorTitles.forEach(function(title, index) {
            gauges[index] = new JustGage({
                id: 'sensor' + (index + 1) + '_gauge',
                value: 0,
                min: minValues[index],
                max: maxValues[index],
                decimals: 2,
                title: title,
                levelColors: [getLevelColor(0, minValues[index], maxValues[index])] // Establece el color inicial
            });
        });
    }

    


    

var histories = {};

// Inicializa el historial de cada sensor en la función initCharts
function initCharts() {
    sensorNames.forEach(function(name, index) {
        histories[name] = []; // Inicializa el historial vacío para cada sensor

        charts[index] = Highcharts.chart('chart_sensor' + (index + 1) + '_container', {
            chart: {
                type: 'spline'
            },
            title: {
                text: sensorTitles[index]
            },
            xAxis: {
                type: 'datetime',
                labels: {
                    rotation: -35,
                    format: '{value:%d %b %Y --- %H:%M}'
                }
            },
            yAxis: {
                title: {
                    text: sensorTitles[index]
                }
            },
            series: [{
                name: sensorTitles[index],
                data: [] // Empieza con un array vacío
            }]
        });
    });
}







    
    function updateGauges(data) {
    sensorNames.forEach(function(name, index) {
        var value = data[name] !== undefined ? data[name] : 0;
        if (typeof value === 'string') {
            value = parseFloat(value); // Convierte a número si es una cadena
        }
        if (!isNaN(value)) { // Asegúrate de que el valor sea numérico
            // Actualiza el gauge
            gauges[index].refresh(value);

            // Actualiza el color del gauge
            var minValue = gauges[index].config.min;
            var maxValue = gauges[index].config.max;
            gauges[index].config.levelColors = [getLevelColor(value, minValue, maxValue)];
            gauges[index].refresh(value); // Refresca para aplicar el nuevo color

            // Actualiza el valor en el card
            document.getElementById('sensor' + (index + 1)).innerText = value;
        }
    });
}




function updateCharts(data) {
    sensorNames.forEach(function(name, index) {
        var chart = charts[index];
        if (chart) {
            console.log('Actualizando gráfico para:', name);
            var series = chart.series[0];
            var value = data[name] !== undefined ? data[name] : 0;

            if (typeof value === 'string') {
                value = parseFloat(value); // Convierte a número si es una cadena
            }

            if (!isNaN(value)) { // Asegúrate de que el valor sea numérico
                var timestamp = new Date(data.fecha).getTime(); // Convierte la fecha a milisegundos

                // Agrega el nuevo valor al historial
                histories[name].push([timestamp, value]);

                // Mantén solo los últimos 15 valores
                if (histories[name].length > 15) {
                    histories[name].shift(); // Elimina el valor más antiguo
                }

                // Actualiza la gráfica con el historial de los últimos 15 valores
                series.setData(histories[name], true, false); // Actualiza el gráfico

                // Verificar el historial para depuración
                console.log('Historial de datos para ' + name + ':', histories[name]);
            }
        }
    });
}

//----------------------------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------------------------






    $(document).ready(function() {
        initGauges();
        initCharts();

        
        $.ajax({
            url: 'https://polliwog-desired-egret.ngrok-free.app/sensores/',
            method: 'GET',
            success: function(data) {
                console.log('Datos recibidos:', data);

                if (Array.isArray(data) && data.length > 0) {
                    // Procesa el último objeto de la respuesta
                    const lastData = data[data.length - 1];
                    // Asegúrate de que todos los valores sean numéricos
                    const numericData = sensorNames.reduce((acc, name) => {
                        let value = lastData[name] !== undefined ? lastData[name] : 0;
                        if (typeof value === 'string') {
                            value = parseFloat(value); // Convierte a número si es una cadena
                        }
                        acc[name] = !isNaN(value) ? value : 0; // Asegúrate de que el valor sea numérico
                        return acc;
                    }, { fecha: lastData.fecha });

                    console.log('Últimos datos procesados:', lastData);
                    // Actualiza los gauges y gráficos con los datos numéricos
                    updateGauges(numericData);
                    updateCharts(numericData);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en la solicitud:', status, error);
            }
        });
    });

</script>







</body>

</html>
