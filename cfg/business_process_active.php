<?php
function business_process_active($id_user) {
        $query ="SELECT `list_status_process`.`id`, id_steps  FROM `list_status_process` WHERE id_client = $id_user and id_result IS NULL";
        $result = mysql_query($query);
        $num_rows = mysql_num_rows($result);
        if ($num_rows == 0) {
            print ("<p class=\"error\">По данному клиенту нет активного бизнес-процесса</p>");
            }
        else {
            $row = mysql_fetch_assoc($result);
            return  $row;
       }
        }

function business_process_active_next ($id_result) {
$query ="SELECT `break` FROM `karina_test`.`result_steps` WHERE id_result_steps = $id_result";
$result = mysql_query($query);
$row = mysql_fetch_assoc($result);
print mysql_error();
if ($row[`break`] == 0) {
    return TRUE;
}
else {
return FALSE;
}
}

?>