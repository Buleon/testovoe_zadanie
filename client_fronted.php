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
   <form id="formazak" method="get" action="new_process_step.php">
        <fieldset>
        <?php
            require_once '/cfg/core.php';
            mysql_connect($hostname, $username, $password);
            mysql_select_db($dbname);
            $id_user = $_GET['option_user'];

        ?>
          <legend>5. Установка нового статуса по бизнес-процессу</legend>
            <p class="zavet_deda"> Я буду с тобой краток. Есть два пути. И они оба мне не нравяться. Но выбирать тебе </p>
            <input type="submit" name="submit_1" value="Кнопка" />
            <?php
            if (isset($_POST['submit_1'])) {

            }
            ?>
            <input type="submit" name="submit_2" value="Кнопка" />
            <?php
                        if (isset($_POST['submit_2'])) {

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