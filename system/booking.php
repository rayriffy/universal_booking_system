<?
  include('../script/sql.php');
  online_connect();
  mysql_select_db('vletpaoh_stem');
  $id=$_REQUEST['booking_item_id'];
  $amm=$_REQUEST['booking_item_amm'];
  $username=$_COOKIE['login_user'];
  if($amm<=0)
  {
    header('Location: index.php?booking_stat=3');
    exit();
  }
  //CHECK ITEM IS EXIST
  $sql="SELECT * FROM `item` WHERE `id` = $id";
  $res=mysql_query($sql);
  if(mysql_num_rows($res)==0)
  {
    header('Location: index.php?booking_stat=2');
    exit();
  }
  $res=mysql_query($sql);
  while($row=mysql_fetch_row($res))
  {
    $crr_amm=$row[2];
    $crr_qty=$row[3];
  }
  if(($crr_amm-$crr_qty-$amm)<0)
  {
    //REJECT CAUSE NEI
    header('Location: index.php?booking_stat=3');
    exit();
  }
  $sql2="SELECT `booking_id` FROM `system2` WHERE 1";
  $res2=mysql_query($sql2);
  while ($row=mysql_fetch_row($res2))
  {
    $booking_id=$row[0];
  }

  //ADD TO TABLE
  $sql3="INSERT INTO `vletpaoh_stem`.`booking`(`booking_id`, `booking_item_id`, `booking_item_amm`, `booking_who`) VALUES ('$booking_id','$id','$amm','$username');";
  $res3=mysql_query($sql3);

  //UPDATE INT
  $sql4="UPDATE `system2` SET `booking_id`=`booking_id`+1 WHERE 1";
  $res4=mysql_query($sql4);

  header('Location: index.php?sucuess_stat=1');
?>
