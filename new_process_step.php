 <?php
    require_once '/cfg/core.php';
    mysql_connect($hostname, $username, $password);
    mysql_select_db($dbname);
    // Подбираем результат выбора
    $option = isset($_GET['option']) ? (int) $_GET['option'] : 0;
    $option_step = isset($_GET['option_step']) ? (int) $_GET['option_step'] : 0;
     // Првоеряем есть ли на него процессы не закрытые
     $query_new ="SELECT *  FROM `list_status_process` WHERE id_client = `$option`";
     $result_new = mysql_query($query_new);
    //проверка пользователя
     while ($row = mysql_fetch_assoc($result_new)) {
        $id_result=$row[`id_result`];
        if ($option == 0) { break;}
        if ($id_result == NULL ) {
        echo "По клиенту уже есть активный бизнес-процесс";
        mysql_close();
        break;
       }
        }
     $query_new_proc = "INSERT INTO `list_status_process`(`id_client`, `id_steps`, `date`) VALUES ($option,$option_step,NOW())";
     $result_new_proc = mysql_query ($query_new_proc);

     if ($result_new_proc == true)
     print ("<br>Данные занесены"); //Печать сообщения
     else
     print ("<br>Данные не занесены");
     mysql_close();
    ?>