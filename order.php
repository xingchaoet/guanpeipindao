<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/27
 * Time: 18:09
 */

include ("db/db.php");
date_default_timezone_set("Asia/Shanghai");
$user_id = $_POST['userid'];

if($_POST['book_nums']){
    
   $book_ids = $_POST['book_ids'];

   $book_nums = $_POST['book_nums'];


   for($i = 0;$i < count($book_ids); $i ++ ){

   	  $sql="insert into orderlist(orderlist_user_id, orderlist_content , orderlist_num , orderlist_time  ) values(?,?,?,?)";

      $smt=$pdo->prepare($sql);

      $smt->bindValue(1,$user_id);
      $smt->bindValue(2,$book_ids[$i]);
      $smt->bindValue(3,$book_nums[$i]);
      $smt->bindValue(4,date("y-m-d H:i:s"));

      $smt->execute();

      // echo $pdo->lastInsertId();

      // echo $user_id.'@'.$book_ids[$i].'$'.$book_nums[$i];
   }




}else{
    
    $book_id = $_POST['bookid'];

	$sum = 1;

    $sql="insert into orderlist(orderlist_user_id,orderlist_content,orderlist_time ) values(?,?,?)";

    $smt=$pdo->prepare($sql);

    $smt->bindValue(1,$user_id);
    $smt->bindValue(2,$book_id);
    $smt->bindValue(3,date("y-m-d H:i:s"));

    $smt->execute();

   //echo $user_id.$book_id;
   // echo $pdo->lastInsertId();


}



