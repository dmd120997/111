<html lang="ua">
<head>
<meta charset="utf-8" />
<meta name="author" content="Maryna Salimonenko">
<title>Розподіл населення Виноградівської ОТГ за віком(за 2017рік)</title>

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
      ['Населення у віці', 'за 2017 рік'],
      <?php
      $query = mysqli_query($con, "SELECT * FROM `population-age` WHERE `id` BETWEEN '3' AND '8'");
      while($row = mysqli_fetch_array($query)){
        echo "['".$row['col_A']."',".$row['col_I']."],";
      }
    ?>
    ]);
    var options = {
      is3D: true,
    };
    var chart = new google.visualization.PieChart(document.getElementById('population-age-2017'));
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
        include($_SERVER['DOCUMENT_ROOT'].'/population-age/left-nav.php');
        ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Розподіл населення Виноградівської ОТГ за віком(за 2017рік)</h1>
          </div>
          <div class="d-flex justify-content-center">
          <div id="population-age-2017" style="width: 100%; height: 500px;"></div>
          </div>
        </main>
      </div>
    </div>
</body>
</html>
