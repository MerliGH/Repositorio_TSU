<?php
// Función para obtener datos de la API
function fetchDataFromAPI($url) {
    $response = file_get_contents($url);
    if ($response === FALSE) {
        die("Error al obtener datos de la API.");
    }
    return json_decode($response, true);
}

// URL de la API
$apiUrl = "https://polliwog-desired-egret.ngrok-free.app/sensores/"; // Cambia esto a la URL de tu API

// Obtener datos de la API
$data = fetchDataFromAPI($apiUrl);

// Verificar estructura de datos
if (empty($data) || !is_array($data)) {
    die("Datos no válidos recibidos de la API.");
}

// Ordenar los datos por fecha en orden descendente y tomar los últimos 15
usort($data, function($a, $b) {
    return strtotime($b['fecha']) - strtotime($a['fecha']);
});
$latestData = array_slice($data, 0, 15);

$dateTime = array();
$polvoData = array();
$monoxidoData = array();
$dioxidoCarbonoData = array();
$etanolData = array();
$hidrogenoData = array();
$amonioData = array();
$metanoData = array();
$dioxidoNitrogenoData = array();

foreach ($latestData as $entry) {
    // Verificar si las claves existen en el array
    if (isset($entry['fecha'], $entry['polvo'], $entry['monoxido_de_carbono'], $entry['dioxido_de_carbono'], $entry['etanol'], $entry['hidrogeno'], $entry['amonio'], $entry['metano'], $entry['dioxido_de_nitrogeno'])) {
        $dateTime[] = $entry['fecha'];
        $polvoData[] = $entry['polvo'];
        $monoxidoData[] = $entry['monoxido_de_carbono'];
        $dioxidoCarbonoData[] = $entry['dioxido_de_carbono'];
        $etanolData[] = $entry['etanol'];
        $hidrogenoData[] = $entry['hidrogeno'];
        $amonioData[] = $entry['amonio'];
        $metanoData[] = $entry['metano'];
        $dioxidoNitrogenoData[] = $entry['dioxido_de_nitrogeno'];
    }
}

// Convertir datos a formato JSON para JavaScript
$dateTimeJson = json_encode($dateTime);
$polvoDataJson = json_encode($polvoData);
$monoxidoDataJson = json_encode($monoxidoData);
$dioxidoCarbonoDataJson = json_encode($dioxidoCarbonoData);
$etanolDataJson = json_encode($etanolData);
$hidrogenoDataJson = json_encode($hidrogenoData);
$amonioDataJson = json_encode($amonioData);
$metanoDataJson = json_encode($metanoData);
$dioxidoNitrogenoDataJson = json_encode($dioxidoNitrogenoData);
?>

