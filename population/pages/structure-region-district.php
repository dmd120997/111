<html lang="ua">
<head>
<meta charset="utf-8" />
<meta name="author" content="Maryna Salimonenko">
<title>Структура чисельності населення ОТГ серед області та району</title>

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
       $Sql = "SELECT * FROM `population` WHERE `id` <= 13";
       $result = mysqli_query($con, $Sql);
       if(mysqli_num_rows($result)) {

        $string_A = "['Month'";
        $string_B = $string_C = $string_D = $string_E = $string_F = $string_G = $string_H = $string_I = "[";
        $i = 0;
        while($row = mysqli_fetch_assoc($result)) {

            if($row['id'] != 1) {
                if($i === 0) $string_A .= "'{$row['col_A']}'";
                else $string_A .= ", '{$row['col_A']}'";
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
            if($i === 0) $string_I .= "'{$row['col_I']}'";
            else $string_I .= ", {$row['col_I']}";
            $i++;
        }

         $string_A .= "],\n";
         $string_B .= "],\n";
         $string_C .= "],\n";
         $string_D .= "],\n";
         $string_E .= "],\n";
         $string_F .= "],\n";
         $string_G .= "],\n";
         $string_H .= "],\n";
         $string_I .= "]\n";

        if($string_A !== "['Month'],") {
            echo $string_A;
        }

        echo $string_B.$string_C.$string_D.$string_E.$string_F.$string_G.$string_H.$string_I;
       }
       ?>		 ]);

		 var options = {
			 title : 'Чисельність населення Виноградівської об’єднаної територіальної громади, осіб',
			 vAxis: {title: 'Чисельність населення'},
			 hAxis: {title: 'Роки'},
			 seriesType: 'bars',

			 bar: {groupWidth: "100%"}

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
        include($_SERVER['DOCUMENT_ROOT'].'/population/left-nav.php');
        ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Структура чисельності населення ОТГ серед області та району</h1>
          </div>
          <div class="d-flex justify-content-center">
            <div id="chart_div" style="width: 100%; height: 700px;"></div>
          </div>
        </main>
      </div>
    </div>
</body>
</html>
