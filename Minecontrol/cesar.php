<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Examen parcial #2 - HSDM</title>
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
      margin-right: 0px;
    }
    .card3 {
      width: 200px;
      height: 150px;
      background-color: #16a085; /* Esmeralda */
      color: rgb(255, 255, 255);
      text-align: center;
      padding: 10px;
      margin-top: 10px;
    }
    .card-title {
      font-size: 24px;
    }
    .temperature, .humidity, .lux {
      font-size: 36px;
      font-weight: bold;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <table style="width:100%">
    <tr>
      <td style="width:33%">
        <div id="temperature_gauge" style="width:400px; height:320px"></div>
        <div class="container mt-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Temperatura</h5>
              <div class="temperature" id="temperature"></div>
            </div>
          </div>
        </div>
      </td>
      <td style="width:33%">
        <div id="humidity_gauge" style="width:400px; height:320px"></div>
        <div class="container mt-3">
          <div class="card2">
            <div class="card-body">
              <h5 class="card-title">Humedad</h5>
              <div class="humidity" id="humidity"></div>
            </div>
          </div>
        </div>
      </td>
      <td style="width:33%">
        <div id="light_gauge" style="width:400px; height:320px"></div>
        <div class="container mt-3">
          <div class="card3">
            <div class="card-body">
              <h5 class="card-title">Lux</h5>
              <div class="lux" id="lux"></div>
            </div>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="3">
        <div id="highcharts_container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
      </td>
    </tr>
  </table>

  <script>
    var gauge_temp;
    var gauge_hum;
    var gauge_light;
    
    function initGauges() {
      gauge_temp = new JustGage({
        id: "temperature_gauge",
        value: 0,
        min: 0,
        max: 50,
        decimals: 2,
        title: "Temperatura",
        levelColors: ["#0000FF"],
        label: "°C"
      });
      
      gauge_hum = new JustGage({
        id: "humidity_gauge",
        value: 0,
        min: 0,
        max: 100,
        decimals: 2,
        title: "Humedad relativa",
        levelColors: ["#00FF00"],
        label: ""
      });

      gauge_light = new JustGage({
        id: "light_gauge",
        value: 0,
        min: 0,
        max: 4000,
        title: "Intensidad de luz",
        levelColors: ["#FFFF00"],
        label: "lux"
      });
    }
    
    function updateGauges(temperature, humidity, light) {
      gauge_temp.refresh(temperature);
      gauge_hum.refresh(humidity);
      gauge_light.refresh(light);
    }
    
    function updateCards(temperature, humidity, lux) {
      $('#temperature').text(temperature.toFixed(2) + ' °C');
      $('#humidity').text(humidity.toFixed(2) + ' %');
      $('#lux').text(lux.toFixed(2));
    }
    
    function updateCharts(data) {
      Highcharts.chart('highcharts_container', {
        chart: {
          type: 'spline'
        },
        title: {
          text: 'Datos vs Tiempo'
        },
        xAxis: {
          type: 'datetime',
          labels: {
            rotation: -45,
            format: '{value:%Y-%m-%d %H:%M}'
          },
        },
        yAxis: {
          title: {
            text: 'Valor'
          }
        },
        series: [{
          name: 'Temperatura',
          data: data.temperature
        }, {
          name: 'Humedad',
          data: data.humidity
        }, {
          name: 'Lux',
          data: data.light
        }]
      });
    }
    
    function fetchData() {
      $.getJSON('https://polliwog-desired-egret.ngrok-free.app/sistemas_embebidos/', function(response) {
        var data = response.data;
        var temperatureData = [];
        var humidityData = [];
        var lightData = [];
        var timeData = [];

        data.forEach(function(item) {
          var timestamp = new Date(item.fecha).getTime();
          temperatureData.push([timestamp, parseFloat(item.descripcion)]);
          humidityData.push([timestamp, parseFloat(item.sensor)]);
          lightData.push([timestamp, parseFloat(item.status)]);
          timeData.push(timestamp);
        });

        updateGauges(temperatureData[temperatureData.length - 1][1], 
                      humidityData[humidityData.length - 1][1], 
                      lightData[lightData.length - 1][1]);
        
        updateCards(temperatureData[temperatureData.length - 1][1], 
                    humidityData[humidityData.length - 1][1], 
                    lightData[lightData.length - 1][1]);

        updateCharts({
          temperature: temperatureData,
          humidity: humidityData,
          light: lightData
        });
      });
    }

    $(document).ready(function() {
      initGauges();
      fetchData();
      setInterval(fetchData, 5000);
    });
  </script>
</body>
</html>
