<?php
include('../inc/connection.php');
$con = getdb();
   if(isset($_POST["Import"])){
		$filename=$_FILES["file"]["tmp_name"];

		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
          	         {
                       $query = mysqli_query($con, "SELECT `id` FROM `population` WHERE `col_A` = '{$getData[0]}' LIMIT 1");
                     if(mysqli_num_rows($query)) {
                         $row_query = mysqli_fetch_assoc($query);
                         mysqli_query($con, "UPDATE `population` SET `col_A` = '{$getData[0]}', `col_B` = '{$getData[1]}', `col_C` = '{$getData[2]}', `col_D` = '{$getData[3]}', `col_E` = '{$getData[4]}', `col_F` = '{$getData[5]}', `col_G` = '{$getData[6]}', `col_H` = '{$getData[7]}', `col_I` = '{$getData[8]}' WHERE `id` = '{$row_query['id']}'");
                     } else {
                        mysqli_query($con, "INSERT INTO `population` SET `col_A` = '{$getData[0]}', `col_B` = '{$getData[1]}', `col_C` = '{$getData[2]}', `col_D` = '{$getData[3]}', `col_E` = '{$getData[4]}', `col_F` = '{$getData[5]}', `col_G` = '{$getData[6]}', `col_H` = '{$getData[7]}', `col_I` = '{$getData[8]}'");
                     }

        echo "<script type=\"text/javascript\"> window.location = \"index.php\"</script>";

           }

	         fclose($file);
		 }
	}

	 if(isset($_POST["Export"])){


      header('Content-Type: text/csv');
      header('Content-Disposition: attachment; filename=data.csv');
      $output = fopen('php://output', 'w');
      fputcsv($output, array('id', 'col_A', 'col_B', 'col_C', 'col_D', 'col_E', 'col_F', 'col_G', 'col_H', 'col_I'));
      $query = "SELECT * FROM `population`";
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_assoc($result))
      {
           fputcsv($output, $row);
      }
      fclose($output);
 }

function get_all_records(){
    $con = getdb();
    $Sql = "SELECT * FROM `population` WHERE `ID`= 1";
    $result = mysqli_query($con, $Sql);
    if (mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_assoc($result)) {
     echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
     <thead><tr>
     					<th>" . $row['col_A']."</th>
				  		<th>" . $row['col_B']."</th>
				  		<th>" . $row['col_C']."</th>
              <th>" . $row['col_D']."</th>
              <th>" . $row['col_E']."</th>
              <th>" . $row['col_F']."</th>
              <th>" . $row['col_G']."</th>
              <th>" . $row['col_H']."</th>
              <th>" . $row['col_I']."</th></tr></thead><tbody>";
     }
   }
     $Sql = "SELECT * FROM `population` WHERE `ID` >= 2";
     $result = mysqli_query($con, $Sql);

     if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>" . $row['col_A']."</td>
                    <td>" . $row['col_B']."</td>
                    <td>" . $row['col_C']."</td>
                    <td>" . $row['col_D']."</td>
                    <td>" . $row['col_E']."</td>
                    <td>" . $row['col_F']."</td>
                    <td>" . $row['col_G']."</td>
                    <td>" . $row['col_H']."</td>
                    <td>" . $row['col_I']."</td></tr>";

      }
     echo "</tbody></table></div>";



} else {
     echo "<div class='alert alert-warning' role='alert'><b>Немає даних в базі</b> для відображення інформації.</div>";
}

}

?>
