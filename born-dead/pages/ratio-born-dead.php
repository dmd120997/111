<html lang="ua">
<head>
<meta charset="utf-8" />
<meta name="author" content="Maryna Salimonenko">
<title>Співвідношення народжених та померлих за 2010-2017</title>

<?php
   include($_SERVER['DOCUMENT_ROOT'].'/inc/head-links.php');
   include($_SERVER['DOCUMENT_ROOT'].'/inc/connection.php');
   $con = getdb();
?>
<script type="text/javascript">
     google.charts.load('current', {'packages':['corechart']});
     google.charts.setOnLoadCallback(drawVisualization);

     function drawVisualization() {
       // Some raw data (not necessarily accurate)
       var data = google.visualization.arrayToDataTable([
         <?php
         $Sql = "SELECT * FROM `born-dead` WHERE `id` IN ('1', '2', '3')";
         $result = mysqli_query($con, $Sql);
         if(mysqli_num_rows($result)) {

          $i = 0;
          $array_A = $array_B = $array_C = $array_D = $array_E = $array_F = $array_G = $array_H = $array_I = array();
          $array_A[] = "Роки";
          while($row = mysqli_fetch_assoc($result)) {
            $array_A[] = $row['col_A'];
            $array_B[] = $row['col_B'];
            $array_C[] = $row['col_C'];
            $array_D[] = $row['col_D'];
            $array_E[] = $row['col_E'];
            $array_F[] = $row['col_F'];
            $array_G[] = $row['col_G'];
            $array_H[] = $row['col_H'];
            $array_I[] = $row['col_I'];

              $i++;
          }
          echo "['{$array_A[0]}', '{$array_A[2]}', '{$array_A[3]}', '{$array_A[2]} поліноміальна', '{$array_A[3]} поліноміальна'],\n";
          echo "['{$array_B[0]}', {$array_B[1]}, {$array_B[2]}, {$array_B[1]}, {$array_B[2]}],\n";
          echo "['{$array_C[0]}', {$array_C[1]}, {$array_C[2]}, {$array_C[1]}, {$array_C[2]}],\n";
          echo "['{$array_D[0]}', {$array_D[1]}, {$array_D[2]}, {$array_D[1]}, {$array_D[2]}],\n";
          echo "['{$array_E[0]}', {$array_E[1]}, {$array_E[2]}, {$array_E[1]}, {$array_E[2]}],\n";
          echo "['{$array_F[0]}', {$array_F[1]}, {$array_F[2]}, {$array_F[1]}, {$array_F[2]}],\n";
          echo "['{$array_G[0]}', {$array_G[1]}, {$array_G[2]}, {$array_G[1]}, {$array_G[2]}],\n";
          echo "['{$array_H[0]}', {$array_H[1]}, {$array_H[2]}, {$array_H[1]}, {$array_H[2]}],\n";
          echo "['{$array_I[0]}', {$array_I[1]}, {$array_I[2]}, {$array_I[1]}, {$array_I[2]}]\n";
         }
         ?>
       ]);

       var options = {
         curveType: 'function',
         vAxis: {title: 'Показники'},
         hAxis: {title: 'Роки'},
         seriesType: 'bars',

         series: {
            0: { color: '#4285f4', },
            1: { color: '#db4437', },
            2: { color: '#1d51a7', type: 'line' },
            3: { color: '#800000', type: 'line' }
          }
        };

       var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
       chart.draw(data, options);
     }
   </script>


</head>

<body>
  <?php
   include($_SERVER['DOCUMENT_ROOT'].'/inc/nav.php');
  ?>

    <div class="container-fluid">
      <div class="row">
        <?php
        include($_SERVER['DOCUMENT_ROOT'].'/born-dead/left-nav.php');
        ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Співвідношення народжених та померлих за 2010-2017</h1>
          </div>
          <div class="d-flex justify-content-center">
            <div id="chart_div" style="width: 100%; height: 500px;"></div>
          </div>
        </main>
      </div>
    </div>
</body>
</html>
