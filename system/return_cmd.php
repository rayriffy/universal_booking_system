<?
 if($_COOKIE['login_permit']=='member'){ echo 'TO DO'; } else{

   $return_id=$_REQUEST['id'];
   
   $sqlu_file2="../script/conf.json";
   $sqlu_json2=json_decode(file_get_contents($sqlu_file2),true);
   $usr_sql2=$sqlu_json2['mysql_setup']['mysql_json_user'];
   $pas_sql2=$sqlu_json2['mysql_setup']['mysql_json_password'];
   mysql_connect('localhost',$usr_sql2,$pas_sql2) or die("Could not connect to SQL");
   mysql_select_db('vletpaoh_stem');
   $sql="SELECT * FROM `booking` WHERE `booking_id` = $return_id AND `booking_stat` = 3";
   $res=mysql_query($sql);
   if($res==NULL)
   {
     header('Location: index.php?return_error=2');
   }
   else
   {
     $res=mysql_query($sql);
     while($row=mysql_fetch_row($res))
     {
       $crr_amm=$row[2];
       $item_id=$row[1];
     }
     $sql2="UPDATE `booking` SET `booking_stat`=4 WHERE `booking_id`=$return_id";
     $res2=mysql_query($sql2);
     $sql3="UPDATE `item` SET `qty`=`qty`-$crr_amm WHERE `id`=$item_id";
     $res3=mysql_query($sql3);
     header('Location: index.php?admin_stat=2');
   }

 }
?>
