<?
  //3 R W //4 RD

  $return_id=$_REQUEST['id'];
  $return_stat=$_REQUEST['stat']; // up down
  if($return_stat==3){
  $stt=3;

  $sqlu_file2="../script/conf.json";
  $sqlu_json2=json_decode(file_get_contents($sqlu_file2),true);
  $usr_sql2=$sqlu_json2['mysql_setup']['mysql_json_user'];
  $pas_sql2=$sqlu_json2['mysql_setup']['mysql_json_password'];
  mysql_connect('localhost',$usr_sql2,$pas_sql2) or die("Could not connect to SQL");
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
