<?php
require('top.inc.php');
?>

<html>
<center>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
         
        var data = google.visualization.arrayToDataTable([
          ['Items', 'Count'],
          ['Mouse',     11],
          ['Keyboard',      2],
          ['Bluetooth speaker',  2],
          ['Mobile Phones',    7]
        ]);

        var options = {
          title: 'Items Graph'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }

    </script>
  </head>
  <body>
  <div id="piechart" style="width: 1280px; height: 550px;"></div>
  </body>

  </center>
</html>


<?php      
require('footer.inc.php');
?>