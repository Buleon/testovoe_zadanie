
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Тестовое Задние</title>
    <link href="styles/site.css" rel="stylesheet">
</head>
<body>
<header>
    <p>Мое тестовое задние. Да да, оно.</p>
</header>
  <div class="content">
     <a href="client.php" target="_blank"><button class="button_list">Get a list of clients</button></a></h2>



     <form method="post" action="list_status.php" target="_blank">
        <fieldset>
            <legend>2. Получение списка истории статусов бизнес-процесса</legend>
                <p> Выбирите клиента из списка: <select name="client_select">
                <option value="" selected="selected"></option>
                    <?php
                        require_once '/cfg/core.php';
                        mysql_connect($hostname, $username, $password);
                        mysql_select_db($dbname);
                        $query="SELECT id, fio FROM `client`";
                        $result = mysql_query($query);
                        while($row = mysql_fetch_array($result))
                        {
                                        $id=$row['id'];
                                        $fio=$row['fio'];
                                        print ("<option value=\"$id\">$id $fio</option>"); }
                        mysql_close();
                        ?>
                </select></p>
        <INPUT TYPE="submit" name="ist_status" />
        </fieldset>
     </form>



      <form id="forma_new_bissenes" method="get" action="new_process_step.php">
      <fieldset>
        <legend>3. Открытие нового бизнес-процесса</legend>
<select name="option" method="get">
    <option selected="selected">Список клиентов.</option>
 <?php
                        require_once '/cfg/core.php';
                        mysql_connect($hostname, $username, $password);
                        mysql_select_db($dbname);
                        $query="SELECT id, fio FROM `client`";
                        $result = mysql_query($query);
                        while($row = mysql_fetch_array($result))
                        {
                                        $id=$row['id'];
                                        $fio=$row['fio'];
                                        print ("<option value=\"$id\">$id $fio</option>"); }
                        mysql_close();
                        ?>
</select>
    <select name="option_step" method="get">
    <option selected="selected">Список шагов</option>
     <?php
                            require_once '/cfg/core.php';
                            mysql_connect($hostname, $username, $password);
                            mysql_select_db($dbname);
                            $query="SELECT id, `business_step`.`name` FROM  `business_step`";
                            $result = mysql_query($query);
                            while($row = mysql_fetch_array($result))
                            {
                                            $id=$row['id'];
                                            $name=$row['name'];
                                            print ("<option value=\"$id\">$id $name</option>"); }
                            mysql_close();
                            ?>
    </select>
    <INPUT TYPE="submit" name="button_new_bus_process" />
</fieldset>
</form>



 <form id="get_link_rezult" method="get" action="get_link_rezult.php">
      <fieldset>
        <legend>4. Получение списка доступных результатов</legend>
            <select name="option4" method="get" onchange="this.form.submit()">
                <option selected="selected">Выбирите пользователя</option>
                 <?php
                                        require_once '/cfg/core.php';
                                        mysql_connect($hostname, $username, $password);
                                        mysql_select_db($dbname);
                                        $query_rezult ="SELECT id, fio FROM `client`";
                                        $result_rezult = mysql_query($query_rezult);
                                        while($row_rezult = mysql_fetch_array($result_rezult))
                                        {
                                                        $id=$row_rezult['id'];
                                                        $fio=$row_rezult['fio'];
                                                        print ("<option value=\"$id\">$id $fio</option>"); }
                                        mysql_close();
                                        ?>
                </select>
        </fieldset>
        </form>
<form id="get_link_rezult" method="get" action="client_fronted.php">
    <fieldset>
     <legend>5. Установка нового статуса по бизнес-процессу для клиента</legend>
         <select name="option_user" method="get" onchange="this.form.submit()">
            <option selected="selected">Выбирите клиента под которым зайти</option>
                <?php
                require_once '/cfg/core.php';
                mysql_connect($hostname, $username, $password);
                mysql_select_db($dbname);
                $query_rezult ="SELECT id, fio FROM `client`";
                $result_rezult = mysql_query($query_rezult);
                while($row_rezult = mysql_fetch_array($result_rezult))
                    {
                        $id=$row_rezult['id'];
                        $fio=$row_rezult['fio'];
                        print ("<option value=\"$id\">$id $fio</option>"); }
                        mysql_close();
                        ?>
                        </select>
                </fieldset>
                </form>

      </div>
<footer>
    Тут что-то тоже написать для важностИ, типа показать что умею футер прижимать к низу.
</footer>
</body>
</html>