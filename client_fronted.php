 <html lang="en">
   <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
       <title>Тестовое Задние</title>
       <link href="styles/site.css" rel="stylesheet">
   </head>
   <body>
   <header>
      <p>Дорбро пожаловть в приложение мать его!</p>
  </header>
    <div class="content">
   <form id="formazak" action="" method="POST" target="_self">
        <fieldset>
        <?php
            require_once '/cfg/core.php';
            mysql_connect($hostname, $username, $password);
            mysql_select_db($dbname);
            $id_user = $_GET['option_user'];
            require_once '/cfg/business_process_active.php';
        ?>
          <legend>5. Установка нового статуса по бизнес-процессу клиенту <?php echo $id_user; ?></legend>
            <p class="zavet_deda"> Я буду с тобой краток. Есть два пути. И они оба мне не нравяться. Но выбирать тебе </p>
             <?php
                 if ($id_user != 0) {
                 $row = (business_process_active($id_user)); }
                 if ($row  != 0) {
                       $id_list_process = $row[id]; //нужный нам процесс по которому идет работа
                       $idsteps = $row[id_steps];
                       $query2 = "SELECT `id_result_steps`,`name_result_step` FROM `result_steps` WHERE `id_business_step`=$idsteps";
                       $result2 = mysql_query($query2);
                     while($row=mysql_fetch_assoc($result2)) {
                          $a[] = $row[id_result_steps];
                          $a[] = $row[name_result_step];
                          }
                       }
             ?>

            <input type="submit" name="submit_1" value="<?php echo $a[1]; ?>">
            <input type="submit" name="submit_2" value="<?php echo $a[3]; ?>">

<?php
    if (isset($_POST['submit_1'])) {
        echo "нажали кнопку 1 <br>";
        echo $id_list_process;
        $query = "UPDATE `karina_test`.`list_status_process` SET `id_result` = $a[0] WHERE `list_status_process`.`id` = $id_list_process";
        mysql_query($query);
        $result_new_proc = mysql_query($query);
            //ПРоверка запроса
            if ($result_new_proc == true) {
            print ("<br>Данные занесены"); } //Печать сообщения
            else {
            print ("<br>Данные не занесены");
            mysql_close(); }
            if (business_process_active_next($a[0])) {
                //запускаем процесс созадние новой записи
               echo "<br> Запускам новый процесс";
            }

        }
    if (isset($_POST['submit_2'])) {
        echo "нажали кнопку 2";
        $query = "UPDATE `karina_test`.`list_status_process` SET `id_result` = $a[2] WHERE `list_status_process`.`id` =$id_list_process";
        $result_new_proc = mysql_query($query);
                   //ПРоверка запроса
            if ($result_new_proc == true) {
             print ("<br>Данные занесены");} //Печать сообщения
             else
             print ("<br>Данные не занесены"); {
             mysql_close(); }
              if (business_process_active_next($a[2])) {
                //запускаем процесс созадние новой записи
                 echo "<br> Запускам новый процесс";
                          }
            }
             ?>
          </fieldset>
          </form>
        </div>
  <footer>
      Тут что-то тоже написать для важностИ, типа показать что умею футер прижимать к низу.
  </footer>
  </body>
  </html>