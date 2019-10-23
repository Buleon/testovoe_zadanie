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
        //Формируем текст запроса
        $query="SELECT id, fio FROM `client`";

        //Выполняем запрос с сохранением идентификатора результата
        $result = mysql_query($query);
        if ($result) {
        //Печатаем шапку таблицы //
        print ("<p align=center><font face=verdana><b>Найденные</b>
      <table border=1 align=center>
          <tr bgcolor=#ffffcc>
              <td>Индификатор</td>
              <td>ФИО</td>
          </tr>");
       //Выводим список клиентов //
       while($row = mysql_fetch_array($result))
        {
                $id=$row['id'];
                $fio=$row['fio'];
                print ("<tr>
                <td>$id</td>
                <td>$fio</td>
                </tr>");
         }
                print ("</table>");

          mysql_close(); }
          else
          {
              print mysql_error();
          }
        ?>
</body>
</html>