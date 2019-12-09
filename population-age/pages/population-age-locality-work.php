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
google.charts.load("current", {packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);
 function drawChart() {
   var data = google.visualization.arrayToDataTable([
      <?php
      $Sql = "SELECT * FROM `population-age-locality` WHERE `id` IN ('1', '4')";
      $result = mysqli_query($con, $Sql);
      if(mysqli_num_rows($result)) {

       $string_A = "['Міста'";
       $string_B = $string_C = $string_D = $string_E = $string_F = $string_G = $string_H = "[";
       $i = 0;
       while($row = mysqli_fetch_assoc($result)) {

           if($row['id'] != 1) {
               if($i === 0) $string_A .= "'Працездатні'";
               else $string_A .= ", 'Працездатні'";
           }

           if($i === 0) $string_B .= "'{$row['col_B']}'";
           else $string_B .= ", {$row['col_B']}";
           if($i === 0) $string_C .= "'{$row['col_C']}'";
           else $string_C .= ", {$row['col_C']}";
           if($i === 0) $string_D .= "'{$row['col_D']}'";
           else $string_D .= ", {$row['col_D']}";
           if($i === 0) $string_E .= "'{$row['col_E']}'";
           else $string_E .= ", {$row['col_E']}";
           if($i === 0) $string_F .= "'{$row['col_F']}'";
           else $string_F .= ", {$row['col_F']}";
           if($i === 0) $string_G .= "'{$row['col_G']}'";
           else $string_G .= ", {$row['col_G']}";
           if($i === 0) $string_H .= "'{$row['col_H']}'";
           else $string_H .= ", {$row['col_H']}";
           $i++;
       }

        $string_A .= ", { role: 'style' } ],\n";
        $string_B .= ", '#3366cc'],\n";
        $string_C .= ", '#dc3912'],\n";
        $string_D .= ", '#ff9900'],\n";
        $string_E .= ", '#109618'],\n";
        $string_F .= ", '#990099'],\n";
        $string_G .= ", '#0099c6'],\n";
        $string_H .= ", '#dd4477']\n";


       if($string_A !== "['Міста'],") {
           echo $string_A;
       }

       echo $string_B.$string_C.$string_D.$string_E.$string_F.$string_G.$string_H;
      }
      ?>
    ]);


          var view = new google.visualization.DataView(data);
          view.setColumns([0, 1,
                           { calc: "stringify",
                             sourceColumn: 1,
                             type: "string",
                             role: "annotation" },
                           2]);

          var options = {
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
          };
          var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_material"));
          chart.draw(view, options);
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
            <h1 class="h2">Розподіл населення Виноградівської ОТГ за віком(працездатні, загальний графік)</h1>
          </div>
          <div class="d-flex justify-content-center">
            <div id="columnchart_material" style="width: 80%; height: 550px;"></div>
          </div>
        </main>
      </div>
    </div>
</body>
</html>
