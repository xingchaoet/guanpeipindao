<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/12/8
 * Time: 11:17
 */
include ('auth.php');

$manipulate_session_two_types = $_POST['manipulate_session_two_types'];
//新批次
if ($manipulate_session_two_types == "manipulate_session_two_types") {
//    echo "<script type='text/javascript'>alert('manipulate_session_two_types!');</script>";
    $_SESSION['start_purchase_two_types'] = false;
//    print_r($manipulate_session_two_types);
    echo $_SESSION['start_purchase_two_types'];
}
