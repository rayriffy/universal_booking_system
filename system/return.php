<?
  //3 R W //4 RD

  $return_id=$_REQUEST['id'];
  $return_stat=$_REQUEST['stat']; // up down
  if($return_stat==3){
  $stt=3;

  include('../script/sql.php');
  online_connect();
  mysql_select_db('vletpaoh_stem');
  $sql="UPDATE `booking` SET `booking_stat`=$stt WHERE `booking_id`=$return_id";
  $res=mysql_query($sql);

  header('Location: index.php?sucuess_stat=1');
  }
  else
  {
    echo 'TO DO';
  }
?>
