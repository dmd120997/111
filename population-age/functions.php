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
                       $query = mysqli_query($con, "SELECT `id` FROM `population-age` WHERE `col_A` = '{$getData[0]}' LIMIT 1");
                     if(mysqli_num_rows($query)) {
                         $row_query = mysqli_fetch_assoc($query);
                         mysqli_query($con, "UPDATE `population-age` SET `col_A` = '{$getData[0]}', `col_B` = '{$getData[1]}', `col_C` = '{$getData[2]}', `col_D` = '{$getData[3]}', `col_E` = '{$getData[4]}', `col_F` = '{$getData[5]}', `col_G` = '{$getData[6]}', `col_H` = '{$getData[7]}', `col_I` = '{$getData[8]}' WHERE `id` = '{$row_query['id']}'");
                     } else {
                        mysqli_query($con, "INSERT INTO `population-age` SET `col_A` = '{$getData[0]}', `col_B` = '{$getData[1]}', `col_C` = '{$getData[2]}', `col_D` = '{$getData[3]}', `col_E` = '{$getData[4]}', `col_F` = '{$getData[5]}', `col_G` = '{$getData[6]}', `col_H` = '{$getData[7]}', `col_I` = '{$getData[8]}'");
                     }

        echo "<script type=\"text/javascript\">
        window.location = \"index.php\"
        </script>
        ";
           }

	         fclose($file);
		 }
	}

  if(isset($_POST["Export"])){


     header('Content-Type: text/csv');
     header('Content-Disposition: attachment; filename=data.csv');
     $output = fopen('php://output', 'w');
     fputcsv($output, array('id', 'col_A', 'col_B', 'col_C', 'col_D', 'col_E', 'col_F', 'col_G', 'col_H'));
     $query = "SELECT * FROM `population-age`";
     $result = mysqli_query($con, $query);
     while($row = mysqli_fetch_assoc($result))
     {
          fputcsv($output, $row);
     }
     fclose($output);
}

function get_all_records(){
    $con = getdb();
    $Sql = "SELECT * FROM `population-age` WHERE `id` = 1";
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
     $Sql = "SELECT * FROM `population-age` WHERE `id` >= 2";
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

if(isset($_POST["Import2"])){
 $filename2=$_FILES["file2"]["tmp_name"];
  if($_FILES["file2"]["size"] > 0)
  {
     $file2 = fopen($filename2, "r");
       while (($getData2 = fgetcsv($file2, 10000, ",")) !== FALSE)
                  {
                    $query2 = mysqli_query($con, "SELECT `id` FROM `population-age-locality` WHERE `col_A` = '{$getData2[0]}' LIMIT 1");
                  if(mysqli_num_rows($query2)) {
                      $row2_query = mysqli_fetch_assoc($query2);
                      mysqli_query($con, "UPDATE `population-age-locality` SET `col_A` = '{$getData2[0]}', `col_B` = '{$getData2[1]}', `col_C` = '{$getData2[2]}', `col_D` = '{$getData2[3]}', `col_E` = '{$getData2[4]}', `col_F` = '{$getData2[5]}', `col_G` = '{$getData2[6]}', `col_H` = '{$getData2[7]}' WHERE `id` = '{$row2_query['id']}'");
                     // echo "UPDATE population SET col_A = '{$getData2[0]}', col_B = '{$getData2[1]}', col_C = '{$getData2[2]}', col_D = '{$getData2[3]}', col_E = '{$getData2[4]}', col_F = '{$getData2[5]}', col_G = '{$getData2[6]}', col_H = '{$getData2[7]}', col_I = '{$getData2[8]}' WHERE `id` = '{$row2_query['id']}'";
                  } else {
                     mysqli_query($con, "INSERT INTO `population-age-locality` SET `col_A` = '{$getData2[0]}', `col_B` = '{$getData2[1]}', `col_C` = '{$getData2[2]}', `col_D` = '{$getData2[3]}', `col_E` = '{$getData2[4]}', `col_F` = '{$getData2[5]}', `col_G` = '{$getData2[6]}', `col_H` = '{$getData2[7]}'");
                   //  echo "INSERT INTO population SET col_A = '{$getData2[0]}', col_B = '{$getData2[1]}', col_C = '{$getData2[2]}', col_D = '{$getData2[3]}', col_E = '{$getData2[4]}', col_F = '{$getData2[5]}', col_G = '{$getData2[6]}', col_H = '{$getData2[7]}', col_I = '{$getData2[8]}'";

                  }

     echo "<script type=\"text/javascript\">
     window.location = \"index.php\"
     </script>
     ";
        }

        fclose($file2);
  }
}

if(isset($_POST["Export2"])){
   header('Content-Type: text/csv; charset=utf-8');
   header('Content-Disposition: attachment; filename=data2.csv');
   $output = fopen('php://output', 'w');
   fputcsv($output, array('id', 'col_A', 'col_B', 'col_C', 'col_D', 'col_E', 'col_F', 'col_G', 'col_H'));
   $query = "SELECT * FROM `population-age-locality`";
   $result = mysqli_query($con, $query);
   while($row = mysqli_fetch_assoc($result))
   {
        fputcsv($output, $row);
   }
   fclose($output);
}

function get_all_records_age_locality(){
  $con = getdb();
  $Sql2 = "SELECT * FROM `population-age-locality` WHERE `id` = 1";
  $result2 = mysqli_query($con, $Sql2);
  if (mysqli_num_rows($result2) > 0) {
         while($row2 = mysqli_fetch_assoc($result2)) {
   echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
   <thead><tr>
            <th>" . $row2['col_A']."</th>
            <th>" . $row2['col_B']."</th>
            <th>" . $row2['col_C']."</th>
            <th>" . $row2['col_D']."</th>
            <th>" . $row2['col_E']."</th>
            <th>" . $row2['col_F']."</th>
            <th>" . $row2['col_G']."</th>
            <th>" . $row2['col_H']."</th></tr></thead><tbody>";
   }
 }
   $Sql2 = "SELECT * FROM `population-age-locality` WHERE `id` >= 2";
   $result2 = mysqli_query($con, $Sql2);

   if (mysqli_num_rows($result2) > 0) {
          while($row2 = mysqli_fetch_assoc($result2)) {
        echo "<tr><td>" . $row2['col_A']."</td>
                  <td>" . $row2['col_B']."</td>
                  <td>" . $row2['col_C']."</td>
                  <td>" . $row2['col_D']."</td>
                  <td>" . $row2['col_E']."</td>
                  <td>" . $row2['col_F']."</td>
                  <td>" . $row2['col_G']."</td>
                  <td>" . $row2['col_H']."</td></tr>";

    }
   echo "</tbody></table></div>";
} else {
   echo "<div class='alert alert-warning' role='alert'><b>Немає даних в базі</b> для відображення інформації.</div>";
}
}
?>
