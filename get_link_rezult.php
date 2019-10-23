
   <?php
      require_once '/cfg/core.php';
      mysql_connect($hostname, $username, $password);
      mysql_select_db($dbname);

      $id_user = $_GET['option4'];
       $query ="SELECT id_steps  FROM `list_status_process` WHERE id_client = $id_user and id_result IS NULL";
       $result = mysql_query($query);
       $num_rows = mysql_num_rows($result);
       if ($num_rows == 0) {
             print ("<p class=\"error\">По данному клиенту нет активного бизнес-процесса</p>");
            }
            else {
                 while ($row = mysql_fetch_assoc($result)) {
                    $idsteps = $row[id_steps];
                    }
                $query2 = "SELECT `name_result_step` FROM `result_steps` WHERE `id_business_step` =$idsteps";
                $result2 = mysql_query($query2);

                while($row=mysql_fetch_assoc($result2)) {
                  $step = $row[name_result_step];
                  print ("<h3>Следубщий шаг по данному случаю - $step</h3>");
            }
            }
       echo mysql_error();
  ?>