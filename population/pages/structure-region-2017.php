<html lang="ua">
<head>
<meta charset="utf-8" />
<meta name="author" content="Maryna Salimonenko">
<title>Структура чисельності населення Виноградівської ОТГ серед області(за 2017рік)</title>

<?php
   include($_SERVER['DOCUMENT_ROOT'].'/inc/head-links.php');
   include($_SERVER['DOCUMENT_ROOT'].'/inc/connection.php');
   $con = getdb();
?>


<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Населений пункт', 'за 2017 рік'],
      <?php
      $query = mysqli_query($con, "SELECT * FROM `population` WHERE `id` BETWEEN '2' AND '8'");
      while($row = mysqli_fetch_array($query)){
        echo "['".$row['col_A']."',".$row['col_I']."],";
      }
    ?>
    ]);

    var options = {
      title: 'Структура населення у відсотковому відношенні',
      is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('structure-region-2017'));
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
        include($_SERVER['DOCUMENT_ROOT'].'/population/left-nav.php');
        ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Структура чисельності населення Виноградівської ОТГ серед області(за 2017рік)</h1>
          </div>
          <div class="d-flex justify-content-center">
            <div id="structure-region-2017" style="width: 900px; height: 500px;"></div>
          </div>
        </main>
      </div>
    </div>
</body>
</html>