<!DOCTYPE html>
<html>
<head>
    <title>IoT Charts</title>
    <meta http-equiv="refresh" content="3">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Gráfico de Polvo</div>
                    <div class="panel-body">
                        <div id="polvoChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Gráfico de Monóxido de Carbono</div>
                    <div class="panel-body">
                        <div id="monoxidoChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Gráfico de Dióxido de Carbono</div>
                    <div class="panel-body">
                        <div id="dioxidoCarbonoChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Gráfico de Etanol</div>
                    <div class="panel-body">
                        <div id="etanolChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Gráfico de Hidrógeno</div>
                    <div class="panel-body">
                        <div id="hidrogenoChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Gráfico de Amonio</div>
                    <div class="panel-body">
                        <div id="amonioChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Gráfico de Metano</div>
                    <div class="panel-body">
                        <div id="metanoChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Gráfico de Dióxido de Nitrógeno</div>
                    <div class="panel-body">
                        <div id="dioxidoNitrogenoChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            // Convertir fechas al formato de timestamp
            function formatDateToTimestamp(dateArray) {
                return dateArray.map(date => new Date(date).getTime());
            }

            // Gráfico de Polvo
            Highcharts.chart('polvoChart', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Nivel de Polvo'
                },
                xAxis: {
                    type: 'datetime',
                    labels: {
                        format: '{value:%Y-%m-%d %H:%M:%S}'
                    },
                    categories: formatDateToTimestamp(<?php echo $dateTimeJson; ?>)
                },
                yAxis: {
                    title: {
                        text: 'Polvo (g/m³)'
                    }
                },
                series: [{
                    name: 'Polvo',
                    data: <?php echo $polvoDataJson; ?>,
                    color: '#00FF00' // Verde
                }]
            });

            // Gráfico de Monóxido de Carbono
            Highcharts.chart('monoxidoChart', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Nivel de Monóxido de Carbono'
                },
                xAxis: {
                    type: 'datetime',
                    labels: {
                        format: '{value:%Y-%m-%d %H:%M:%S}'
                    },
                    categories: formatDateToTimestamp(<?php echo $dateTimeJson; ?>)
                },
                yAxis: {
                    title: {
                        text: 'Monóxido de Carbono (ppm)'
                    }
                },
                series: [{
                    name: 'Monóxido de Carbono',
                    data: <?php echo $monoxidoDataJson; ?>,
                    color: '#00FF00' // Verde
                }]
            });

            // Gráfico de Dióxido de Carbono
            Highcharts.chart('dioxidoCarbonoChart', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Nivel de Dióxido de Carbono'
                },
                xAxis: {
                    type: 'datetime',
                    labels: {
                        format: '{value:%Y-%m-%d %H:%M:%S}'
                    },
                    categories: formatDateToTimestamp(<?php echo $dateTimeJson; ?>)
                },
                yAxis: {
                    title: {
                        text: 'Dióxido de Carbono (ppm)'
                    }
                },
                series: [{
                    name: 'Dióxido de Carbono',
                    data: <?php echo $dioxidoCarbonoDataJson; ?>,
                    color: '#00FF00' // Verde
                }]
            });

            // Gráfico de Etanol
            Highcharts.chart('etanolChart', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Nivel de Etanol'
                },
                xAxis: {
                    type: 'datetime',
                    labels: {
                        format: '{value:%Y-%m-%d %H:%M:%S}'
                    },
                    categories: formatDateToTimestamp(<?php echo $dateTimeJson; ?>)
                },
                yAxis: {
                    title: {
                        text: 'Etanol (ppm)'
                    }
                },
                series: [{
                    name: 'Etanol',
                    data: <?php echo $etanolDataJson; ?>,
                    color: '#00FF00' // Verde
                }]
            });

            // Gráfico de Hidrógeno
            Highcharts.chart('hidrogenoChart', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Nivel de Hidrógeno'
                },
                xAxis: {
                    type: 'datetime',
                    labels: {
                        format: '{value:%Y-%m-%d %H:%M:%S}'
                    },
                    categories: formatDateToTimestamp(<?php echo $dateTimeJson; ?>)
                },
                yAxis: {
                    title: {
                        text: 'Hidrógeno (ppm)'
                    }
                },
                series: [{
                    name: 'Hidrógeno',
                    data: <?php echo $hidrogenoDataJson; ?>,
                    color: '#00FF00' // Verde
                }]
            });

            // Gráfico de Amonio
            Highcharts.chart('amonioChart', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Nivel de Amonio'
                },
                xAxis: {
                    type: 'datetime',
                    labels: {
                        format: '{value:%Y-%m-%d %H:%M:%S}'
                    },
                    categories: formatDateToTimestamp(<?php echo $dateTimeJson; ?>)
                },
                yAxis: {
                    title: {
                        text: 'Amonio (ppm)'
                    }
                },
                series: [{
                    name: 'Amonio',
                    data: <?php echo $amonioDataJson; ?>,
                    color: '#00FF00' // Verde
                }]
            });

            // Gráfico de Metano
            Highcharts.chart('metanoChart', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Nivel de Metano'
                },
                xAxis: {
                    type: 'datetime',
                    labels: {
                        format: '{value:%Y-%m-%d %H:%M:%S}'
                    },
                    categories: formatDateToTimestamp(<?php echo $dateTimeJson; ?>)
                },
                yAxis: {
                    title: {
                        text: 'Metano (ppm)'
                    }
                },
                series: [{
                    name: 'Metano',
                    data: <?php echo $metanoDataJson; ?>,
                    color: '#00FF00' // Verde
                }]
            });

            // Gráfico de Dióxido de Nitrógeno
            Highcharts.chart('dioxidoNitrogenoChart', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Nivel de Dióxido de Nitrógeno'
                },
                xAxis: {
                    type: 'datetime',
                    labels: {
                        format: '{value:%Y-%m-%d %H:%M:%S}'
                    },
                    categories: formatDateToTimestamp(<?php echo $dateTimeJson; ?>)
                },
                yAxis: {
                    title: {
                        text: 'Dióxido de Nitrógeno (ppm)'
                    }
                },
                series: [{
                    name: 'Dióxido de Nitrógeno',
                    data: <?php echo $dioxidoNitrogenoDataJson; ?>,
                    color: '#00FF00' // Verde
                }]
            });
        });
    </script>
</body>
</html>
