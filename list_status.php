<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Список пользователей</title>
</head>
<body>
 <?php
         require_once '/cfg/core.php';
         mysql_connect($hostname, $username, $password);
         mysql_select_db($dbname);
         $id = $_POST['client_select'];
         $query_list="SELECT  * FROM `list_status_process` WHERE id_client = $id";
         $result_list = mysql_query($query_list);

         print ("<p align=center><font face=verdana><b>Список истории клиента $id</b>
               <table border=1 align=center>
                   <tr>
                       <td>Индификатор статуса</td>
                       <td>Индификатор пользователя</td>
                       <td>Шаг</td>
                       <td>Результат</td>
                       <td>Дата</td>
                   </tr>");
         while($rowstep = mysql_fetch_array($result_list))
                           {
                             $id_step=$rowstep[id];
                             $id_cl=$rowstep[id_client];
                             $idsteps = $rowstep[id_steps];
                             $id_result=$rowstep[id_result];
                             $date=$rowstep[date];

                                   print ("<tr>
                                   <td>$id_step</td>
                                   <td>$id_cl</td>
                                   <td>$idsteps</td>
                                   <td>$id_result</td>
                                   <td>$date</td>
                                   </tr>");
                            }
                                   print ("</table>");
                             mysql_close();

  ?>
                                </body>
                                </html>