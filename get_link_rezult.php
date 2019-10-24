
   <?php
      require_once '/cfg/core.php';
      mysql_connect($hostname, $username, $password);
      mysql_select_db($dbname);
      $id_user = $_GET['option4'];
      require_once '/cfg/business_process_active.php';



      $row = (business_process_active($id_user));
      if ($row  != 0) {
      $idsteps = $row[id_steps];
      $query2 = "SELECT `name_result_step` FROM `result_steps` WHERE `id_business_step`=$idsteps";
      $result2 = mysql_query($query2);

              while($row=mysql_fetch_assoc($result2)) {
                  $step = $row[name_result_step];
                  print ("<h3>Следубщий шаг по данному случаю - $step</h3>");
                  }
        }

       echo mysql_error();
  ?>