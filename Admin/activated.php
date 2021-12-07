<?php

include('../Database/db_connection.php');
if (isset($_GET['status'])) {
    $status1 = $_GET['status'];
    $select = mysql_query("select * from tbl_user where USER_ID='$status'");
    while ($row = mysql_fetch_object($select)) {
        $status_var = $row->status;
        if ($status_var == '0') {
            $status_state = 1;
        } else {
            $status_state = 0;
        }
        $update = mysql_query("update tbl_user set status='$status' where USER_ID='$status' ");
        if ($update) {
            header("Location:Admin.php");
        } else {
            echo mysql_error();
        }
    }
?>
    <?php

}
    ?>